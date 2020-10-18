<?php
namespace Models;

class Cinema {
    private $id;
    private $name;
    private $address;
    private $totalCapacity;
    private $inputValue;

    public function __construct()
    {
        
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

	public function getAddress(){
		return $this->address;
	}

	public function setAddress($address){
		$this->address = $address;
	}

	public function getTotalCapacity(){
		return $this->totalCapacity;
	}

	public function setTotalCapacity($totalCapacity){
		$this->totalCapacity = $totalCapacity;
	}

	public function getInputValue(){
		return $this->inputValue;
	}

	public function setInputValue($inputValue){
		$this->inputValue = $inputValue;
	}
}
?>