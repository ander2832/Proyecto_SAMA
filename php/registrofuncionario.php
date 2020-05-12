<!DOCTYPE html>
<html>
<head>
<title>registro funcionario</title>
<meta charset="UTF-8">

<link rel="stylesheet" href="../css/estilis.css">
<link rel="icon" href="../imagenes/ICONO.ICO">
</head>
<body>
<div id="contenido">
<table border="3" width="100%" >
<tr><td>
<h1><img src="../imagenes/logo.png"><span class="nomPqr">PQRS SAMA</span><?php include("../php/funcionario.php");?></h1>
</td></tr>
<tr><td id="contenedor">
<h2>
<nav>
<?php
include("../html/menu.php");
?>
</nav>
</h2>
</td></tr>
<tr><td>
<table width="700px" height="600px"  align="center" id="contenedor" >
<tr><td align="center">
<table align="center" border="2" width="400px" height="300px">
<tr><td align="center">
<?php
 include("../php/conexion.php");
 $cedula=$_POST["cedula"];
 $nombres=$_POST["nombres"];
 $apellidos=$_POST["apellidos"];
 $email=$_POST["correo"];
 $telfijo=$_POST["telfijo"];
 $telmovil=$_POST["telmovil"];
 $cargo=$_POST["cargo"];
 $contraseña=$_POST["contraseña"];
 $confirmarcontraseña=$_POST["confirmarcontraseña"];
 $usuario=mysqli_query($conexion, "select * from tblfuncionario where docidentidad='$cedula'") or die("Error en el select de el usuario".mysqli_error($conexion));
 if($usu=mysqli_fetch_array($usuario)){
	 echo "El usuario ya existe";
 }else{
	 
 if($contraseña==$confirmarcontraseña){
$sql="INSERT INTO tblfuncionario (docidentidad, nombres, apellidos, email, telfijo, telmovil, cargo, contrasena) VALUES ('$cedula', '$nombres', '$apellidos', '$email', '$telfijo', '$telmovil', '$cargo', '$contraseña')";
 mysqli_query($conexion,$sql) or die ("Error en el insert del funcionario".mysqli_error($conexion));
header("location:../html/inicio.php");
 }else{
	 echo "Las contraseñas no coinciden";
 }
 }
?>
<br>
<a href="../html/formregistrofuncionario.php"><button id="campos">Regresar</button></a>
</td></tr>
</td></tr>
</table>
</table>
</div>
</body>
</html>