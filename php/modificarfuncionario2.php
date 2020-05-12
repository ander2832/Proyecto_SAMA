<?php 
include('../php/conexion.php');
$doc=$_POST['cedula'];
$nombres=$_POST['nom'];
$apelli=$_POST['apelli'];
$emai=$_POST['emai'];
$telfi=$_POST['telfi'];
$telmov=$_POST['telmov'];
$carg=$_POST['cargo'];
$sql="update tblfuncionario
 set nombres='$nombres',apellidos='$apelli',email='$emai',telfijo='$telfi',telmovil='$telmov',cargo='$carg'
 where docidentidad='$doc'";
 mysqli_query($conexion,$sql);
 mysqli_close($conexion);
header("location:../html/inicio.php");
?>