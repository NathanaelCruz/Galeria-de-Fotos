<?php

namespace PhotoGallery\DB;

class Sql
{

    CONST DBNAME   = "photo_gallery_db";
    CONST HOSTNAME = "127.0.0.1";
    CONST USERNAME = "root";
    CONST PASSWORD = "";

    private $conn;

    public function __construct()
    {
        
        $this->conn = new \PDO("mysql:dbname=" . Sql::DBNAME . ";host=" . Sql::HOSTNAME, Sql::USERNAME, Sql::PASSWORD);

    }

    private function setParam($stmt, $parameters)
    {

        foreach ($parameters as $key => $value) {
            $this->bindParam($stmt, $key, $value);
        }

    }

    private function bindParam($stmt, $key, $value)
    {
        $stmt->bindParam($key, $value);
    }

    public function query($rawQuery, $params = array())
    {

        $stmt = $this->conn->prepare($rawQuery);

        $this->setParam($stmt, $params);

        $stmt->execute();

    }

    public function select($rawQuery, $params = array()):array
    {

        $stmt = $this->conn->prepare($rawQuery);

        $this->setParam($stmt, $params);

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

}

?>