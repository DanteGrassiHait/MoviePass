<?php
    namespace DAO;

    use Models\User as User;

    class UserDAO{

    private $userList = array();
    private $fileName;


    public function Add(User $user){
        $sql = "INSERT INTO users (id_user, email, password, role) VALUES (:id_user, :email, :password, :role)";

        $parameters['id_user'] = 0;
        $parameters['email'] = $user->getEmail();
        $parameters['password'] = $user->getPassword();
        $parameters['role'] = 0;
        try{
            $this->connection = Connection::getInstance();
            return $this->connection->executeNonQuery($sql, $parameters);
        }
        catch(\PDOException $ex){
            throw $ex;
        }
    }

    public function read($email){

        $sql = "SELECT * FROM users WHERE email = :email";
        $parameters['email'] = $email;
        try{
            $this->connection = Connection::getInstance();
            $result = $this->connection->execute($sql,$parameters);
        }
        catch(\PDOException $ex){
            throw $ex;
        }
        if(!empty($result)){
            return $this->map($result);
        }
        else
            return false;
    }

    public function map($value){
        $value = is_array($value) ? $value : [];
        $resp = array_map(function($p){
            return new User($p['id_user'],$p['email'],$p['password'],$p['id_role']);
        }, $value);
        return count($resp) > 1 ? $resp : $resp['0'];
    }
}
?>