<?php
require_once(VIEWS_PATH."navUser.php");
?>
<main class="d-flex align-items-center justify-content-center height-100 form bg-dark-transparent rounded" >
<div>
    <div>
        <div>
        <?php
            use DAO\CinemaDAO;
            $cinemaDAO = new CinemaDAO();
            $cinemaList = $cinemaDAO->GetAll();
            foreach($cinemaList as $cinema){
                        echo "<div>";
                                echo "<div class='data'>
                                        Nombre: ".$cinema->getName()."
                                        </div>";
                                echo "<div class='data'>                                        
                                        Direccion: ".$cinema->getAddress()."
                                        </div>";
                                echo "<div class='data'>
                                        Precio de entrada: ".$cinema->getTicketPrice()."
                                        </div>";
                                echo "<div class='data'>
                                        Capacidad Maxima: ".$cinema->getTotalCapacity()."
                                        </div>";
                            echo "</div>
                                </div>";
                        echo "<br></div>";
                }
        ?>
        </div>
    </div>
</div>
</main>