<?php 	
  require "../../conexion.php";
  session_start(); 
		$usuario=$_POST['usuario'];
    $pass=$_POST['pass'];
    $q="SELECT COUNT(*) as contar FROM users where usuario='$usuario' and contrasenia='$pass'";
    
      $consult= mysqli_query($connect,$q) or die(mysqli_error($connect)); 
      
      $array= mysqli_fetch_array($consult); 

      if($array['contar'] > 0){
        
        $_SESSION["usuario"]=$usuario;
        
        header('location:../../index.php');
        
      }else{
        header('location:login.html?error=1');
      }
?>