<?php
    namespace DAO;

    use Models\Cinema as Cinema;

    class CinemaDAO{
        
    private $connection;

    public function Add(Cinema $Cinema){
        $sql = "INSERT INTO cinemas (id_cinema, name, address, total_capacity) VALUES (:id_cinema, :name, :address, :total_capacity)";

        $parameters['id_cinema'] = 0;
        $parameters['name'] = $Cinema->getName();
        $parameters['address'] = $Cinema->getAddress();
        try{
            $this->connection = Connection::getInstance();
            return $this->connection->executeNonQuery($sql, $parameters);
        }
        catch(\PDOException $ex){
            throw $ex;
        }
    }

    public function Edit(Cinema $Cinema){
        $sql = "INSERT INTO cinemas (id_cinema, name, address, total_capacity) VALUES (:id_cinema, :name, :address, :total_capacity)";

        $parameters['id_cinema'] = $Cinema->getId();
        $parameters['name'] = $Cinema->getName();
        $parameters['address'] = $Cinema->getAddress();
        $parameters['total_capacity'] = $Cinema->getTotalCapacity();
        try{
            $this->connection = Connection::getInstance();
            return $this->connection->executeNonQuery($sql, $parameters);
        }
        catch(\PDOException $ex){
            throw $ex;
        }
    }

    public function Remove($name){
        $sql = "DELETE FROM cinemas WHERE name = :name";
        $parameters['name'] = $name;
        try{
            $this->connection = Connection::getInstance();
            return $this->connection->executeNonQuery($sql, $parameters);
        }
        catch(\PDOException $ex){
            throw $ex;
        }
    }

    public function read($name){
        $sql = "SELECT * FROM cinemas WHERE name = :name";
        $parameters['name'] = $name;
        try{
            $this->connection = Connection::getInstance();
            $result = $this->connection->execute($sql,$parameters);
        }
        catch(\PDOException $ex){
            throw $ex;
        }
        if(!empty($result))
            return $this->map($result);
        else
            return false;
    }

    public function map($value){
        $value = is_array($value) ? $value : [];
        $resp = array_map(function($p){
            return new Cinema($p['id_cinema'],$p['name'],$p['address'],$p['total_capacity']);
        }, $value);
        return count($resp) > 0 ? $resp : $resp['0'];
    }

    public function GetAll(){
        $sql = "SELECT * FROM cinemas";
        try{
            $this->connection = Connection::getInstance();
            $result = $this->connection->execute($sql);
        }
        catch(\PDOException $ex){
            throw $ex;
        }
        if(!empty($result))
            return $this->map($result);
        else
            return false;
    }

    public function CompareName($name){
        $CinemaList= $this->GetAll();
        foreach ($CinemaList as $Cinema){
            if ($Cinema->getName() == $name){
                return true;
            }
        }
        return false;
    }

    public function returnCinemaById($id){
        $CinemaList= $this->GetAll();
        foreach ($CinemaList as $Cinema){
            if ($Cinema->getId() == $id){
                return $Cinema;
            }
        }
        return false;
    }
}
?>