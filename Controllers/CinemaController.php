<?php
    namespace Controllers;
    use DAO\CinemaDAO as CinemaDAO;
    Use Models\Cinema as Cinema;
    
    class CinemaController
    {
        private $cinemaDAO;
        
        public function __construct(){
            $this->cinemaDAO = new CinemaDAO();
        }

        public function ShowAdminHomeView($message = "")
        {
            require_once(ADMIN_PATH."homeAdmin.php");
        }

        public function ShowRemoveView($message = "")
        {
            require_once(ADMIN_PATH."list_cinema.php");
        }

        public function ShowAddView($message = "")
        {
            require_once(ADMIN_PATH."add_cinema.php");
        }

        public function ShowHomeView($message = "")
        {
            require_once(VIEWS_PATH."home.php");
        }

        public function ShowEditView()
        {
            if($_POST){
                $id = $_POST['id'];
                $cinemaList = $this->cinemaDAO->GetAll();
                $Cinema = $this->cinemaDAO->returnCinemaById($id);
                require_once(ADMIN_PATH."edit_cinema.php");
            }
        }
        public function registerCinema($message = "")
        {
            require_once(VIEWS_PATH."auxi.php");
        }

        
        public function register(){
            $name = $_POST['name'];
            $total_capacity = $_POST['total_capacity'];
            $address = $_POST['address'];
            $ticket_price = $_POST['ticket_price'];
            $name = trim($name);
            if(empty($name))
            {
                $_SESSION['msg'] = 'complete los campos';
                require_once(ADMIN_PATH."add_cinema.php");
            }
            else{
                try{
                    if(! $this->checkCinema($_POST['name']))
                    { 
                        $cinema = new Cinema($_POST['name'] , $_POST['address'], $_POST['ticket_price'], $_POST['total_capacity']);
                        $this->cinemaDAO->Add($cinema);
                        $_SESSION['msg'] = "Cine agregado correctamente";
                    }
                    else{
                        $_SESSION['msg'] = "el cine ya se encuentra registrado";
                        require_once(ADMIN_PATH."add_cinema.php");
                    }
                }
                catch(\PDOException $ex){
                    $message = "Exception";
                    throw $ex;
                }
                finally{
                    require_once(ADMIN_PATH."homeAdmin.php");
                }
            }
            
        }

        public function removeCinema(){
            if($_POST){
                $name = $_POST["name"];
                $this->cinemaDAO->Remove($name);
                $this->ShowRemoveView("Eliminado con exito");
            }
        }

        public function checkCinema($name)
        {
            $cinema = $this->cinemaDAO->read($name);
            if($cinema)
                return true;
            else
                false;
        }


        public function editCinema(){
            if($_POST){
                $Cinema = new Cinema($_POST['name'] , $_POST['address'], $_POST['ticket_price'], $_POST['total_capacity']);
                $this->cinemaDAO->Edit($Cinema);                
                $this->ShowAdminHomeView();
            }
        }
    }
?>