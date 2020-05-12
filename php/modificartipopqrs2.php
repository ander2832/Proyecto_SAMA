<?php 
include('conexion.php');
$nombre=$_POST['nom'];
$cod=$_POST['codtipopqrs'];

$sql="update tbltipopqrs
 set nombre='$nombre',
 where codtipopqrs='$cod'";
 mysqli_query($conexion,$sql);
 mysqli_close($conexion);
 ?>