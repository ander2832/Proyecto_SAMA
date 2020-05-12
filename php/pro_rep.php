<?php
$nom=$_POST["nombres"];
$ape=$_POST["apellidos"];
$ced=$_POST["cedula"];
$dire=$_POST["direccion"];
$barrio=$_POST["barrio"];
$telFijo=$_POST["telfijo"];
$telMovil=$_POST["telmovil"];
$fec=$_POST["fecha"];
$tip=$_POST["tipo"];
$cas=$_POST["caso"];
$correo=$_POST["correo"];


include("conexion.php");
$usuario=mysqli_query($conexion, "select * from tblusuario where docidentidad='$ced'") or die("Error en el select de el usuario".mysqli_error($conexion));
 if($usu=mysqli_fetch_array($usuario)){
mysqli_query($conexion, "INSERT INTO tblpqrs (fecha, usuario, descripcion, tipo, estado) VALUES ('$fec','$ced','$cas','$tip','1')") or die ("error en el insert de los pqr".mysqli_error($conexion));
header("location:../html/inicio.");
 }
 else{
	 mysqli_query($conexion,"INSERT INTO tblusuario(docidentidad, nombres, apellidos, direccion, barrio, email, telfijo, telmovil)
 VALUES ('$ced','$nom','$ape','$dire', '$barrio', '$correo','$telFijo','$telMovil')") 
 or die ("error en el insert de usuarios".mysqli_error($conexion));
 mysqli_query($conexion, "INSERT INTO tblpqrs(fecha, usuario, descripcion, tipo, estado) VALUES ('$fec','$ced','$cas','$tip','1')")or die ("error en el insert de los pqr".mysqli_error($conexion));
header("location:../html/inicio.php");
 }
?>


