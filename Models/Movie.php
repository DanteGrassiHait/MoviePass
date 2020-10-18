<?php

namespace Models;

class Movie {
    private $name;
    private $score;
    private $uploadingDate;
    private $genres;
    private $director;
    private $duration;

    public function __construct() 
    {
        $this->genres = array();
    }    
    
    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    
    public function getScore() {
        return $this->score;
    }
    
    public function setScore($score) {
        $this->score = $score;
    }
    
    public function getUploadingDate() {
        return $this->uploadingDate;
    }
    
    public function setUploadingDate($uploadingDate) {
        $this->uploadingDate = $uploadingDate;
    }
    
    public function getGenres() {
        return $this->genres;
    }
    
    public function getNameGenres() {
        $string = "";
        foreach($this->genres as $genre) {
            $string = $string . " | " . $genre->getName();
        }
        $string = $string . " | "; 
        return $string;
    }
    
    public function setGenres($genres) {
        $this->genres = $genres;
    }
    
    public function addGenre($genre) {
        array_push($this->genres, $genre);
    }

    public function getDirector(){
		return $this->director;
	}

	public function setDirector($director){
		$this->director = $director;
	}
    
    public function getDuration(){
        return $this->duration;
    }
    
    public function setDuration($duration){
        $this->duration = $duration;
    }
}



?>