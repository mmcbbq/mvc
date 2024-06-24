<?php

abstract class Database
{
    protected string $tablename = "abstract";
    static protected PDO|null $con = null;

    private function connect()
    {
        $db = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
        if (self::$con === null) {
            self::$con = new PDO($db, DB_USER, DB_PW);
        }
        return self::$con;
    }

    /**
     * @param string $sql
     * @param array $data
     * @return Database[]|false
     */
    protected function query(string $sql, array $data = []): array|false
    {
        $con = $this->connect();
        $stmt = $con->prepare($sql);
        $check = $stmt->execute($data);
        if ($check) {
            $result = $stmt->fetchAll(PDO::FETCH_CLASS, $this->tablename);
            if (is_array($result) && count($result)) {
                return $result;
            }
        }
        return false;
    }

    public function getLastId():string|false
    {
        return self::$con->lastInsertId();

    }


}

