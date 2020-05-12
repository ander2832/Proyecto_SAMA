<!DOCTYPE html>
<html>
<?php
session_start();
if (!empty($_SESSION["usuario"])){
if($_SESSION['usuario']==1036){
	include("../php/conexion.php");
	mysqli_query($conexion,"delete from tblfuncionario where docidentidad='1036'")or die("Error".mysqli_error($conexion));
	}
}
session_destroy();
//si estamos  en esta pagina es porque hemos cerrado sesion o vamos a ingresar al programa por lo tanto cerrar cual cualquier  sesion existente

?>
<head>
<title>PQRS SAMA</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/estilis.css">
<link rel="icon" href="../imagenes/logofw.png">
</head>
<body>
<div id="contenido">
<table border="3"  width="100%" >
<tr><td>
<h1><img src="../imagenes/logofw.png"> <span class="nomPqr">PQRS SAMA</span></h1>
</td></tr>
<tr><td id="contenedor">
<table width="50%" height="500px"  align="center" id="contenedor">
<tr><td align="center">
<table border="2" width="400px" height="300px"  align="center">
<tr>
<td align="center">
<br>
<form action="../php/login.php" method="POST">
Usuario<br><br>
<input type="text" name="usuario" required id="campos"><br><br><br>
Contraseña<br><br>
<input type="password" name="contraseña" required id="campos"><br><br><br>
<input type="submit" value="Ingresar" id="campos" ><br><br>
</form>
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