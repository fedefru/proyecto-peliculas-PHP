<?php
require 'conexion.php';

$titulo = $_POST['titulo'];
$año = $_POST['año'];
$puntaje = $_POST['puntaje'];
$duracion = $_POST['duracion'];
$genero = $_POST['genero'];
$descripcion = $_POST['descripcion'];
$imagen_link = $_POST['imagen_link'];

$query = "INSERT INTO `movies`(`titulo`, `año`, `puntaje`, `duracion`, `genero`, `descripcion`, `imagen_link`)
          VALUES ('$titulo','$año','$puntaje','$duracion','$genero','$descripcion','$imagen_link')";

if (isset($_POST['cargar']) && !empty($_POST['cargar'])) {

    $res = mysqli_query($connect, $query) or die(mysqli_error($connect));

    header("location: agregar.php?guardado=1");
}
