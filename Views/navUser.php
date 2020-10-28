<?php
Use Models\User as User;
$user = new User;
$user = $_SESSION['loggedUser'];

if(!isset($_SESSION['loggedUser'])){
      header("location:../Home/Index");
      exit;
}
?>

  <div class="wrapper row1">
    <header id="header" class="hoc clear"> 
      <div id="logo" class="fl_left bottom">
        <h1><a href="<?php //echo USERS_PATH; ?>homeUser.php"><img src="https://images.cooltext.com/5476130.png"></a></h1>
      </div>
      
      <nav id="mainav" class="fl_right">
        <li class="active"><a href="<?php echo FRONT_ROOT; ?>Billboard/showMovies">Lista de Peliculas</a></li>
        <li class="active"><a href="<?php echo FRONT_ROOT; ?>User/logout">Logout</a></li>
    </nav> 
    </header>
  </div>
