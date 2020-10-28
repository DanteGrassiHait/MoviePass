<?php
    require_once("Config/Autoload.php");

    use Models\User as User;

    if($_POST){
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";
        $name = isset($_POST["name"]) ? $_POST["name"] : "";
        $lastName = isset($_POST["lastName"]) ? $_POST["lastName"] : "";
        $id = isset($_POST["id"]) ? $_POST["id"] : "";

        if(($email != "user@myapp.com") && ($password != "123456")){
            $user = new User();
            $user->setEmail($email);
            $user->setPassword($password);

            session_start();

            $_SESSION["loggedUser"] = $user;
            header("location:Add-form.php");
        }

        else{
            echo "Error en los datos de ingreso.";
        //Luego de 5 segundos (refresh), redirecciono el sitio web a esa ruta...
        header("Refresh: 5, url=http://localhost/MoviePass/Views/user/ShowRegisterView");
        }

    }
?>