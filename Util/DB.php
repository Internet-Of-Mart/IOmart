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

    public function getStoreSections($storeID): array
    {
        $data = [];

        $result = $this->conn->execute_query("SELECT section.id_section, section.store_id, section.name FROM section LEFT JOIN store ON section.store_id = store.id_store WHERE id_store=? GROUP BY  section.name;",[$storeID]);
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;
    }

    public function getDeviceTypeSection($sectionID): array
    {
        $data = [];

        $result = $this->conn->execute_query("SELECT COUNT(id_section) as amount, id_section, device.id_device, device_type.name FROM section LEFT JOIN device ON section.id_section = device.device_section_id LEFT JOIN device_type ON device.device_type_id = device_type.id_type WHERE section.id_section=? GROUP BY device.name;",[$sectionID]);
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;
    }

    public function getStoreSensorTypeData($sensorType, $storeID): array
    {
        $data = [];

        $result = $this->conn->execute_query("SELECT store.name, sum(sensor_data.value) as `value`, date_format(sensor_data.time, '%Y-%m-%d') as `date` FROM sensor_data LEFT JOIN sensor ON sensor_data.sensor_id = sensor.id_sensor LEFT JOIN section ON sensor.sensor_section_id = section.id_section LEFT JOIN store ON section.store_id = store.id_store WHERE sensor.sensor_type_id=? AND store.id_store=? GROUP BY sensor_data.time, store.name;",[$sensorType,$storeID]);
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;
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
            )   AS sensor_data ON sensor_data.sensor_id = sensor.id_sensor WHERE device.device_section_id=? AND device.device_type_id=?;",[$sectionID, $type]);
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
) AS sensor_data ON sensor_data.sensor_id = sensor.id_sensor WHERE store.id_store=? AND device.device_type_id=? ;",[$storeID, $type]);
        while ($row = $result->fetch_array()) {
            $data[] = $row;
        }
        return $data;
    }

}
