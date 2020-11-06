<?php
$usuario = "";
session_start();
if (isset($_SESSION['usuario']) && strlen($_SESSION['usuario']) > 0 ){
    $usuario = $_SESSION['usuario'];
}else{
    header('location: ./Login-Cliente/assets/login.html');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!--Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--Fuente-->
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display&display=swap" rel="stylesheet">
    <!--Archivos propios-->
    <link rel="stylesheet" href="index.css">
    <script src="index.js"></script>

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
                    <a href="./index.php" style="background: rgb(224, 49, 49); ">Home</a>
                </li>
                <li>
                    <a href="./peliculas.php" class="activos">Peliculas</a>
                </li>
                <li>
                    <a href="./contacto.php" class="activos">Contacto</a>
                </li>
                <li>
                    <a href="./agregar.php" class="activos">Agregar Pelicula</a>
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

        <div class="row">

        <?php
        require 'conexion.php';

        $active = "";
        $query = "SELECT `imagen_link` FROM `movies` ORDER BY `puntaje` DESC LIMIT 10";
        $imagenes = mysqli_query($connect,$query);

        ?>

            <div class="col-6 offset-3">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="height: 450px;">
                    <div class="carousel-inner">
                    <?php
                        $active = "active";
                        while($resultado = mysqli_fetch_array($imagenes)){
                    ?>
                        <div class="carousel-item <?php echo $active ?>">
                            <img src="<?php echo $resultado['imagen_link'] ?>" style="height: 450px;" class="d-block w-100" alt="...">
                        </div>
                        <?php
                        $active = "";
                        }
                        ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <footer id="footer" class="col-lg-12">
            <pre style="text-align: center;">Alumno Frutos Federico</pre>
        </footer>

    </div>

</body>

</html>