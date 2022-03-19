<?php
session_start();
include_once 'conexion.php';

$usuario_login = $_POST['nombre_usuario']; // guardar en la nueva variable lo que por medio del POST capturamos en 'nombre_usuario'
$contrasena_login = $_POST['contrasena'];

$sql = 'SELECT * FROM usuarios WHERE nombre = ?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($usuario_login));
$resultado = $sentencia->fetch(); //Tira un true o false en base a si encontró o no un registro

if(!$resultado){
    //matar la operación
    echo 'No existe el usuario';
    echo '<br><button class="btn btn-primary  mt-3"><a href="registro.php">Regresar</a></button>';
    die();
    
}
echo 'Usuario verificado ';

if (password_verify($contrasena_login , $resultado['contrasena'])){ //la primera es la que ingresa el usuario y la segunda es la que viene de la base de datos
    //contraseñas iguales
    $_SESSION['admin'] = $usuario_login; // estamos iniciando una sesión admin que va a ser igual al usuario
    ///aquiiiiiiiiiiiiiiiiiiiiiii
    header('Location:../index.php');
    

}else{
    echo 'Las contraseñas no son iguales';
echo '<br><button class="btn btn-primary  mt-3"><a href="registro.php">Regresar</a></button>';

    die();
}


?>