<?php 
    namespace Controllers;

    use DAO\CinemaRoomDAO;
    use Models\CinemaRoom;

    class cinemaRoomController{
        private $cinemaRoomDAO;

        public function __construct()
        {
            $this->cinemaRoomDAO = new CinemaRoomDAO();
        }


    }
?>