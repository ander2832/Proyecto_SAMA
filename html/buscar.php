<!DOCTYPE html>
<title>PQRS SAMA</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/estilis.css">
<link rel="icon" href="../imagenes/logofw.png">
</head>
<body>
<div id="contenido">
<table border="3" width="100%" >
<tr><td>
<h1><img src="../imagenes/logofw.png"> <span class="nomPqr">PQRS SAMA</span> <?php include("../php/funcionario.php");?></h1><!--muestra el nombre del funcionario-->
</td></tr>
<tr><td id="contenedor" >
<h2>
<nav>
<?php 
include("../html/menu.php");//muestra el menu 
?>
</nav>
</h2>
</td></tr>
<tr><td>
<table width="50%" height="450px"  align="center" id="contenedor">
<tr>
<td>
<?php
if(!empty($_POST['codigo'])){
?>
<h1>CONSULTA</h1>
<table border="3" width="100%" align="center">
<tr><th colspan="7" ><h2>Datos de Usuario</h2></th>

<?php
$codigo=$_POST['codigo'];//recibe el codigo de la pqrs enviado desde el formulario
 include("../php/conexion.php");
 @$pqrs=mysqli_query($conexion, "select tblpqrs.codpqrs,tblpqrs.fecha,tblpqrs.usuario,tblpqrs.descripcion,tblpqrs.tipo,tblpqrs.estado,tblusuario.docidentidad,tblusuario.nombres,tblusuario.apellidos,tblusuario.direccion,tblusuario.barrio,tblusuario.email,tblusuario.telfijo,tblusuario.telmovil from tblpqrs inner join tblusuario on tblpqrs.usuario=tblusuario.docidentidad where tblpqrs.codpqrs='$codigo'");
 //hace una consulta uniendo las tablas pqrs y usuario y seleccionando todos sus campos 
 $resultado=mysqli_fetch_array($pqrs);
 $usua=mysqli_query($conexion, "select * from tblfuncionario where docidentidad='$_SESSION[usuario]'");
 //selecciona todos los datos del funcionario que inicio sesion
 $usuario=mysqli_fetch_array($usua);
 $usuario=$usuario['nombres']." ". $usuario['apellidos'];//guarda los nombres y los apellidos del funcionario en una variable
?>
<tr>
<th>Cédula</th>
<th>Nombres</th>
<th>Apellidos</th>
<th>Dirección</th>
<th>Email</th>
<th>Teléfono Fijo</th>
<th>Teléfono Móvil</th>
</tr>
<?php
$direccion=mysqli_query($conexion, "select * FROM tbldireccion where coddireccion='$resultado[direccion]'");
$dire=mysqli_fetch_array($direccion);
?>
<tr height="70">
<td><?php echo $resultado['usuario']?></td>
<td><?php echo $resultado['nombres']?> </td>
<td><?php echo $resultado['apellidos'] ?></td>
<td><?php echo $dire['nombre']." ".$resultado['barrio'] ?></td>
<td><?php echo $resultado['email']?></td>
<td><?php echo $resultado['telfijo']?></td>
<td><?php echo $resultado['telmovil']?></td>
</tr>
<tr>
<td colspan="7">
<form action="modificarusuario.php" method="post">
<input type="hidden" name="cedula" value="<?php echo $resultado['usuario'];?>">
<br>
<input type="submit" value="Modificar datos de usuario" id="campos">
</form>
<br>
</td>
</tr>
<tr>
<th colspan="7"><h3>Reporte</h3></th>
</tr>
<tr>
<th colspan="2">Fecha</th>
<th colspan="3">Tipo</th>
<th colspan="2">Estado</th>
</tr>
<tr>
<td colspan="2"><?php echo $resultado['fecha']?></td>
<?php
$tip=$resultado['tipo'];
$tipo=mysqli_query($conexion, "select nombre from tbltipopqrs where codtipopqrs='$tip'");//selecciona el nombre del tipo pqrs de la tabla tipopqrs 
$result=mysqli_fetch_array($tipo);
?>
<td colspan="3"><?php echo $result['nombre']?></td>
<?php
$est=$resultado['estado'];
$estado=mysqli_query($conexion, "select nombre from tblestadopqrs where codestadopqrs='$est'");//selecciona el nombre del estado de la pqrs de la tabla estadopqrs
$res=mysqli_fetch_array($estado);
?>
<td colspan="2"><?php echo $res['nombre']?></td>
</tr>
<tr>
<th colspan="7">Descripción Caso</th>
</tr>
<tr>
<td colspan="7"><br><?php echo $resultado['descripcion']?><br><br></td>
</tr>
<?php
if ($est==1)	
{	
//si el estado es 1 (pendiente) nos muestra un formulario para insertar tratamiento
?>
<form action="tratamiento1.php" method="post">
<tr><th colspan="7">TRATAMIENTO 1</th></tr>
<td colspan="4">Fecha Tratamiento:</td><td colspan="3"><input type="date" name="fechatratamiento" required id="campos"></td></tr><br>
<tr><td colspan="4">Asignado a:</td><td colspan="3"><select name="asignadoa" required id="campos">
<option value="">Seleccione</option>
<?php
$destino=mysqli_query($conexion, "select * from tbldestino");
while($dest=mysqli_fetch_array($destino)){
?>
         <option value="<?php echo $dest['coddestino']; ?>"><?php echo $dest['nombre']; ?></option>
		 <?php
}
		 ?>
      </select></td></tr>
 <tr><td colspan="4">Funcionario</td><td colspan="3"><?php echo $usuario;?></td></tr>
<tr><td colspan="7">Gestión: <br><br>
<textarea name="gestion" cols="50" rows="10" id="campos" required></textarea>
<input type="hidden" name="estado" value="1"> 
<input type="hidden" name="codpqrs" value="<?php echo $codigo; ?>"> 
<br><br><input type="submit" value="Guardar" id="campos">
</td></tr>
</form>
<?php 
}
if($est==2)
{
//si el estado es 2(en proceso)	nos muestra los tratamientos hechos anteriormente y ademas nos permite insertar un nuevo tratamiento
$i=0;
 $tratamiento=mysqli_query($conexion, "select * from tbltratamiento where codpqrs='$resultado[codpqrs]'");
 while($resu=mysqli_fetch_array($tratamiento))
 {$i=$i+1;
	 $destino=$resu['destino'];
	 $asignadoa=mysqli_query($conexion, "select * from tbldestino where coddestino='$destino'");
	 $asig=mysqli_fetch_array($asignadoa)
?>
<tr><th colspan="7">TRATAMIENTO <?php echo $i; ?></th></tr>
<td colspan="4">Fecha Tratamiento:</td><td colspan="3"><?php echo $resu['fecha']?></td></tr>
<tr><td colspan="4">Asignado a:</td><td colspan="3"><?php echo $asig['nombre'];?></td></tr>
<?php 
 $funci=$resu['funcionario'];
 $funcionario=mysqli_query($conexion, "select * from tblfuncionario where docidentidad='$funci'");
 $fun=mysqli_fetch_array($funcionario);
?>
<tr><td colspan="4">Funcionario</td><td colspan="3"><?php echo $fun['nombres']." ".$fun['apellidos'];?> </td></tr>
<tr><td colspan="7">Gestión</td></tr>
<tr><td colspan="7"><br><?php echo $resu['descripcion']?><br><br></td></tr>
<?php
 }
 $i=$i+1;
?>
<tr><td colspan="7" align="center">
<br>
<form action="../php/pro_trat.php" method="post">
<input type="hidden" name="codpqrs" value="<?php echo $codigo; ?>">
<input type="hidden" name="accion" value="3">
<input type="submit" value="Cerrar Caso" id="campos">
<br>
<br>
</form>
</td></tr>
<form action="tratamiento1.php" method="post">
<tr><th colspan="7">TRATAMIENTO <?php echo $i; ?></th></tr>
<td colspan="4">Fecha Tratamiento:</td><td colspan="3"><input type="date" name="fechatratamiento" required id="campos"></td></tr>
<tr><td colspan="4">Asignado a:</td><td colspan="3"><select name="asignadoa" required id="campos">
         <?php
$destino=mysqli_query($conexion, "select * from tbldestino");
while($dest=mysqli_fetch_array($destino)){
?>
         <option value="<?php echo $dest['coddestino']; ?>"><?php echo $dest['nombre']; ?></option>
		 <?php
}
		 ?>
      </select></td></tr>
	  <?php 


?>
<tr><td colspan="4">Funcionario</td><td colspan="3"><?php echo $usuario; ?></td></tr>
<tr><td colspan="7">Gestión: <br><br>
<input type="hidden" name="codpqrs" value="<?php echo $codigo;  ?>">
<input type="hidden" name="estado" value="2"> 
<textarea name="gestion" cols="50" rows="10" id="campos"></textarea>
<br><br><input type="submit" value="Guardar" id="campos">
</td></tr>
</form>
<?php
}
if($est==3)
{
//si el estado es 3(cerrado) nos muestra todos los tratamientos hechos al caso
	$i=0;
	$tratamiento=mysqli_query($conexion, "select * from tbltratamiento where codpqrs='$resultado[codpqrs]'");
 while($resu=mysqli_fetch_array($tratamiento))
 {$i=$i+1;
	 $destino=$resu['destino'];
	 $asignadoa=mysqli_query($conexion, "select * from tbldestino where coddestino='$destino'");
	 $asig=mysqli_fetch_array($asignadoa)
?>
<tr><th colspan="7">TRATAMIENTO <?php echo $i;?></th></tr>
<td colspan="4">Fecha Tratamiento:</td><td colspan="3"><?php echo $resu['fecha']?></td></tr>
<tr><td colspan="4">Asignado a:</td><td colspan="3"><?php echo $asig['nombre'];?></td></tr>
<?php 
 $funci=$resu['funcionario'];
 $funcionario=mysqli_query($conexion, "select * from tblfuncionario where docidentidad='$funci'");
 $fun=mysqli_fetch_array($funcionario);
?>
<tr><td colspan="4">Funcionario</td><td colspan="3"><?php echo $fun['nombres']." ".$fun['apellidos'];?> </td></tr>
<tr><td colspan="7">Gestión</td></tr>
<tr><td colspan="7"><br><?php echo $resu['descripcion']?><br><br></td></tr>
<?php
 }
}
}
?>
</table>
</td></tr>
</table>
</table>
</div>
<footer align="center"><a href="acercade.php">Acerca de</a></footer>
</body>
</html>
