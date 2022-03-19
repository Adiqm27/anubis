<?php
include_once 'conexion.php';
//echo password_hash("pantoja", PASSWORD_DEFAULT)."\n";

//CAPTURAR DATOS POR MÉTODO POST
$usuario_nuevo = $_POST['nombre_usuario'];
$contrasena = $_POST['contrasena'];
$contrasena2 = $_POST['contrasena2'];

//VERIFICAR SI EL USUARIO YA EXISTE
$sql = 'SELECT * FROM usuarios WHERE nombre = ?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($usuario_nuevo));
$resultado = $sentencia->fetch(); //Tira un true o false en base a si encontró o no un registro

if ($resultado){
    echo 'Ya existe ese usuario';
    echo '<br><button class="btn btn-primary  mt-3"><a href="registro.php">Regresar</a></button>';
    die (); //si encuentra un registro entonces que mate ja ejecución del dempas código
}


//HASH O CIFRADO DE CONTRASEÑA
$contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
echo '<pre>';
/*var_dump($usuario_nuevo);
var_dump($contrasena);
var_dump($contrasena2);
echo '</pre>'; */

//IDENTIFICAR CONTRASEÑA
if (password_verify($contrasena2 , $contrasena )) {
    //echo '¡La contraseña es válida!';

    //AGREGAR A LA BASE DE DATOS
    

    $sql_agregar = 'INSERT INTO usuarios (nombre, contrasena) VALUES (?,?)'; //Se podría poner el nombre de las variables pero no sería tan seguro como con '?'
    $sentencia_agregar = $pdo->prepare($sql_agregar);
    if ($sentencia_agregar->execute(array($usuario_nuevo, $contrasena)) ) {
        echo 'Agregado correctamente <br>';
        echo '<br><button class="btn btn-primary  mt-3"><a href="registro.php">Regresar</a></button>';

    }else{
        echo 'Error :(';
        echo '<br><button class="btn btn-primary  mt-3"><a href="registro.php">Regresar</a></button>';

    }
    

    //cerramos la conexión de datos y sentencia
    $sentencia_agregar = null;
    $pdo = null;
    //header('location:index.php');


} else {
    echo 'La contraseña no es válida.';
    echo '<br><button class="btn btn-primary  mt-3"><a href="registro.php">Regresar</a></button>';

}
