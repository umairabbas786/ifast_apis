<?php

class AppDB {
    const HOSTNAME = "localhost";
    const USERNAME = "root";
    const PASSWORD = "";
    const DATABASE = "ifast";

    private mysqli $conn;

    private DriverDao $driverDao;

    function __construct() {
        $temp_conn = mysqli_connect(self::HOSTNAME, self::USERNAME, self::PASSWORD, self::DATABASE);

        if (!$temp_conn) {
            die("Couldn't Connect to DB!");
        }

        $this->conn = $temp_conn;

        mysqli_query($this->conn, (new DriverTableSchema())->getBlueprint()); // Creates Driver Table
        $this->driverDao = new DriverDao($this->conn); // Initialize Driver Dao

    }

    public function getConnection(): mysqli {
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn->close();
    }

    public function getDriverDao(): DriverDao {
        return $this->driverDao;
    }
}

