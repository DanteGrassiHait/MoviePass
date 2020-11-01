<?php  
    namespace DAO;

    use Models\CinemaRoom;

    class CinemaRoomDAO{
        
        private $connection;
        

        public function Add(CinemaRoom $CinemaRoom){
            $sql = "INSERT INTO rooms (id_room, name, price, seatingCapacity, idCinema) VALUES (:id_room, :name, :price, :seatingCapacity, :idCinema)";
            $parameters['id_room'] = 0;
            $parameters['name'] = $CinemaRoom->getName();
            $parameters['price'] = $CinemaRoom->getPrice();
            $parameters['seatingCapacity'] = $CinemaRoom->getSeatingCapacity();
            $parameters['idCinema'] = $CinemaRoom->getIdCinema();
            try{
                $this->connection = Connection::getInstance();
                return $this->connection->executeNonQuery($sql, $parameters);
            }
            catch(\PDOException $ex){
                throw $ex;
            }
        }

        public function Edit(CinemaRoom $CinemaRoom){
            $sql = "UPDATE rooms SET id_room = :id_room, name = :name, price = :price, seatingCapacity = :seatingCapacity   WHERE id_room = :id_room";
            $parameters['id_room'] = $CinemaRoom->getId();
            $parameters['name'] = $CinemaRoom->getName();
            $parameters['price'] = $CinemaRoom->getPrice();
            $parameters['seatingCapacity'] = $CinemaRoom->getSeatingCapacity();
            $parameters['idCinema'] = $CinemaRoom->getIdCinema();
            try{
                $this->connection = Connection::getInstance();
                return $this->connection->executeNonQuery($sql, $parameters);
            }
            catch(\PDOException $ex){
                throw $ex;
            }
        }

        public function Remove($name){
            $sql = "DELETE FROM rooms WHERE name = :name";
            $parameters['name'] = $name;
            try{
                $this->connection = Connection::getInstance();
                return $this->connection->executeNonQuery($sql, $parameters);
            }
            catch(\PDOException $ex){
                throw $ex;
            }
        }

        protected function map($value){
            $value = is_array($value) ? $value : [];
            $resp = array_map(function($p){
                return new CinemaRoom($p['id'],$p['name'],$p['price'],$p['seatingCapacity'], $p['idCinema']);
            }, $value);
            return count($resp) > 1 ? $resp : $resp['0'];
        }

        public function read($name){
            $sql = "SELECT * FROM rooms WHERE name = :name";
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

        public function GetAll(){
            $sql = "SELECT * FROM rooms";
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
    }
?>