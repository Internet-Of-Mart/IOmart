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


}
