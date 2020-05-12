<!DOCTYPE html>
<html>
<head>
<title>Registro funcionario</title>
<meta charset="UTF-8">

<link rel="stylesheet" href="../css/estilis.css">
<link rel="icon" href="../imagenes/logofw.png">
</head>
<body>
<div id="contenido">
<table border="3" width="100%" >
<tr><td>
<h1><img src="../imagenes/logofw.png"><span class="nomPqr">PQRS SAMA</span><?php include("../php/funcionario.php");?></h1>
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
<table height="500">
<tr><td colspan="2"><h1>REGISTRO FUNCIONARIO</h1></td></tr>
<form action="../php/registrofuncionario.php" method="POST">
<tr align="left"><th>Docidentidad:</th><td> <input type="text" name="cedula" required id="campos"></td></tr>
<tr align="left"><th>Nombres:</th><td><input type="text" name="nombres" required id="campos"></td></tr>
<tr align="left"><th>Apellidos:</th><td><input type="text" name="apellidos" required id="campos"></td></tr>
<tr align="left"><th>Correo Electronico:</th><td> <input type="email" name="correo" id="campos"></td></tr>
<tr align="left"><th>Teléfono Fijo:</th><td> <input type="text" name="telfijo" id="campos"></td></tr>
<tr align="left"><th>Teléfono Movil:</th><td> <input type="text" name="telmovil" id="campos"></td></tr>
<tr align="left"><th>Cargo:</th><td><select name="cargo" id="campos">
<?php 
$consulta=mysqli_query($conexion,"SELECT * FROM tblcargo") or die("error en la consulta".mysqli_error);
			while($cons=mysqli_fetch_array($consulta)){
				?>
			<option value="<?php echo $cons['codcargo']; ?>"><?php echo $cons['nombre']; ?></option>
			<?php
			}?></select></td></tr>
<tr align="left"><th>Contraseña:</th><td><input type="password" name="contraseña"  required id="campos"></td></tr>
<tr align="left"><th>Confirmar Contraseña:</th><td><input type="password" name="confirmarcontraseña"  required id="campos"></td></tr>
		<tr><td colspan="2" align="center">
<br><br><input type="submit" value="Guardar" id="campos">	
</form>
</td></tr>
</td></tr>
</table>
</td></tr>
</table>
</table>
</div>
<footer align="center"><a href="acercade.php">Acerca de</a></footer>
</body>
</html>