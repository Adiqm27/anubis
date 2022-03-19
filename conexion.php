<?php
    //$conexion = new mysqli("localhost", "root", "adilene", "joyeria");

$user = 'root';
$pass = 'adilene';

$link = 'mysql:host=localhost;dbname=joyeria';

try {
$conexion = new PDO($link, $user, $pass);
   // echo 'conectado';

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

    if($conexion){
        //echo "Conexion exitosa";
    }
    else{
        echo "Conexion fallida";
    }