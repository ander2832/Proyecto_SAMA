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
<h1><img src="../imagenes/logofw.png"> <span class="nomPqr">PQRS SAMA</span> <?php include("../php/funcionario.php");?></h1>
</td></tr>
<tr><td id="contenedor" >
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
<tr>
<td>
<?php
include("menuregistros.php");
?>
<tr><th colspan="5"><h2>Pendientes</h2></th></tr>
<tr>
<th>#</th>
<th>Cédula</th>
<th>Nombres</th>
<th>Apellidos</th>
<th>Más</th>
</tr>
<?php
 include("../php/conexion.php");
 $i=0;
 $usuario=mysqli_query($conexion, "select tblpqrs.codpqrs,tblpqrs.usuario,tblusuario.nombres,tblusuario.apellidos,tblpqrs.estado from tblpqrs inner join tblusuario on tblpqrs.usuario=tblusuario.docidentidad where tblpqrs.estado='1'");
 while($usu=mysqli_fetch_array($usuario)){
	 $i=$i+1;
	 //hacemos una consulta en la tabla pqrs uniendo la tabla usuario donde el estado pqrs=1(pendiente)
	?>
<tr>
<td><?php echo $i; ?></td><!--enumera todas la pqrs-->
<td><?php echo $usu['usuario'] ?></td><!--nos muestras los datos del usuario(cedula, nombres, apellidos)-->
<td><?php echo $usu['nombres'] ?></td>
<td><?php echo $usu['apellidos'] ?></td>
<td><form action="buscar.php" method="post">
<input type="hidden" value="<?php echo $usu['codpqrs']; ?>" name="codigo">
<!--guarda el codigo de la pqrs en un formulario oculto para que al imprimir el boton màs podamos ver los datos completos de las pqrs-->
<input type="submit" value="Mas" id="campos">
</form>
</td>
</tr>
<?php
}
 ?>
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</td></tr>
</table>
</table>
</div>
<footer align="center"><a href="acercade.php">Acerca de</a></footer>
</body>
</html>