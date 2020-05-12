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
 include("../php/conexion.php");
?>
<br>
<table border="2" width="100%" id="tabla">
<tr><th colspan="6">
<h2>
Filtrar Registros
</h2>
</th>
</tr>
<tr>
<th colspan="4">
Tipo
</th>
<th>
Desde
</th>
<th>
Hasta
</th>
</tr>
<tr>
<td colspan="4">
<form action="filtros.php" method="post">
<select name="tipo" id="campos" required>
<option value="5">Todos los Tipos</option>
        <?php 
			include("../php/conexion.php");
			$consulta=mysqli_query($conexion,"SELECT * FROM tbltipopqrs") or die("error en la consulta".mysqli_error);
			while($cons=mysqli_fetch_array($consulta)){
				?>
			<option value="<?php echo $cons['codtipopqrs']; ?>"><?php echo $cons["nombre"];
			// nos muestra todos los tipos de reporte que hay en la base de datos(pqrs)
			?></option>
			<?php
			}
		
		?>
      </select>
	  </td>
<td>
<input type="date" name="fecha1" min="01-01-2018" id="campos" required>
</td>
<td>
<input type="date" name="fecha2" min="01-01-2018" id="campos" required>
</td>
</tr>
<tr>
<td colspan="6">
<input type="submit" value="Buscar" id="campos">
</form>
</td>
</tr>
<?php
if(empty($_POST['tipo'])){
	 
 }
 else{
	 $tipo=$_POST['tipo'];
	 if($tipo==5){
		$i=0;

	include '../php/conexion.php';
	$fecha1=$_POST['fecha1'];
	$fecha2=$_POST['fecha2'];
 $usuario=mysqli_query($conexion, "select tblpqrs.codpqrs,tblpqrs.usuario,tblusuario.nombres,tblusuario.apellidos,
 tblpqrs.estado,tblpqrs.fecha from tblpqrs inner join tblusuario on tblpqrs.usuario=tblusuario.docidentidad where
 tblpqrs.fecha>='$fecha1' and tblpqrs.fecha<='$fecha2' GROUP BY tblpqrs.codpqrs");
 while($usu=mysqli_fetch_array($usuario)){
	 $i=$i+1;
 ?>
<tr>
<th>#</th>
<th>Cédula</th>
<th>Nombres</th>
<th>Apellidos</th>
<th>Fecha</th>
<th>Más</th>
</tr>
<tr>
<td><?php echo $usu['codpqrs'] ?></td>
<td><?php echo $usu['usuario'] ?></td><!--nos muestras los datos del usuario(cedula, nombres, apellidos)-->
<td><?php echo $usu['nombres'] ?></td>
<td><?php echo $usu['apellidos'] ?></td>
<td><?php echo $usu['fecha'] ?></td>
<td><form action="buscar.php" method="post">
<input type="hidden" value="<?php echo $usu['codpqrs']; ?>" name="codigo">
<!--guarda el codigo de la pqrs en un formulario oculto para que al imprimir el boton màs podamos ver los datos completos de las pqrs-->
<input type="submit" value="Mas" id="campos">
 <?php 
} 
	 }
	 else{
$i=0;

	include '../php/conexion.php';
	$fecha1=$_POST['fecha1'];
	$fecha2=$_POST['fecha2'];
 $usuario=mysqli_query($conexion, "select tblpqrs.codpqrs,tblpqrs.usuario,tblusuario.nombres,tblusuario.apellidos,
 tblpqrs.estado,tblpqrs.fecha from tblpqrs inner join tblusuario on tblpqrs.usuario=tblusuario.docidentidad where
 tblpqrs.tipo='$tipo' and tblpqrs.fecha>='$fecha1' and tblpqrs.fecha<='$fecha2'");
 while($usu=mysqli_fetch_array($usuario)){
	 $i=$i+1;
 ?>
<tr>
<td><?php echo $i; ?></td><!--enumera cada uno de los datos-->
<td><?php echo $usu['usuario'] ?></td><!--nos muestras los datos del usuario(cedula, nombres, apellidos)-->
<td><?php echo $usu['nombres'] ?></td>
<td><?php echo $usu['apellidos'] ?></td>
<td><?php echo $usu['fecha'] ?></td>
<td><form action="buscar.php" method="post">
<input type="hidden" value="<?php echo $usu['codpqrs']; ?>" name="codigo">
<!--guarda el codigo de la pqrs en un formulario oculto para que al imprimir el boton màs podamos ver los datos completos de las pqrs-->
<input type="submit" value="Mas" id="campos">
 <?php 
}
 }
 }
 ?>
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</td></tr>
</table>
</table>
</div>
</body>
</html>