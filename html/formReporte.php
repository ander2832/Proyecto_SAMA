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
<font size="+1">
<table width="50%" height="450px" id="contenedor">
<tr><td align="center">
<table width="30%" height="700px">
<?php
if(!empty($_POST['cc'])){
	?>
<form action="rep.php" method="POST">
<tr><td colspan="2" align="center"><h1>REPORTE</h1><br><br></td></tr>
<?php
 include("../php/conexion.php");
 $usuario=mysqli_query($conexion, "select * from tblusuario where docidentidad='$_POST[cc]'") or die("Error en el select de el usuario".mysqli_error($conexion));
 //selecciona todo lo de la tabla usuario donde el documento de identidad=cedula(ingresada desde reporte .php)
 if($usu=mysqli_fetch_array($usuario)){
	//si el usuario ya esta registrado nos apacrecen ya los datos del usuario
	$direccion=mysqli_query($conexion, "select * FROM tbldireccion where coddireccion='$usu[direccion]'");
$dire=mysqli_fetch_array($direccion);
	?>
<tr align="left"><th>Nombres:</th><td><input type="text" name="nombres" readonly value="<?php echo $usu['nombres']?>" required id="campos"></td></tr>
<tr align="left"><th>Apellidos:</th><td><input type="text" name="apellidos" required readonly value="<?php echo $usu['apellidos']?>" id="campos"></td></tr>
<tr align="left"><th>Cedula:</th><td> <input type="text" name="cedula" required readonly value="<?php echo $usu['docidentidad']?>" id="campos"></td></tr>
<tr align="left"><th>Dirección:</th><td> <input type="text" name="direccion" required readonly value="<?php echo $dire['nombre']?>" id="campos"></td></tr>
<tr align="left"><th></th><td><input type="text" name="barrio" value="<?php echo $usu['barrio']?>" id="campos" readonly></td></tr>
<tr align="left"><th>Teléfono Fijo:</th><td> <input type="text" name="telfijo" readonly value="<?php echo $usu['telfijo']?>" id="campos"></td></tr>
<tr align="left"><th>Teléfono Movil:</th><td> <input type="text" name="telmovil" readonly value="<?php echo $usu['telmovil']?>" id="campos"></td></tr>
<tr align="left"><th>Correo Electronico:</th><td> <input type="email" name="correo" readonly value="<?php echo $usu['email']?>" id="campos"></td></tr>
 <?php
 }
 else{
	 // si el usuario es nuevo nos mostrara un formulario para registrarlo
?>
<tr align="left"><th>Nombres:</th><td><input type="text" name="nombres" required id="campos"></td></tr>
<tr align="left"><th>Apellidos:</th><td><input type="text" name="apellidos" required id="campos"></td></tr>
<tr align="left"><th>Cedula:</th><td> <input type="text" name="cedula" required value="<?php echo $_POST["cc"]?>" id="campos"></td></tr>
<?php
$direccion=mysqli_query($conexion, "select * from tbldireccion") or die("Error en el select de la direccion".mysqli_error($conexion));
?>
<tr align="left"><th>Dirección</th>
<td><select name="direccion" id="campos" required><option value="">Seleccione</option><?php while($dire=mysqli_fetch_array($direccion)){ ?><option value="<?php echo $dire['coddireccion'];?>"><?php echo $dire['nombre'];?></option>
<?php }?></select></td></tr>
<tr align="left"><th></th><td><input type="text" name="barrio" placeholder="Sector" id="campos"></td></tr>
<tr align="left"><th>Teléfono Fijo:</th><td> <input type="text" name="telfijo" id="campos"></td></tr>
<tr align="left"><th>Teléfono Movil:</th><td> <input type="text" name="telmovil" id="campos"></td></tr>
<tr align="left"><th>Correo Electronico:</th><td> <input type="email" name="correo" id="campos"></td></tr>
<?php
 }
 ?>
<tr align="left"><th>Fecha:</th><td colspan="2"> <input type="date" name="fecha" required id="campos"></td></tr>
<tr align="left"><th>Tipo Reporte:</th><td colspan="2"> <select name="tipo" id="campos" required>
<option value="">Seleccione</option>;
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
      </select></td>
<tr><th colspan="2"><br>Descripcion Caso:<br><br>
<textarea name="caso" cols="50" rows="10" id="campos" required></textarea> 
<br><br><input type="submit" value="Guardar" id="campos">
</form>
<?php
$usuario=mysqli_query($conexion, "select * from tblusuario where docidentidad='$_POST[cc]'") or die("Error en el select de el usuario".mysqli_error($conexion));
if($usu=mysqli_fetch_array($usuario)){
	?>
<form action="modificarusuario.php" method="post">
<input type="hidden" name="cedula" value="<?php echo $_POST["cc"];?>">
<input type="submit" value="Modificar datos de usuario" id="campos">
</form>
<?php
}
?>
</th></tr>
</table>
<?php
}
?>
</font>
</td></tr>
</table>
</table>
</div>
<footer align="center"><a href="acercade.php">Acerca de</a></footer>
</body>
</html>