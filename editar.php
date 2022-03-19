<?php

include_once 'conexion.php';
$id=$_GET['id'];
$sql_edit = 'SELECT * FROM articulos WHERE id = ?';
$sentencia_edit = $conexion->prepare($sql_edit);
$sentencia_edit->execute(array($id));
$resultado_edit = $sentencia_edit->fetch();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/heroes/">
    <title>Document</title>
</head>
<body>

 <form action="modificar.php" method="POST" enctype= "multipart/form-data">
        <input type="text" REQUIRED name="nombre" placeholder="Nombre de la imagen" value="<?php echo $resultado_edit['nombre'] ?>"/><br><br><br>
        <input type="file"   REQUIRED name="foto" value="<?php echo base64_encode($resultado_edit['foto']) ?>"/> </br>
        <input type="text" REQUIRED name="precio" placeholder="precio"  value="<?php echo $resultado_edit['precio'] ?>"/><br><br><br>
        <input type="text" REQUIRED name="descripcion"  placeholder="descripcion" value="<?php echo $resultado_edit['descripcion'] ?>"/><br><br><br>
        <input type="hidden" name ="id" value="<?php echo $resultado_edit['id'] ?>">
        <input type="submit" value="Subir"/>
        </form>




</body>
</html>
