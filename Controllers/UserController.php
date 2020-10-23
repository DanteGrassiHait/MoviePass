<?php
    namespace Controllers;

    use DAO\UserDAO as UserDAO;
    Use Models\User as User;

    class UserController
    {
        private $userDAO;
        
        public function __construct(){
            $this->userDAO = new UserDAO();
        }

        public function ShowMenuView($message)
        {
            require_once(USER_PATH."homeUser.php");
        }
        public function ShowMainView()
        {
            require_once("home.php");
        }
        
        // public function ShowRegisterView()
        // {
        //     require_once(VIEWS_PATH."register.php");
        // }

        public function ShowRegisterView(){
            require_once(USER_PATH."ShowRegisterView.php");
        }

        public function ShowAdminMenuView($message)
        {  
            
            require_once(ADMIN_PATH."homeAdmin.php");
        }
      
        public function ShowAdminRegisterView()
        {
            require_once(USER_PATH."registerAdmin.php");
        }

        public function RegisterNew(){
            if($_POST){
                $email = isset($_POST["email"]) ? $_POST["email"] : "";
                $password = isset($_POST["password"]) ? $_POST["password"] : "";
                $name = isset($_POST["name"]) ? $_POST["name"] : "";
                $lastName = isset($_POST["lastName"]) ? $_POST["lastName"] : "";
                $id = isset($_POST["id"]) ? $_POST["id"] : "";
                
                $user = new User();
                $user->setEmail($email);
                $user->setPassword($password);
                $user->setRol('user');
                
                $userDAO = new UserDAO();
                $valid = $userDAO->Add($user);
                // if(empty($valid)){
                //     $this->
                // }
            }
        }

        // [
        //     {
        //         "user": null,
        //         "pass": "admin",
        //         "rol": "admin"
        //     },
        //     {
        //         "user": null,
        //         "pass": "user",
        //         "rol": "user"
        //     },
        //     {
        //         "user": null,
        //         "pass": "asd",
        //         "rol": "user"
        //     },
        //     {
        //         "user": "gianniricciardi3779@gmail.com",
        //         "pass": "12123213",
        //         "rol": "user"
        //     }
        // ]

        public function login()
        {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $userList = $this->userDAO->GetAll();
           
            $count = 0;
            $error = NULL;

            foreach($userList as $user){
                if(($user -> getEmail() == $email) && ($user -> getPassword() == $password)){

                    $count = 1;
                    
                    $loggedUser = new User();
                    $loggedUser->setEmail($email);
                    $loggedUser->setPassword($password);
                    $loggedUser->setRol($user->getRol());

                    $_SESSION["loggedUser"] = $loggedUser;
                    
                    $message = "Login Successfully";
                    if($user->getRol() == 'user')
                    {
                        $this->ShowMenuView($message);
                    }
                    else if ($user->getRol() == 'admin')
                    {
                        $this->ShowAdminMenuView($message);
                    }
                    
                }
            }
            if ($count === 0){
                $error = 1;
                require_once(VIEWS_PATH."home.php");
            }
           
        }  
        
        public function register(){
            
            $userName = $_POST['email'];
            $password = $_POST['password'];
            $rol = 'user';
            
            

            

            
            $newUser = new User();
        
            $newUser->setEmail($userName);
            $newUser->setPassword($password);
            $newUser->setRol($rol);
            //$newUser ->setClient($newClient);

        
            $newUserRepository = new UserDAO();
            $valid = $newUserRepository->Add($newUser);
        
            if ($valid === 0){
                $error = "invalid";
                require_once(VIEWS_PATH."register.php");
            }else{
                //usar require ya que permite el pasaje de la variable para mensajes, si uso la funcion show no puedo pasar vars.
                $error = "03";
                require_once(VIEWS_PATH."main.php");
            }
        
        }
        /*
        public function registerAdmin(){
            
            $userName = $_POST['email'];
            $password = $_POST['password'];
            $rol = 'admin';
            
            $newUser = new User();
        
            $newUser->setEmail($userName);
            $newUser->setPassword($password);
            $newUser->setRol($rol);

        
            $newUserRepository = new UserDAO();
            $valid = $newUserRepository->Add($newUser);
        
            if ($valid === 0){
                $error = "invalid";
                require_once(VIEWS_PATH.ADMIN_PATH."registerAdmin.php");
            }else{
                //usar require ya que permite el pasaje de la variable para mensajes, si uso la funcion show no puedo pasar vars.
                $error = "03";
                require_once(VIEWS_PATH."main.php");
            }
        
        }
        */

        public function logout(){

            session_destroy();

            $message = "Logout Successfully";

            $this->ShowMainView($message);
        }
        
    }
?>