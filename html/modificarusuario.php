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
<h1><img src="../imagenes/logofw.png"><span class="nomPqr">PQRS SAMA</span><?php include("../php/funcionario.php");?></h1>
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
<tr>
<td>
<h1>Modificar Datos De Usuario</h1>
<table border="3" width="100%" align="center">
<tr><th colspan="7" >Datos De Usuario</th>
<?php
$cedula=$_POST['cedula'];
$consulta=mysqli_query($conexion,"select * from tblusuario where docidentidad='$cedula'");
	   $consult=mysqli_fetch_array($consulta);
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
$direccion=mysqli_query($conexion, "select * FROM tbldireccion where coddireccion='$consult[direccion]'");
$dire=mysqli_fetch_array($direccion);
$di=mysqli_query($conexion, "select * FROM tbldireccion");
?>
<tr height="70">
<form action="../php/modificarusuario2.php" method="post">
<td><?php echo $cedula;?></td>
<td><input type="text" name="nom" value="<?php echo $consult['nombres'] ?>" required id="campos"></td>
<td><input type="text" name="apelli" value="<?php echo $consult['apellidos'] ?>" required id="campos"></td>
<td><select name="direccion"  id="campos"> <option value="<?php echo $consult['direccion'] ?>"><?php echo $dire['nombre'] ?></option><?php while($dir=mysqli_fetch_array($di)){ ?><option value="<?php echo $dir['coddireccion'];?>"><?php echo $dir['nombre']; }?></option><?php if($consult['direccion']==1){ ?><br><input type="text" name="barrio" id="campos" value="<?php echo $consult['barrio']?>"><?php } ?></td>
<td><input type="email" name="emai" value="<?php echo $consult['email'] ?>" id="campos"></td>
<td><input type="text" name="telfi" value="<?php echo $consult['telfijo'] ?>" id="campos"></td>
<td><input type="text" name="telmov" value="<?php echo $consult['telmovil'] ?>" id="campos"></td>
</tr>
<tr>
<td colspan="7">
<br>
<input type="hidden" name="cedula" value="<?php echo $cedula;?>">
<input type="submit" value="Modificar" id="campos">
</form>
<br>
</td>
</tr>
</table>
</td></tr>
</table>
</table>
</div>
</body>
</html>
