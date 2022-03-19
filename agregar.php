<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="proceso_guardar.php" method="POST" enctype= "multipart/form-data">
        <input type="text" REQUIRED name="nombre" placeholder="Nombre de la imagen" value=""/><br><br><br>
        <input type="file"   REQUIRED name="foto"/><br><br>
        <input type="text" REQUIRED name="precio" placeholder="precio"  value=""/><br><br><br>
        <input type="text" REQUIRED name="descripcion"  placeholder="descripcion" value=""/><br><br><br>
        <input type="submit" value="Subir"/>
        </form>
    
</body>
</html>
