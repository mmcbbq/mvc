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

    public function create(array $data)
    {
        // "name"=> "Bob", "email" => "bob@bob.de"

        $query = "INSERT INTO $this->tablename (";
        $columns = "";
        $params = "";
        foreach ($data as $key=>$column){
            $columns .= $key. ", ";
            $params .= ":".$key.", ";
        }

        $columns = trim($columns, ", ");
        $params = trim($params,", ");


        $query.= $columns.') VALUES ('.$params.")";
//        echo $query;
        $this->query($query,$data);
    }

    public function delete(int $id)
    {
        $query = "DELETE FROM $this->tablename where id = :id";
        return $this->query($query,[":id"=>$id]);


    }

}