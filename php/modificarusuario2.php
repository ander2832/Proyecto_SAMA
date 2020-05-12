<?php 
include('conexion.php');
$nombres=$_POST['nom'];
$doc=$_POST['cedula'];
$apelli=$_POST['apelli'];
$dire=$_POST['direccion'];
$barrio=$_POST['barrio'];
$emai=$_POST['emai'];
$telfi=$_POST['telfi'];
$telmov=$_POST['telmov'];
$sql="update tblusuario
 set nombres='$nombres',apellidos='$apelli',direccion='$dire',barrio='$barrio',email='$emai',telfijo='$telfi',telmovil='$telmov'
 where docidentidad='$doc'";
 mysqli_query($conexion,$sql);
 mysqli_close($conexion);
 header("location:../html/inicio.php");
 ?>