

<?php


    include_once 'conexion.php';

    $nombre =$_POST['nombre'];
    $imagen = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
    $precio=$_POST['precio'];
    $descripcion = $_POST ['descripcion'];

    $query = "INSERT INTO articulos(nombre, foto, precio, descripcion) VALUES ('$nombre', '$imagen' , '$precio', '$descripcion')";
    $resultado = $conexion->query($query);

    if($resultado){
        echo"Si se guardo";
        header('Location:index.php');
       
    }
    else{
        echo"No se guardo";
    }
?>

