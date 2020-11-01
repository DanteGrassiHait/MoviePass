<?php
    namespace Controllers;

    use DAO\UserDAO as UserDAO;
    Use Models\User as User;
    use Controllers\BillboardController;

    class UserController
    {
        private $userDAO;
        
        public function __construct(){
            $this->userDAO = new UserDAO();
        }

        public function ShowMenuView($message)
        {
            $billboard = new BillboardController();
            $billboard->ShowMovies();
        }
        public function ShowMainView()
        {
            require_once(FRONT_ROOT."home.php");
        }

        public function ShowRegisterView(){
            require_once(USERS_PATH."ShowRegisterView.php");
        }

        public function ShowAdminMenuView($message)
        {  
            
            require_once(ADMIN_PATH."homeAdmin.php");
        }
      
        public function ShowAdminRegisterView()
        {
            require_once(USER_PATH."registerAdmin.php");
        }

        public function checkUser($email)
        {
            $user = $this->userDAO->read($email);
            if($user)
                return true;
            else
                false;
        }

        public function login()
        {
            $email = $_POST["email"];
            $password = $_POST["password"];
            try{
                    $user = $this->userDAO->read($_POST["email"]);
                    //var_dump($user);
                    if($user->getPassword() == $password){
                        $_SESSION["loggedUser"] = $user;
                        $message = "Login Successfully";
                        if($user->getRol() == 2) //user
                        {
                            $_SESSION['home'] = FRONT_ROOT.'Billboard/showMovies';
                            $this->ShowMenuView($message);
                        }
                        else if ($user->getRol() == 1) //admin
                        {
                            $_SESSION['home'] = FRONT_ROOT.'Cinema/ShowAdminHomeView';
                            $this->ShowAdminMenuView($message);
                        }   
                    }else{
                        $message= "Wrong Username";
                        require_once(VIEWS_PATH."home.php");
                    }
            }
            catch(\PDOException $ex){
            }
        }  
        
        public function register(){
            $email = $_POST['email'];
            $password = $_POST['password'];
            try{
                if(! $this->checkUser($_POST['email']))
                {
                    $user = new User(null, $_POST['email'] , $_POST['password'] , 0);
                    $this->userDAO->Add($user);
                    $message = "Usuario registrado correctamente";
                }
                else
                    $message = "El usuario ya se encuentra registrado";
            }
            catch(\PDOException $ex){
                $message = "Exception";
                throw $ex;
            }
            finally{
                require_once(VIEWS_PATH."home.php");
            }
        }

        public function logout(){
            session_destroy();
            $message = "Logout Successfully";
            $this->ShowMainView($message);
        }
    }
?>