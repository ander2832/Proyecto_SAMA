<!DOCTYPE html>
<html>
<head>
<title>PQRS SAMA</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/estilis.css">
<link rel="icon" href="../imagenes/logofw.png">
</head>
<body>
<div id="contenido">
<table border="3" width="100%" >
<tr><td>
<h1><img src="../imagenes/logofw.png"><span class="nomPqr"> PQRS SAMA</span></h1>
</td></tr>
<tr><td id="contenedor">
<table width="50%" height="450px"  align="center" id="contenedor">
<tr><td align="center">
<table border="2" width="400px" height="300px"  align="center">
<tr>
<td align="center">
<?php
session_start();
// recibe los datos enviados desde index.php(usuario y contraseña)
$usu=$_POST["usuario"];
$cont=$_POST["contraseña"];
include("../php/conexion.php");
$consulta=mysqli_query($conexion,"select * from tblfuncionario where docidentidad='$usu' and contrasena='$cont'")or die("Error en login".mysqli_error($conexion));
//hacemos una consulta para saber si el usuario esta registradoy ademas que la contraseña coincida  con el funcionario y que dicho funcionario  este activo
if($cons=mysqli_fetch_array($consulta)){
	//si el funcionario cumple con las anteriores condiciones automaticamente nos llevara a inicio.php
	if($cons["estado"]==2){
		echo "<script>alert('Su cuenta esta desactivada pongase en contacto con el administrador');</script>";
			echo "<script language='javascript'> setTimeout(location.href='../html/index.php',5000);</script>";
	}else{
	$_SESSION['usuario']=$usu;
	echo "<script>alert('Bienvenido a PQRS SAMA');</script>";
	echo "<script language='javascript'> setTimeout(location.href='../html/inicio.php',5000);</script>";
	}
	//guarda la cedula del funcionario que iniciosesion  en la variable $_SESION['usuario']
	
}
else{
	// sino ingresa el usuario y contraseña correcta pero si el funcionario esta desactivado no aparece el siguiente mensaje
	echo "<br><br><br><br><br><br>Usuario o contraseña incorrecta<br>";
	echo "<a href='../html/index.php'><button id='campos'>Regresar</button></a><br><br><br><br><br><br>";
}
?>

</td>
</tr>
</table>
</td></tr>
</td></tr>
</table>
</table>
</div>
</body>
</html>