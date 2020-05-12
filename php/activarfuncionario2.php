<?php
$cedula=$_POST['cedula'];
include('conexion.php');
$sql="update tblfuncionario set estado='1' where docidentidad='$cedula'";
 mysqli_query($conexion,$sql);
 mysqli_close($conexion);
header("location:../html/inicio.php");
?>