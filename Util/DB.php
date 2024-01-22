<?php

namespace Util;

use mysqli;

class DB
{
    private $host = '127.0.0.1:3307';  // Replace with your database host
    private $username = 'testUser';  // Replace with your database username
    private $password = 'testUser';  // Replace with your database password
    private $database = 'db_IOmart';  // Replace with your database name
    private $conn;

    // Constructor to establish the database connection
    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Function to get the database connection
    public function getConnection()
    {
        return $this->conn;
    }

    // Function to close the database connection
    public function closeConnection()
    {
        $this->conn->close();
    }

    public function getPersonData()
    {
        $sql = "SELECT * FROM person";
        $result = $this->conn->query($sql);

        $data = [];

        // Check if there are rows in the result
        if ($result->num_rows > 0) {
            // Fetch data and store it in an array
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    public function getQuery($query): array
    {
        $sql = $query;
        $result = $this->conn->query($sql);

        $data = [];

        // Check if there are rows in the result
        if ($result->num_rows > 0) {
            // Fetch data and store it in an array
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    /**
     * GETS Credentials of a specific username
     **/
    public function getUserCredentials($username): array
    {

        $data = [];

        $result = $this->conn->execute_query("SELECT * FROM credentials INNER JOIN person ON credentials.id_credentials = person.credentials_id LEFT JOIN position ON position.user_id=person.id_user WHERE credentials.username=? LIMIT 1", [$username]);
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;

    }


    /**
     * GETS ALL Stores that are of an Admin
     **/
    public function getAdminStores($userID): array
    {
        $data = [];

        $result = $this->conn->execute_query("SELECT * FROM store LEFT JOIN position ON store.id_store = position.store_id WHERE position.position_type = 1 AND user_id = ?", [$userID]);
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;
    }

    /**
     * GETS Store users that aren't admins
     **/
    public function getStoreUsers($storeID): array
    {
        $data = [];

        $result = $this->conn->execute_query("SELECT * FROM person LEFT JOIN position ON person.id_user = position.user_id LEFT JOIN store ON position.store_id = store.id_store WHERE store.id_store=? and position.position_type!=1", [$storeID]);
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;
    }

    /**
     * GETS Stores that are of a user
     **/
    public function getUserStores($userID): array
    {
        $data = [];

        $result = $this->conn->execute_query("SELECT * FROM store LEFT JOIN position ON store.id_store = position.store_id WHERE user_id = ?", [$userID]);
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;
    }

    /**
     * GETS All sections of a specific store
     **/
    public function getStoreSections($storeID): array
    {
        $data = [];

        $result = $this->conn->execute_query("SELECT section.id_section, section.store_id, section.name FROM section LEFT JOIN store ON section.store_id = store.id_store WHERE id_store=?;", [$storeID]);

        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;
    }

    /**
     * GETS the amount of devices in a specific section
     **/
    public function getDeviceTypeSection($sectionID): array
    {
        $data = [];

        $result = $this->conn->execute_query("SELECT COUNT(id_device) as amount, id_section, device.id_device, device_type.name FROM section LEFT JOIN device ON section.id_section = device.device_section_id LEFT JOIN device_type ON device.device_type_id = device_type.id_type WHERE section.id_section=? GROUP BY device_type.name;", [$sectionID]);
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;
    }

    /**
     * GETS the sensor data of a specific type and store
     **/
    public function getStoreSensorTypeData($sensorType, $storeID): array
    {
        $data = [];

        $result = $this->conn->execute_query("SELECT store.name, sum(sensor_data.value) as `value`, date_format(sensor_data.time, '%Y-%m-%d') as `date` FROM sensor_data LEFT JOIN sensor ON sensor_data.sensor_id = sensor.id_sensor LEFT JOIN section ON sensor.sensor_section_id = section.id_section LEFT JOIN store ON section.store_id = store.id_store WHERE sensor.sensor_type_id=? AND store.id_store=? GROUP BY sensor_data.time, store.name;", [$sensorType, $storeID]);
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;
    }

    /**
     * GETS a username if the username exists
     **/
    public function checkUsername($username): array
    {
        $data = [];

        $result = $this->conn->execute_query("SELECT credentials.username FROM credentials WHERE credentials.username=?", [$username]);
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;
    }

    /**
     * GETS a usersID position
     **/
    public function getUserPositions($userID): array
    {
        $data = [];

        $result = $this->conn->execute_query("SELECT * FROM position WHERE position.user_id=?", [$userID]);
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;
    }

    /**
     * CREATES a users from RegistrationData (Credentials and Person)
     **/
    public function createUser($data)
    {
        $resultCredentials = $this->conn->execute_query(
            "INSERT INTO credentials (username, password_hash) VALUES (?, ?)"
            , [$data['username'], password_hash($data['password'], PASSWORD_BCRYPT)]);

        $lastCredID = $this->conn->execute_query(
            "SELECT MAX(id_credentials) as id FROM credentials;"
            , []);

        $lastCredID = $lastCredID->fetch_array()['id'];

        $lastPersonID = $this->conn->execute_query(
            "SELECT MAX(id_user)+1 as id FROM person;"
            , []);

        $lastPersonID = $lastPersonID->fetch_array()['id'];

        $resultPerson = $this->conn->execute_query(
            "INSERT INTO person (id_user, employee_number, first_name, last_name, email, telephone, address, date_of_birth, date_of_employment, credentials_id) VALUES (?,?,?,?,?,?,?,TIMESTAMP(?),TIMESTAMP(?),?)"
            , [
            $lastPersonID,
            $data['employee_number'],
            $data['first_name'],
            $data['last_name'],
            $data['email'],
            $data['telephone'],
            $data['address'],
            $data['date_of_birth'],
            $data['date_of_employment'],
            $lastCredID
        ]);

        $resultPerson = $this->conn->execute_query(
            "SELECT * FROM person WHERE id_user=?;"
            , [$lastPersonID]);

        return $resultPerson->fetch_array();

    }

    /**
     * CREATE a Store of a specific admin
     */
    public function createStore($storeName, $storeAddress, $userID): bool
    {
        $resultStore = $this->conn->execute_query(
            "INSERT INTO store (name, address) VALUES (?,?);",
            [
                $storeName,
                $storeAddress,
            ]);

        $lastStoreID = $this->conn->execute_query(
            "SELECT MAX(id_store) as id FROM store;"
            , []);

        $lastStoreID = $lastStoreID->fetch_array()['id'];

        $resultPosition = $this->conn->execute_query(
            "INSERT INTO position (user_id, store_id, position_type) VALUES (?,?,?)",
            [
                $userID,
                $lastStoreID,
                1
            ]
        );

        return $resultStore && $resultPosition;

    }

    public function associateUserStore(int $storeID, int $userID, int $positionID)
    {
        $resultPosition = $this->conn->execute_query(
            "INSERT INTO position (user_id, store_id, position_type) VALUES (?,?,?)",
            [
                $userID,
                $storeID,
                $positionID
            ]
        );

        return boolval($resultPosition);
    }

    public function getMaxUserID()
    {
        $lastUserID = $this->conn->execute_query(
            "SELECT MAX(id_user) as id FROM person;"
            , []);

        return $lastUserID->fetch_array()['id'];

    }


    /**
     * GETS Device Data From Section
     **/
    public function getSectionDeviceData($sectionID, $type): array
    {
        $data = [];

        $result = $this->conn->execute_query("SELECT device.id_device AS id_device, device.device_section_id AS device_section_id, device.name AS name, device.device_type_id AS device_type_id , device_type.name AS typeName, device.state AS state, control_type.set_value AS set_value, sensor_type.unit AS unit_type, sensor_data.value AS actual_value FROM device LEFT JOIN device_type ON device_type.id_type = device.device_type_id LEFT JOIN control_type ON control_type.device_id  = device.id_device LEFT JOIN sensor ON sensor.id_sensor = control_type.sensor_id LEFT JOIN sensor_type ON sensor_type.id_type = sensor.sensor_type_id LEFT JOIN(
            SELECT
                sensor_data.sensor_id,
                MAX(sensor_data.time) AS latest_timestamp,
                sensor_data.value AS value
            FROM
                sensor_data
            GROUP BY
                sensor_id
            )   AS sensor_data ON sensor_data.sensor_id = sensor.id_sensor WHERE device.device_section_id=? AND device.device_type_id=?;", [$sectionID, $type]);
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;
    }

    /**
     * GETS Device Data From Store
     **/
    public function getStoreDeviceData($storeID, $type): array
    {
        $data = [];

        $result = $this->conn->execute_query("SELECT device.id_device AS id_device, device.device_section_id AS device_section_id, device.name AS name, device.device_type_id AS device_type_id , device_type.name AS typeName, device.state AS state, control_type.set_value AS set_value, sensor_type.unit AS unit_type, sensor_data.value AS actual_value FROM device LEFT JOIN section ON section.id_section = device.device_section_id LEFT JOIN store ON store.id_store = section.store_id LEFT JOIN device_type ON device_type.id_type = device.device_type_id LEFT JOIN control_type ON control_type.device_id  = device.id_device LEFT JOIN sensor ON sensor.id_sensor = control_type.sensor_id LEFT JOIN sensor_type ON sensor_type.id_type = sensor.sensor_type_id LEFT JOIN(
    SELECT
        sensor_data.sensor_id,
        MAX(sensor_data.time) AS latest_timestamp,
        sensor_data.value AS value
    FROM
        sensor_data
    GROUP BY
        sensor_id
) AS sensor_data ON sensor_data.sensor_id = sensor.id_sensor WHERE store.id_store=? AND device.device_type_id=? ;", [$storeID, $type]);
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;
    }

    /**
     * EDIT store name and address
     **/
    public function editStore($storeID, $storeName, $storeAddress): bool
    {
        $resultStore = $this->conn->execute_query(
            "UPDATE store SET store.name = ?, store.address = ? WHERE store.id_store = ?;",
            [
                $storeName,
                $storeAddress,
                $storeID
            ]);

        return $resultStore;
    }

    public function deleteStore($storeID): bool
    {
        $resultStore = $this->conn->execute_query(
            "DELETE FROM store WHERE store.id_store = ?;", [$storeID]);

        return $resultStore;
    }

    /** Change the device from on(1) to off(0) or the other way back */
    public function modifyDeviceState($deviceID, $state): bool
    {
        $deviceMod = $this->conn->execute_query(
            "UPDATE device SET state=? WHERE device.id_device=?;"
            , [$state, $deviceID]);

        return boolval($deviceMod);
    }

    /** Change all devices from on(1) to off(0) or the other way back of a certain store */
    public function modifyDeviceStateBulk($newState, $storeId, $devType): bool
    {
        $devBulk = $this->conn->execute_query(
            "UPDATE device LEFT JOIN section ON device.device_section_id = section.id_section LEFT JOIN store ON section.store_id = store.id_store SET state=? WHERE store_id=? AND device_type_id=?;",
            [$newState, $storeId, $devType]
        );
        return boolval($devBulk);
    }

    /** Change the device from on(1) to off(0) or the other way back */
    public function modifyDeviceSetValue($deviceID, $state): bool
    {
        $deviceMod = $this->conn->execute_query(
            "UPDATE control_type SET set_value=? WHERE control_type.device_id=?;"
            , [$state, $deviceID]);

        return boolval($deviceMod);
    }

    public function getCred($userID)
    {
        $credID = $this->conn->execute_query(
            "SELECT id_credentials as id, username, password_hash FROM credentials LEFT JOIN person ON credentials.id_credentials = person.credentials_id WHERE person.id_user=?"
            , [$userID]);

        return $credID->fetch_array();
    }

    public function deleteCredentials($credID)
    {

        $cred = $this->conn->execute_query("DELETE FROM credentials WHERE id_credentials=?", [
            $credID
        ]);
        return boolval($cred);
    }

    public function deletePosition($userID)
    {
        $position = $this->conn->execute_query("DELETE FROM position WHERE user_id=?", [
            $userID
        ]);
        return boolval($position);
    }

    public function deleteUser($userID)
    {
        $position = $this->conn->execute_query("DELETE FROM person WHERE id_user=?", [
            $userID
        ]);
        return boolval($position);
    }

    /** Edit person */
    public function editUserData($userID, $data)
    {
        $person = $this->conn->execute_query("UPDATE person p SET p.employee_number=?, p.first_name=?, p.last_name=?, p.email=?, p.telephone=?, p.address=?, p.date_of_birth=?, p.date_of_employment=? WHERE p.id_user=?", [
            $data['employee_number'],
            $data['first_name'],
            $data['last_name'],
            $data['email'],
            $data['telephone'],
            $data['address'],
            $data['date_of_birth'],
            $data['date_of_employment'],
            $userID
        ]);
        return boolval($person);
    }

    /** Edit position */
    public function editPosition($userID, $storeID, $positionType)
    {
        $person = $this->conn->execute_query("UPDATE position SET position.store_id=?, position.position_type=? WHERE position.user_id=?", [
            $storeID,
            $positionType,
            $userID
        ]);
        return boolval($person);
    }

    /** Edit credentials */
    public function editCredentials($userID, $newPass, $newUsername)
    {
        $cred = $this->getCred($userID)['id'];
        $person = $this->conn->execute_query("UPDATE credentials SET credentials.username=?, credentials.password_hash=? WHERE credentials.id_credentials=?", [
            $newUsername,
            password_hash($newPass, PASSWORD_BCRYPT),
            $userID
        ]);
        return boolval($person);
    }

    public function deleteSection($section_id)
    {
        $position = $this->conn->execute_query("DELETE FROM section WHERE id_section=?", [
            $section_id
        ]);
        return boolval($position);
    }

    public function createDevice($data): int
    {
        $dev = $this->conn->execute_query("INSERT INTO device (device_section_id, name, device_type_id, state, maintenance) VALUES  (?,?,?,?,?)", [
            $data['section_id'],
            $data['name'],
            $data['device_type_id'],
            $data['state'],
            $data['maintenance'],
        ]);
        $dev = $this->conn->execute_query("SELECT MAX(id_device) as id FROM device;", []);
        return $dev->fetch_array()['id'];
    }

    public function creteSensor($data): int
    {
        $sen = $this->conn->execute_query("INSERT INTO sensor (sensor_type_id, sensor_section_id, name) VALUES (?,?,?)", [
            $data['sensor_type_id'],
            $data['sensor_section_id'],
            $data['name']
        ]);

        $sen = $this->conn->execute_query("SELECT MAX(id_sensor) as id FROM sensor;", []);
        return $sen->fetch_array()['id'];
    }

    public function createControlRule($sensor_id, $device_id, $set_value)
    {
        $cRule = $this->conn->execute_query("INSERT INTO control_type (sensor_id, device_id, set_value) VALUES (?,?,?)", [
            $sensor_id, $device_id, $set_value
        ]);
        return boolval($cRule);
    }

    public function addDataPoint($sensor_id, $value, $time): bool
    {
        $dataPoint = $this->conn->execute_query("INSERT INTO sensor_data (sensor_id, value, time) VALUES (?,?,?)", [
            $sensor_id, $value, $time
        ]);
        return boolval($dataPoint);
    }

    public function getSectionDevices(int $sectionId): array
    {
        $data = [];

        $result = $this->conn->execute_query("SELECT device.id_device, device.name as name, control_type.sensor_id FROM device LEFT JOIN control_type ON device.id_device = control_type.device_id LEFT JOIN sensor ON control_type.sensor_id = sensor.id_sensor WHERE device_section_id=?",
            [$sectionId]);
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;
    }

    public function deleteSensor($senID): bool
    {
        $sen = $this->conn->execute_query("DELETE FROM sensor WHERE id_sensor=?", [
            $senID
        ]);
        return boolval($sen);
    }

    public function deleteDevice($devID): bool
    {
        $dev = $this->conn->execute_query("DELETE FROM device WHERE id_device=?", [
            $devID
        ]);
        return boolval($dev);
    }

    public function createSection(int $storeID, string $name)
    {
        $dev = $this->conn->execute_query("INSERT INTO section (store_id, name) VALUES (?,?)", [
            $storeID, $name
        ]);
        return boolval($dev);
    }
    public function getPosition(int $positionID): array
    {
        $result = $this->conn->execute_query(
            "SELECT name FROM position_type WHERE position_type.id_position=?;"
            , [$positionID]);

        return $result->fetch_array();
    }

    public function changeUsername(int $userId, string $username): bool
    {
        $usr = $this->conn->execute_query("UPDATE person LEFT JOIN credentials ON person.credentials_id = credentials.id_credentials SET credentials.username=? WHERE person.id_user=?;", [
            $username, $userId
        ]);
        return boolval($usr);
    }
    public function changePassword(int $userId, string $passWord): bool
    {
        $pas = $this->conn->execute_query("UPDATE person LEFT JOIN credentials ON person.credentials_id = credentials.id_credentials SET credentials.password_hash=? WHERE person.id_user=?;", [
            $passWord, $userId
        ]);
        return boolval($pas);
    }

}

