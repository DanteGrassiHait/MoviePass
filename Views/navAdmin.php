<?php


if (!isset($_SESSION["loggedUser"])){
  header("location:../Home/Index");
  exit;
}


?>
  <div class="wrapper row1">
    <header id="header" class="hoc clear"> 
      <div id="logo" class="fl_left">
      <h1><a href="<?php //echo ADMINS_PATH; ?>homeAdmin.php"><img src="https://images.cooltext.com/5473653.gif"></a></h1>
      </div>
      
      <nav id="mainav" class="fl_right">
        
            <li class="active"><a href="<?php echo FRONT_ROOT; ?>Cinema/ShowRemoveView">Editar / Eliminar Cine</a></li>
            <li class="active"><a href="<?php echo FRONT_ROOT; ?>Cinema/ShowAddView">Agregar Cine</a></li>
            <li class="active"><a href="<?php echo FRONT_ROOT; ?>User/logout">Logout</a></li>
        
    </nav> 
    </header>
  </div>