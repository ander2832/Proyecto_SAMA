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
<tr><td align="center">
<?php
$ced=$_POST["cedula"];
?>
<table border="2" width="400px" height="300px"  align="center">
<tr><td align="center">
<table width="100%">
<tr align="center">
<td colspan="2">
Esta seguro que desea Activar funcionario
<form action="../php/activarfuncionario2.php" method="post">
<input type="hidden" value="<?php echo $ced;?>" name="cedula">
<br><br>
</td>
<tr>
<td align="right">
<input type="submit" value="Aceptar" id="campos">
</form>
</td>
<td align="left">
<a href="funcionariosregistrados.php"><button id="campos">Regresar</button></a>
</td>
</tr>
</table>
</td></tr>
</table>
<br><br>
</table>
</table>
</div>
</body>
</html>

