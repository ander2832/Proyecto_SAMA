<?php
session_start();
$codpqrs=$_POST["codpqrs"];
include("conexion.php");
if($_POST['accion']==1){
	//accion 1 sirve insertar tratamiento y cerrar caso
$fec_trat=$_POST["fechatratamiento"];
$asig_a=$_POST["asignadoa"];
$gest=$_POST["gestion"];
$sql="INSERT INTO tbltratamiento (fecha, codpqrs, funcionario, descripcion, destino) VALUES ('$fec_trat', '$codpqrs', '$_SESSION[usuario]', '$gest', '$asig_a')";
 mysqli_query($conexion,$sql) or die ("Error en el insert del tratamiento".mysqli_error($conexion));
	 $sql="UPDATE tblpqrs SET estado = '3' WHERE codpqrs = '$codpqrs'";
	 //pasa a cerrado
	  mysqli_query($conexion,$sql) or die ("Error al modificar estado".mysqli_error($conexion));
}else{
	if($_POST['accion']==2){
		// sirve para insertar tratamiento y que el caso pase en proceso para que permita insertar otro tratamiento
$fec_trat=$_POST["fechatratamiento"];
$asig_a=$_POST["asignadoa"];
$gest=$_POST["gestion"];
	$sql="INSERT INTO tbltratamiento (fecha, codpqrs, funcionario, descripcion, destino) VALUES ('$fec_trat', '$codpqrs', '$_SESSION[usuario]', '$gest', '$asig_a')";
 mysqli_query($conexion,$sql) or die ("Error en el insert del tratamiento".mysqli_error($conexion));
    //guarda el tratamiento
	 $sql="UPDATE tblpqrs SET estado = '2' WHERE codpqrs = '$codpqrs'";
	 //el caso pasa en proceso
	  mysqli_query($conexion,$sql) or die ("Error al modificar estado".mysqli_error($conexion));
	}
	else{
		if($_POST['accion']==3){
			// sirve para que el caso pase de  proceso a cerrado
			$sql="UPDATE tblpqrs SET estado = '3' WHERE codpqrs = '$codpqrs'";
	  mysqli_query($conexion,$sql) or die ("Error al modificar estado".mysqli_error($conexion));
			
		}
	}
}
if($_POST['estado']==3){
	$sql="UPDATE tblpqrs SET estado = '2' WHERE codpqrs = '$codpqrs'";
	 mysqli_query($conexion,$sql) or die ("Error al modificar estado".mysqli_error($conexion));
}
header("location:../html/inicio.php");
?>