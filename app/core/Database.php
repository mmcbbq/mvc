<?php

abstract class Database
{
    protected string $name = "abstract";

    private function connect()
    {
        $db = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
        $con = new PDO($db,DB_USER,DB_PW);
        return $con;
    }

    /**
     * @param string $sql
     * @param array $data
     * @return Database[]|false
     */
    protected function query(string $sql, array $data =[]) :array|false
    {
        $con = $this->connect();
        $stmt = $con->prepare($sql);
        $check = $stmt->execute($data);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS,$this->name);
        return $result;
    }


}

