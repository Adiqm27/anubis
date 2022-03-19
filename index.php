<?php
include_once 'conexion.php';


//llamar a todos los datos de la base

$sql = 'SELECT * FROM articulos';
$sentencia = $conexion -> prepare($sql);
$sentencia -> execute();

//paginacion

$img_x_pagina = 3;

//contar datos de la base de datos
$total_datos = $sentencia -> rowCount();
$paginas = $total_datos / $img_x_pagina;
$paginas = ceil($paginas);

//codigo editar




?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/heroes/">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="heroes.css" rel="stylesheet">
    <link href="actvintegra/inistyle.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
        <nav>
          <a href="#"><img class="logo" src="actvintegra/logo1.jpg" alt="actvintegra/logo"></a>
            <ul class="enlaces-menu">
                    <li><a href="actvintegra/inicio.php">Inicio</a></li>
                    <li><a href="actvintegra/registro.php">Iniciar Sesión/Registrarse </a></li>
                    <li><a href="actvintegra/aboutus.php">Sobre nosotros</a></li>
                </ul>
    
                <button class="ham" type="button">   
                    <span class="br-1"></span>
                    <span class="br-2"></span>
                    <span class="br-3"></span>
                </button>                       
            </nav>
        </header>

<?php 
        if(!$_GET){
            header('Location:index.php?pagina=1');
        }

        $iniciar = ($_GET['pagina']-1)*$img_x_pagina;

        //mo-strar cantidad de datos
        $sql_mostrar = 'SELECT * FROM articulos LIMIT :iniciar, :ndatos';
        $setencia_mostrar = $conexion -> prepare($sql_mostrar);
        $setencia_mostrar ->bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
        $setencia_mostrar ->bindParam(':ndatos', $img_x_pagina, PDO::PARAM_INT);
        $setencia_mostrar -> execute();
        $resultado_mostrar = $setencia_mostrar -> fetchAll();

        
        ?>


    <center>
       <!-- <form action="proceso_guardar.php" method="POST" enctype= "multipart/form-data">
        <input type="text" REQUIRED name="nombre" placeholder="Nombre de la imagen" value=""/><br><br><br>
        <input type="file"   REQUIRED name="foto"/><br><br>
        <input type="text" REQUIRED name="precio" placeholder="precio"  value=""/><br><br><br>
        <input type="text" REQUIRED name="descripcion"  placeholder="descripcion" value=""/><br><br><br>
        <input type="submit" value="Subir"/>
        </form>
    -->
    <?php
    include_once 'conexion.php';

    $query = "SELECT * FROM  articulos";
    $resultado = $conexion->query($query);
    foreach ($resultado_mostrar as  $row): 
   // while($row = $resultado->fetch_assoc()):
        ?>

<div class="b-example-divider" class="margen"></div>

<div class="container col-xxl-8 px-4 py-5">
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
      <img src="data:image/jpeg;base64,<?php echo base64_encode($row['foto']) ?>" class="d-block mx-lg-auto img-fluid"  width="700" height="500" loading="lazy">
    </div>
    <div class="col-lg-6">
      <h1 class="display-5 fw-bold lh-1 mb-3"><?php  echo $row["nombre"] ?></h1>
      <h2 class="lead"> <?php  echo $row["descripcion"] ?> </h2 >
      <h2 class="lead"> <?php  echo $row["precio"] ?> </h2 >
     
      <a href="eliminar.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-primary btn-lg px-4 me-md-2">Eliminar articulo</a>
      <a href="editar.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-primary btn-lg px-4 me-md-2">Modificar articulo</a>
      <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        
      </div>
    </div>
  </div>
</div>



<!--
         <div class="card text-center" style="width: 20rem;">
            
            <img  class="card-img-top float-center w-50 h-50 "  src="data:image/jpeg;base64,<?php echo base64_encode($row['foto']) ?> "/>
            <h3 class="card-title"> <?php  echo $row["nombre"] ?> </h3>
            <h3 class="card-title"> <?php  echo $row["precio"] ?> </h3>
            <h3 class="card-title"> <?php  echo $row["descripcion"] ?> </h3>

            </div>-->

    <?php   
        endforeach
   
    ?>

    </center>
    <a href="agregar.php " type="button" class="btn btn-primary btn-lg px-4 me-md-2" > Agregar Articulo</a>


    <!--   paginacion -->
    <nav aria-label="Page navigation example" class="pagination justify-content-center">
        <ul class="pagination">

        <li class="page-item 
        <?php echo $_GET['pagina']<=1? 'disabled': '' ?>
        ">
         <a class="page-link"
         href=" index.php?pagina= <?php  echo  $_GET['pagina']-1 ?>"
         >
          Anterior</a>
        </li>

         

         <?php  for ($i=0; $i<$paginas; $i++): ?> 
         <li class="page-item  <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?> ">
         <a class="page-link" href="index.php?pagina=<?php echo $i+1 ?>">
             <?php echo $i+1 ?></a></li>
        <?php endfor?>

    
        <li class="page-item
        <?php echo $_GET['pagina']>=$paginas? 'disabled': '' ?>
        "><a class="page-link" href=" index.php?pagina= <?php  echo  $_GET['pagina']+1 ?>">Siguiente</a></li>

        </ul>
    </nav>
</body>
</html>