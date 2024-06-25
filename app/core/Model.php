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

    public function update(array $data)
    {
        $sql ="Update $this->tablename set "; //"Update $this->tablename set (name = :name, email = :email) where id=:id;

        $columns = "";
        $params = "";
        foreach ($data as $key=>$column){
            if ($key === 'id'){
                continue;
            }
            $columns .= $key. "= :".$key.", ";  // name, email, password,

        }
        $columns = trim($columns, ", ");

        $sql.= $columns .' where id = :id' ;
//        echo $sql;
        $this->query($sql, $data);
    }

    public function create(array $data)
    {
        // "name"=> "Bob", "email" => "bob@bob.de"

        $query = "INSERT INTO $this->tablename (";
        $columns = "";
        $params = "";
        foreach ($data as $key=>$column){
            $columns .= $key. ", ";  // name, email, password,
            $params .= ":".$key.", "; // :name, :email, :password,
        }

        $columns = trim($columns, ", ");
        $params = trim($params,", ");


        $query.= $columns.') VALUES ('.$params.")"; //"INSERT INTO User (name, email, password) VALUES( :name, :email, :password )
//        echo $query;
        $this->query($query,$data);
    }

    public function delete(int $id)
    {
        $query = "DELETE FROM $this->tablename where id = :id";
        return $this->query($query,[":id"=>$id]);


    }

}