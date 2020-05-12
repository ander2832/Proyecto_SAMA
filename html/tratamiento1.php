<!DOCTYPE html>
<title>PQRS SAMA</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/estilis.css">
<link rel="icon" href="../imagenes/ICONO.ICO">
</head>
<body>
<div id="contenido">
<table border="3" width="100%" >
<tr><td>
<h1><img src="../imagenes/logo.png"> PQRS SAMA <?php include("../php/funcionario.php");?></h1>
</td></tr>
<tr><td id="contenedor" >
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
<tr><td align="center">
<?php
$estado=$_POST["estado"];
$fec_trat=$_POST["fechatratamiento"];
$codpqrs=$_POST["codpqrs"];
$asig_a=$_POST["asignadoa"];
$gest=$_POST["gestion"];
?>
<table border="2" width="400px" height="300px"  align="center">
<tr><td align="center">
<table>
<tr>
<td>
<form action="../php/pro_trat.php" method="post">
<input type="hidden" name="estado" value="<?php echo $estado; ?>">
<input type="hidden" name="fechatratamiento" value="<?php echo $fec_trat; ?>">
<input type="hidden" name="codpqrs" value="<?php echo $codpqrs; ?>">
<input type="hidden" name="asignadoa" value="<?php echo $asig_a; ?>">
<input type="hidden" name="gestion" value="<?php echo $gest; ?>">
<input type="hidden" name="accion" value="1">
<input type="submit" value="Cerrar Caso" id="campos">
</form>
</td>
<td>
<form action="../php/pro_trat.php" method="post">
<input type="hidden" name="estado" value="<?php echo $estado; ?>">
<input type="hidden" name="fechatratamiento" value="<?php echo $fec_trat; ?>">
<input type="hidden" name="codpqrs" value="<?php echo $codpqrs; ?>">
<input type="hidden" name="asignadoa" value="<?php echo $asig_a; ?>">
<input type="hidden" name="gestion" value="<?php echo $gest; ?>">
<input type="hidden" name="accion" value="2">
<input type="submit" value="Guardar Tratamiento" id="campos">
</td>
</tr>
<tr><td colspan="2" align="center">
<form action="buscar.php">
</form>
<form action="buscar.php" method="post">
<input type="hidden" name="codigo" value="<?php echo $codpqrs; ?>">
<input type="submit" value="Regresar" id="campos">
</form>
</td></tr>
</table>
</td></tr>
</form>
</table>
</td></tr>
</table>
</td></tr>
</td></tr>
</table>
</table>
</div>
</body>
</html>
