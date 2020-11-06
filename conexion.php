<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=parcial', 'root', '');

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

$host = "localhost";
$user = "root";
$pass = "";
$db = "parcial";

$connect = mysqli_connect($host,$user,$pass,$db);

$queryConsulta = "SELECT * FROM movies";

$consulto = mysqli_query($connect, $queryConsulta);

?>