<?php
include_once 'conexion.php';

$id = $_POST['id'];
$nombre =$_POST['nombre'];
$imagen = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
$precio=$_POST['precio'];
$descripcion = $_POST ['descripcion'];



$sql_editar = 'UPDATE articulos SET nombre=?, foto=?, precio =?, descripcion=?  WHERE id=?';
$sentencia_editar =  $conexion->prepare($sql_editar);
$sentencia_editar->execute(array($nombre,$imagen,$precio,$descripcion, $id));
$sentencia_editar ->fetch();

if ($sentencia_editar) {
    header('location:index.php');
}else {
    echo 'no se edito';
}



?>



