<?php
include 'config.php';
/**
 * Database Connection
 */
class DbConnect
{
    private $servername = "";
    private $username = "";
    private $password = "";
    private $dbname = "";

    public function __construct($servername, $username, $password, $dbname)
    {
        if ($servername) {
            $this->servername = $servername;
            $this->username = $username;
            $this->password = $password;
            $this->dbname = $dbname;
        } else {
            $this->servername = SERVERNAME;
            $this->username = USERNAME;
            $this->password = PASSWORD;
            $this->dbname = DBNAME;
        }
    }

    public function connect()
    {
        try {
            $conn = new PDO('mysql:host=' . $this->servername . ';dbname=' . $this->dbname, $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql_array = [
                "SET character_set_client='utf8mb4'",
                "SET character_set_results='utf8mb4'",
                "SET character_set_connection='utf8mb4'"
            ];
            foreach ($sql_array as $sql) {
                $conn->query($sql);
            }
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function disconnect()
    {
        $this->conn = null;
    }

    public function get($sql, $data = array())
    {
        $dbConn = new DbConnect("", "", "", "");
        $conn = $dbConn->connect();
        $stm = $conn->prepare($sql);
        $stm->execute($data);
        $data = $stm->fetch();
        $dbConn->disconnect();
        return $data;
    }

    public function getAll($sql)
    {
        $dbConn = new DbConnect("", "", "", "");
        $conn = $dbConn->connect();
        $stm = $conn->prepare($sql);
        $stm->execute();
        $data = $stm->fetchAll();
        $dbConn->disconnect();
        return $data;
    }

    public function insertData($sql, $data = array())
    {
        $dbConn = new DbConnect("", "", "", "");
        $conn = $dbConn->connect();
        $stm = $conn->prepare($sql);
        try {
            if ($stm->execute($data)) {
                return 1;
            }
        } catch (Exception $e) {
            return 0;
        }
        $dbConn->disconnect();
    }

    public function deleteData($sql, $data = array())
    {
        $dbConn = new DbConnect("", "", "", "");
        $conn = $dbConn->connect();
        $stm = $conn->prepare($sql);
        try {
            if ($stm->execute($data)) {
                return 1;
            }
        } catch (Exception $e) {
            return 0;
        }
        $dbConn->disconnect();
    }

    public function updateData($sql, $data = array())
    {
        $dbConn = new DbConnect("", "", "", "");
        $conn = $dbConn->connect();
        $stm = $conn->prepare($sql);
        try {
            if ($stm->execute($data)) {
                return 1;
            }
        } catch (Exception $e) {
            return 0;
        }
        $dbConn->disconnect();
    }
}