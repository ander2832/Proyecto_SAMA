<?php
$usuario="root";
$pass="";
$servidor="localhost";
$basededatos="proyectosama";
//crear conexion
$conexion=mysqli_connect($servidor,$usuario,$pass,$basededatos) or die("error conexion al servidor");
// conectar la bd
$bd=mysqli_select_db($conexion,$basededatos) or die ("error al conectar la base de datos");
?>