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
<?php
// recibe todos los datos enviados desde formreporte.php
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
?>
<table width="50%" height="450px"  align="center" id="contenedor">
<tr><td align="center">
<table border="2" width="400px" height="300px"  align="center">
<tr>
<td align="center">
Esta seguro que desea guardar
<!--hay debemos  aceptar para guardar o cancelar para regresar-->
<br><br>
<form action="../php/pro_rep.php" method="post">
<!--estos mismos datos se enviaran a pro_rep.php para guardarlos-->
<input type="hidden" value="<?php echo $nom; ?>" name="nombres">
<input type="hidden" value="<?php echo $ape; ?>" name="apellidos">
<input type="hidden" value="<?php echo $ced; ?>" name="cedula">
<input type="hidden" value="<?php echo $dire; ?>" name="direccion">
<input type="hidden" value="<?php echo $barrio; ?>" name="barrio">
<input type="hidden" value="<?php echo $telFijo; ?>" name="telfijo">
<input type="hidden" value="<?php echo $telMovil; ?>" name="telmovil">
<input type="hidden" value="<?php echo $fec; ?>" name="fecha">
<input type="hidden" value="<?php echo $tip; ?>" name="tipo">
<input type="hidden" value="<?php echo $cas; ?>" name="caso">
<input type="hidden" value="<?php echo $correo; ?>" name="correo">
<input type="submit" value="Aceptar" id="campos">
</form>
<form action="formReporte.php" method="post">
<input type="hidden" value="<?php echo $ced; ?>" name="cc">
<input type="submit" value="cancelar" id="campos">
</form>
</td>
</tr>
</table>
</td></tr>
</table>
</table>
</div>
</body>
</html>