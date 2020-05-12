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
<h1><img src="../imagenes/logofw.png"> <span class="nomPqr">PQRS SAMA</span><?php include("../php/funcionario.php"); ?></h1>
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
<tr><td>
<table id="contenedor" border="2">
<tr><td colspan="2">
<h2>DATOS FUNCIONARIO</h2>
<?php
if(empty($_POST['cedula'])){
	 $cedula=$_SESSION['usuario'];
 }
 else{
	 $cedula=$_POST['cedula'];
 }
 include("../php/conexion.php");
 $usuario=mysqli_query($conexion, "select * from tblfuncionario WHERE docidentidad='$cedula'") or die("Error en el select de el usuario".mysqli_error($conexion));
$usu=mysqli_fetch_array($usuario);
if($usu['estado']==1){
	echo"Funcionario Activo";
}
else{
	echo"Funcionario Desactivado";
}
	 ?>
</td></tr>
<tr align="left">
<th>Cédula</th>
<td><?php echo $usu['docidentidad']; ?></td>
</tr>
<tr align="left">
<th>Nombres</th>
<form action="" method="post">
<td><?php echo $usu['nombres']; ?></td>
</tr>
<tr  align="left">
<th>Apellidos</th>
<td><?php echo $usu['apellidos']; ?></td>
</tr>
<tr align="left">
<th>E-mail</th>
<td> <?php echo $usu['email']; ?></td>
</tr>
<tr align="left">
<th>Teléfono Fijo</th>
<td><?php echo $usu['telfijo']; ?></td>
</tr>
<tr align="left">
<th>Teléfono Móvil</th>
<td><?php echo $usu['telmovil']; ?></td>
</tr>
<tr align="left">
<th>Cargo</th>
<td>
<?php 
$c=$usu['cargo'];
$cargo=mysqli_query($conexion, "select * from tblcargo WHERE codcargo='$c'") or die("Error en el select del cargo".mysqli_error($conexion));
$ca=mysqli_fetch_array($cargo); 
echo $ca['nombre'];
?>
</td>
</tr>
</table>
<table id="contenedor">
<tr>
<td align="center">
<form></form>
<form action="modificardatosfuncionario.php" method="post">
<input type="hidden" readonly value="<?php echo $usu['docidentidad']; ?>" name="cedula">
<input type="hidden" readonly value="1" name="accion">
<input type="submit" value="Modificar Datos" id="campos">
</form>
</td>
<td align="center">
<form action="modificardatosfuncionario.php" method="post">
<input type="hidden" readonly value="<?php echo $usu['docidentidad']; ?>" name="cedula">
<input type="hidden" readonly value="2" name="accion">
<input type="submit" value="Modificar Contraseña" id="campos">
</form>
</td>
<td align="center">
<?php
if($usu['estado']==1){
?>
<form action="desactivarfuncionario.php" method="post">
<input type="hidden" readonly value="<?php echo $usu['docidentidad']; ?>" name="cedula">
<input type="submit" value="Desactivar Funcionario" id="campos">
</form>
<?php
}
if($usu['estado']==2){
?>
<form action="activarfuncionario.php" method="post">
<input type="hidden" value="<?php echo $usu['docidentidad']; ?>" name="cedula">
<input type="submit" value="Activar Funcionario" id="campos">
</form>
<?php
}
?>
</td>
<td align="center">
<a href="funcionariosregistrados.php"><button id="campos">Regresar</button></a>
</td>
</tr>
</table>
<br><br>
</table>
</table>
</div>
</body>
</html>

