<?php
require 'conexion.php';
$usuario = "";
session_start();
if (isset($_SESSION['usuario']) && strlen($_SESSION['usuario']) > 0 ){
    $usuario = $_SESSION['usuario'];
}else{
    header('location: ./Login-Cliente/assets/login.html');
}

if (isset($_POST['enviar']) && !empty($_POST['enviar'])) {

    header("location: contacto.php?enviado=1");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <!--Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--Fuente-->
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display&display=swap" rel="stylesheet">
    <!--Archivos propios-->
    <link rel="stylesheet" href="./contacto.css" type="text/css">
    <script src="contacto.js"></script>

    <script>
      const urlParams = new URLSearchParams(window.location.search);
      const myParam = urlParams.get('enviado');
      if(myParam == 1){
        alert('Gracias por contactarnos, en breve recibiras una respuesta.');
      }
    </script>
    <!--Styles porque no funciona bien el xampp-->
    <style>
        #header {
            background: rgb(224, 49, 49);
            color: white;
            margin: 0px;
            height: 90px;
            line-height: 90px;
        }

        #nav {
            margin: 0px;
            padding: 0px;
            background: rgb(224, 103, 103);

        }

        #nav ul li a:hover {
            text-decoration: none;
            background: rgb(224, 49, 49);
        }
    </style>

    <style>
        label {
            margin-top: 20px;
        }
    </style>
</head>

<body class="container">
    <?php require 'logica.php' ?>
    <div id="contenido">

        <header id="header" class="col-lg-12" [style.background]="header_color">

            <h1>
                Peliculon
                <img src="images/logo-peliculas.png" alt="" style="width: 60px;height:60px;">
            </h1>
        </header>
        <nav id="nav" class="col-lg-12 navbar">
            <ul>
                <li>
                    <a href="./index.php">Home</a>
                </li>
                <li>
                    <a href="./peliculas.php">Peliculas</a>
                </li>
                <li>
                    <a href="./contacto.php" style="background: rgb(224, 49, 49); ">Contacto</a>
                </li>
                <li>
                    <a href="./agregar.php">Agregar Pelicula</a>
                </li>
            </ul>
            <ul>
                <li>
                    <h6 style="color:white;line-height: 30px;"><?php echo $usuario ?></h6>
                </li>
                <li>
                    <a style="color: black" name="cerrarsesion" href="index.php?cerrarsesion=true"> Cerrar sesion</a>
                </li>
            </ul>
        </nav>



        <div class="col-8 offset-2" style="margin-top:20px; border-radius: 5px;">

            <form class="jumbotron" action="contacto.php?enviado=1" method="POST">

                <div class="col">
                    <h1 style="text-align: center;">Contactanos</h1>
                </div>
                <div class="col">
                    <label for="correo">Email</label>
                    <input type="email" placeholder="ejemplo@gmail.com" name="correo" class="form form-control" required>
                </div>

                <div class="col">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" placeholder="Nombre" class="form form-control" required>
                </div>

                <div class="col">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form form-control" name="apellido" placeholder="Apellido" required>
                </div>

                <div class="col">
                    <label for="mensaje">Mensaje</label>
                    <textarea name="mensaje" type="textarea" id="mensaje" class="form form-control" placeholder="..." required></textarea>
                </div>

                <div class="col">
                    <center>
                        <button type="submit" class="btn btn-primary" style="margin-top:20px" name="enviar" value="enviar" >Enviar</button>
                    </center>
                </div>


            </form>

        </div>

        <footer id="footer" class="col-lg-12">
            <pre style="text-align: center;">Alumno Frutos Federico</pre>
        </footer>

    </div>

</body>

</html>