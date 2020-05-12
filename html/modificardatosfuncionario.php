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
<h1><img src="../imagenes/logofw.png"><span class="nomPqr">PQRS SAMA</span><?php include("../php/funcionario.php"); ?></h1>
</td></tr>
<tr><td id="contenedor">
<h2>
<nav>
<?php
include("menu.php");
?>
</nav>
</h2>
</td></tr>
<tr><td>
<table width="50%" height="450px"  align="center" id="contenedor">
<tr><td align="center">
<?php
$cedula=$_POST["cedula"];
$accion=$_POST["accion"];
include("../php/conexion.php");
$usuario=mysqli_query($conexion, "select * from tblfuncionario WHERE docidentidad='$cedula'") or die("Error en el select de el usuario".mysqli_error($conexion));
$usu=mysqli_fetch_array($usuario);
if($accion==1){
?>
<b>Escribe tu contraseña para modificar datos</b>
<table border="2" width="400px" height="300px"  align="center">
<tr><td align="center">
<form action="modificarfuncionario.php" method="post">
Funcionario
<br>
<?php
echo $usu['nombres']." ".$usu['apellidos'];
?>
<br><br>
<input type="hidden" name="nombres" value="<?php echo $usu['nombres'];?>">
Usuario<br><br>
<input type="text" name="usuario" id ="campos"required>
<br><br>
Contraseña<br><br>
<input type="password" name="contraseña" required id="campos"><br><br><br>
<input type="hidden" name="accion" value="1"><!--1=modificar datos-->
<input type="submit" value="Modificar Datos" id="campos" ><br><br>
</form>
</td></tr>
</table>
<?php
}
else{
if($accion==2){
?>
<table border="2" width="400px" height="300px"  align="center">
<tr><td align="center">
<form action="modificarfuncionario.php" method="post">
Funcionario
<br>
<?php
echo $usu['nombres']." ".$usu['apellidos'];
?>
<br><br>
<input type="hidden" name="nombres" value="<?php echo $usu['nombres'];?>">
Usuario<br><br>
<input type="text" name="usuario" id ="campos"required>
<br><br>
Contraseña Guardada<br><br>
<input type="password" name="contraseña" required id="campos"><br><br>
Contraseña Nueva<br><br>
<input type="password" name="contraseñanueva" required id="campos"><br><br>
Confirmar Contraseña<br><br>
<input type="password" name="confirmarcontraseña" required id="campos"><br><br>
<input type="hidden" name="accion" value="2"><!--2=cambiar contraseña-->
<input type="submit" value="Modificar Contraseña" id="campos"><br><br>
</form>
</td></tr>
</table>
<?php
 }
}
?>
</td></tr>
</table>
</table>
</div>
</body>
</html>

