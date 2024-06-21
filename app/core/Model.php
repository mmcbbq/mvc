<?php
class Model extends Database
{

    public function findAll()
    {
        $query = "SELECT * FROM $this->name";
        return $this->query($query);
    }

}