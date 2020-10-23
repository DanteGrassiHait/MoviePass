<?php
    namespace DAO;

    use Models\Movie as Movie;

    class MovieDAO
    {
        private $movie_list = array();

        public function __construct()
        {
            $url = API_MAIN_LINK."movie/now_playing?api_key=".API_KEY; 

            $movieArray = json_decode(file_get_contents($url), true);
            if($movieArray && $movieArray['results'] && count($movieArray['results']) != 0)
            {
                foreach($movieArray['results'] as $jsonMovie)
                {
                    $new_movie = new Movie();
                    $new_movie->setIdapi($jsonMovie['id']);
                    $new_movie->setDescription($jsonMovie['overview']);
                    $new_movie->setName($jsonMovie['title']);
                    $new_movie->setImage($jsonMovie['poster_path']);
                    $new_movie->setGenreIds($jsonMovie['genre_ids']);
                    $new_movie->setLanguage($jsonMovie['original_language']);
                    array_push($this->movie_list, $new_movie);
                }
            }
        }

        public function getAllMovies()
        {
            return $this->movie_list;
        }
        
    }
?>