<?php
class Model extends Database
{

    /**
     * @return self[]
     */
    public function findAll(): array
    {
        $query = "SELECT * FROM $this->tablename";
        return $this->query($query);
    }

    public function findById(int $id)
    {
        $query = "SELECT * FROM $this->tablename where id = :id";
        $result = $this->query($query,[':id'=>$id]);
        if ($result)
        return $result[0];
        else{
            return false;
        }

    }

    public function update()
    {
        
    }

    public function create()
    {
        
    }

    public function delete()
    {
        
    }

}