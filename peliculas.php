<?php
$usuario = "";
session_start();
if (isset($_SESSION['usuario']) && strlen($_SESSION['usuario']) > 0) {
    $usuario = $_SESSION['usuario'];
} else {
    header('location: ./Login-Cliente/assets/login.html');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
    <!--Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.1.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script src="js/jspdf.plugin.autotable.min.js"></script>
    <!--Fuente-->
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d849f3c024.js" crossorigin="anonymous"></script>
    <!--Archivos propios-->
    <link rel="stylesheet" href="peliculas.css">
    <script src="peliculas.js"></script>



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
                    <a href="./peliculas.php" style="background: rgb(224, 49, 49); ">Peliculas</a>
                </li>
                <li>
                    <a href="./contacto.php">Contacto</a>
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

        <?php
        include_once 'conexion.php';


        //$sql = 'CALL selectAllMovies()';
        $sql = 'SELECT * FROM MOVIES';
        $sentencia = $pdo->prepare($sql);
        $sentencia->execute();

        $resultado = $sentencia->fetchAll();

        $resToJson = json_encode($resultado);
        $json = fopen("peliculas.json", "w") or
            die("Problemas en la creacion del JSON");

        fwrite($json, $resToJson);
        fclose($json);

        $resToCsv = $resultado;
        $csv = fopen("peliculas.txt", "w") or
            die("Problemas en la creacion del CSV");

        $text = "";

        foreach ($resToCsv as $res) {
            $text = $text . $res['id'] . ";" . $res['titulo'] . ";" . $res['año'] . ";" . $res['puntaje'] . ";" . $res['duracion']
                . ";" . $res['genero'] . ";" . $res['descripcion'] . ";" . $res['imagen_link']
                . "\n";
        }

        fwrite($csv, $text);
        fclose($csv);

        $peliculas_x_pagina = 4;
        $total_peliculas = $sentencia->rowCount();
        $paginas = $total_peliculas / 4;
        $paginas = ceil($paginas);

        ?>


        <?php
        if (!$_GET) {
            header('Location:peliculas.php?pagina=1');
        }
        if ($_GET['pagina'] > $paginas || $_GET['pagina'] <= 0) {
            header('Location:peliculas.php?pagina=1');
        }
        
        $iniciar = ($_GET['pagina'] - 1) * $peliculas_x_pagina;
        
        //$sql_peliculas = 'SELECT * FROM movies LIMIT :iniciar,:npeliculas';
        $procedurePaginado = 'call peliculasPaginado('.$iniciar.','.$peliculas_x_pagina.')';


        $sentencia_peliculas = $pdo->prepare($procedurePaginado);
        //$sentencia_peliculas->bindParam(':iniciar', $iniciar, PDO::PARAM_INT);
        //$sentencia_peliculas->bindParam(':npeliculas', $peliculas_x_pagina, PDO::PARAM_INT);
        $sentencia_peliculas->execute();
        
        $resultado_peliculas = $sentencia_peliculas->fetchAll();
        ?>


        <div class="row">
            <div class="col-12">
                <h2 style="font-weight: bold; color: black;margin-left:10px;margin-top:10px;">Peliculas</h2>
            </div>

            <div class="col-md-1"></div>

            <?php
            require 'conexion.php';
            foreach ($resultado_peliculas as $lgc) {
                ?>
                <div class="col-md-2 col-sm-2" style=" margin-top: 20px; margin-left:20px; height: 400px">
                    <div class="card" style="height:100%;">

                        <img class="card-img-top" src="<?php echo $lgc['imagen_link'] ?>" alt="Card image cap" style="height:225px; width: 100%">

                        <div class="card-body">
                            <center style="margin-bottom: 10px"><i class="fas fa-heart" style="color: rgb(224, 49, 49); "></i><span style="font-weight: bold;"> <?php echo $lgc['puntaje'] ?></span></center>

                            <a href="" class="titulos"><?php echo $lgc['titulo'] ?></a>
                        </div>

                        <div>
                            <center>
                                <!--launch modal-->
                                <a style="cursor:pointer;font-size:23px;margin-right:10px" data-toggle="modal" data-target="#info<?php echo $lgc['id'] ?>"><i class="fas fa-info" style="color: rgb(224, 49, 49);"></i></a>

                                <!--modal-->
                                <div class="modal fade" id="info<?php echo $lgc['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="movieLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title" id="movieLabel"><?php echo $lgc['titulo'] ?></h2><br>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img class="card-img-top" src="<?php echo $lgc['imagen_link'] ?>" alt="Card image cap" style="height:225px; width: 50%; margin-bottom:5px">
                                                <center style="margin-bottom: 10px">
                                                    <i class="fas fa-heart" style="color: rgb(224, 49, 49); "></i>
                                                    <span style="font-weight: bold;"> <?php echo $lgc['puntaje'] ?></span>
                                                    |<span> <?php echo $lgc['duracion'] ?> minutos</span> | <span><?php echo $lgc['año'] ?></span>
                                                </center>

                                                <p><?php echo $lgc['descripcion'] ?></p>
                                                <h5><?php echo $lgc['genero'] ?></h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <a style="cursor:pointer;font-size:23px;margin-right:10px" data-toggle="modal" data-target="#modificar<?php echo $lgc['id'] ?>"><i class="fas fa-pen" style="color: rgb(224, 49, 49);"> </i></a>
                                <a style="cursor:pointer;font-size:23px" name="eliminar" href="peliculas.php?eliminar=<?php echo $lgc['id'] ?>"><i class="fas fa-trash-alt" style="color: rgb(224, 49, 49);"></i></a>
                            </center>

                        </div>
                    </div>
                </div>



                <div class="modal fade bd-example-modal-lg" id="modificar<?php echo $lgc['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form class="" enctype="multipart/form-data" action="logica.php" method="POST">

                                <div class="col">
                                    <h1 style="text-align: center;">Modificar una Pelicula</h1>
                                </div>
                                <div class="col">
                                    <label for="titulo">Titulo</label>
                                    <input type="text" placeholder="La Mascara" value="<?php echo $lgc['titulo'] ?>" name="titulo" class="form form-control">
                                    <input type="text" value="<?php echo $lgc['id'] ?>" name="id" class="form form-control" hidden>
                                </div>

                                <div class="col">
                                    <label for="año">Año</label>
                                    <input type="number" name="año" class="form form-control" value="<?php echo $lgc['año'] ?>">
                                </div>

                                <div class="col">
                                    <label for="puntaje">Puntaje</label>
                                    <input type="number" value="<?php echo $lgc['puntaje'] ?>" placeholder="5" name="puntaje" class="form form-control" min="0" max="10" step="0.01">
                                </div>

                                <div class="col">
                                    <label for="duracion">Duracion</label> <label style="color: #888"> (en minutos)</label>
                                    <input type="number" name="duracion" class="form form-control" value="<?php echo $lgc['duracion'] ?>">
                                </div>

                                <div class="col">
                                    <label for="genero">genero</label>
                                    <input type="text" placeholder="Comedia" value="<?php echo $lgc['genero'] ?>" name="genero" class="form form-control">
                                </div>

                                <div class="col">
                                    <label for="descripcion">Descripcion</label>
                                    <textarea type="textarea" name="descripcion" class="form form-control"><?php echo $lgc['descripcion'] ?></textarea>
                                </div>

                                <div class="col">
                                    <label for="imagen_link">Link de la imagen</label>
                                    <input type="text" value="<?php echo $lgc['imagen_link'] ?>" placeholder="https://www.rutadelimagen.com/..." name="imagen_link" class="form form-control">
                                </div>

                                <div class="col">
                                    <center>
                                        <button type="submit" class="btn btn-primary" style="margin-top:20px" value="update" name="update">Modificar</button>
                                    </center>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

        <br><br><br>

        <div class="col-12 ">
            <nav aria-label="...">
                <ul class="pagination justify-content-center">
                    <li class="page-item">

                        <a class="page-link" href="peliculas.php?pagina=<?php echo $_GET['pagina'] - 1 ?>">
                            Anterior
                        </a>

                    </li>

                    <?php for ($i = 0; $i < $paginas; $i++) : ?>

                        <li class="page-item 
                        <?php echo $_GET['pagina'] == $i + 1 ? 'active' : ''  ?>">
                            <a class="page-link" href="peliculas.php?pagina=<?php echo $i + 1 ?>">
                                <?php echo $i + 1 ?></a></li>

                    <?php endfor ?>

                    <li class="page-item
                    <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : '' ?>
                    ">
                        <a class="page-link" href="peliculas.php?pagina=<?php echo $_GET['pagina'] + 1 ?>">
                            Siguiente</a>
                    </li>
                </ul>
            </nav>
        </div>


        <?php if (isset($_GET['guardado']) && $_GET['guardado'] == 1) {
            echo "<script type='text/javascript'>alert('¡Pelicula cargada con exito!');</script>";
        }
        ?>
        <?php if (isset($_GET['actualizado']) && $_GET['actualizado'] == 1) {
            echo "<script type='text/javascript'>alert('¡Pelicula modificada con exito!');</script>";
        }
        ?>
        <footer id="footer" class="col-lg-12">
            <pre style="text-align: center;">Alumnos Frutos Federico & Vola Ariel</pre>
        </footer>

    </div>



</body>



</html>