<!DOCTYPE html>
<html>
<head>
<title>Reporte</title>
<meta charset="UTF-8">

<link rel="stylesheet" href="../css/estilis.css">
<link rel="icon" href="../imagenes/logofw.png">
</head>
<body>
<div id="contenido">
<table border="3" width="100%" >
<tr><td>
<h1><img src="../imagenes/logofw.png"> <span class="nomPqr">PQRS SAMA</span><?php include("../php/funcionario.php");?></h1>
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
<table width="50%" height="450px"  align="center" id="contenedor">
<tr>
<td align="center" colspan="2">
<h1>REPORTE</h1>
<table border="2" align="center" width="300px" height="200px">
<tr>
<th>
<form action="../html/formReporte.php" method="POST">
<h2>Cédula</h2><br>
<input type="text" name="cc" required id="campos"><br><br>
<!--formulario para ingrasa el numero de cedula  del usuario que va hacer la pqrs-->
<input type="submit" value="Guardar" id="campos">
<!--al oprimir el boton guardar nos lleva al formulario de reporte-->
</form>
</th>
</tr>
</table>
</td>
</tr>
</td></tr>
</td></tr>
</table>
</table>
</div>
<footer align="center"><a href="acercade.php">Acerca de</a></footer>
</body>
</html>