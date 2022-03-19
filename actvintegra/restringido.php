<?php

session_start();

if(isset($_SESSION['admin'])){ // si existe esta sesión
    //echo 'Bienvenido '. $_SESSION['admin'];
   // echo '<br><button class="btn btn-primary  mt-3"><a href="cerrar.php">Cerrar sesión</a></button>';
    header('Location:principal/index.php');
}else{
    header('Location:registro.php');
}
?>