<?php 
    namespace Models;

    class CinemaRoom{
        private $id;
        private $name;
        private $price;
        private $seatingCapacity;

        public function __construct(){
            
        }

        public function getId(){
            return $this->id;
        }
    
        public function setId($id){
            $this->id = $id;
        }
    
        public function getName(){
            return $this->name;
        }
    
        public function setName($name){
            $this->name = $name;
        }
    
        public function getPrice(){
            return $this->price;
        }
    
        public function setPrice($price){
            $this->price = $price;
        }
    
        public function getSeatingCapacity(){
            return $this->seatingCapacity;
        }
    
        public function setSeatingCapacity($seatingCapacity){
            $this->seatingCapacity = $seatingCapacity;
        }

    }
?>