<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
 
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
 
  <link rel="stylesheet" href="style.css">
 
  <title>Inicio</title>
  <link href="inistyle.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
        <nav>
          <a href="#"><img class="logo" src="logo1.jpg" alt="logo"></a>
            <ul class="enlaces-menu">
                    <li><a href="inicio.php">Inicio</a></li>
                    <li><a href="registro.php">Iniciar Sesión/Registrarse </a></li>
                    <li><a href="aboutus.php">Sobre nosotros</a></li>
                </ul>
    
                <button class="ham" type="button">   
                    <span class="br-1"></span>
                    <span class="br-2"></span>
                    <span class="br-3"></span>
                </button>                       
            </nav>
        </header>
   <div class="container">
     <div class="login-container">
       <div class="register">
         <h2>Registrarse</h2>
         <form action="agregar_usuario.php" method="POST">
           <input type="text" name="nombre_usuario" placeholder="Ingrese su nombre" class="nombre">
           <input type="password" name="contrasena" placeholder="Ingrese contraseña" class="pass">
           <input type="password" name="contrasena2" placeholder="Confirme contraseña" class="repass">
           <input type="submit" class="submit" value="GUARDAR">
         </form>
       </div>
       <div class="login">
         <h2>Iniciar Sesión</h2>
         <div class="login-items">
        <form action="login.php" method="POST">
         <input type="text" name="nombre_usuario" placeholder="Ingresa usuario">
         <input type="password" name="contrasena" placeholder="Ingresa contraseña">
         <input type="submit" class="submit1" value="INGRESAR">
         </form>
         </div>
       </div>
     </div>
   </div>
</body>
</html>