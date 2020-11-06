<?php
function cerrarsesion()
{
    session_destroy();
    header("location: /Parcial-edi/Login-Cliente/assets/login.html");
}

if (isset($_GET['cerrarsesion'])) {
    cerrarsesion();
}

if (isset($_GET['eliminar']) && strlen($_GET['eliminar']) > 0) {
    require 'conexion.php';
    $idDelete = $_GET['eliminar'];
    
        $query = "DELETE FROM `movies` WHERE `movies`.`id` = '$idDelete' ";
        $res = mysqli_query($connect, $query) or die(mysqli_error($connect));
        
        header("location: peliculas.php");
}

if (isset($_POST['update']) && !empty($_POST['update'])) {
    require 'conexion.php';
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $año = $_POST['año'];
    $puntaje = $_POST['puntaje'];
    $duracion = $_POST['duracion'];
    $genero = $_POST['genero'];
    $descripcion = $_POST['descripcion'];
    $imagen_link = $_POST['imagen_link'];
    
        $query = "UPDATE movies SET titulo='$titulo', año='$año',puntaje='$puntaje',duracion='$duracion',genero='$genero',descripcion='$descripcion',imagen_link='$imagen_link' WHERE id='$id'";
        $res = mysqli_query($connect, $query) or die(mysqli_error($connect));
        
        header("location: peliculas.php");
    }
?>
