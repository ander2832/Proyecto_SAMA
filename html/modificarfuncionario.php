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
<h1><img src="../imagenes/logofw.png"><span class="nomPqr"> PQRS SAMA</span> <?php include("../php/funcionario.php"); ?></h1>
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
if(!empty($_POST['usuario'])){
include('../php/conexion.php');
$accion=$_POST["accion"];
$usuario=$_POST["usuario"];
$contraseña=$_POST["contraseña"];
$nombres=$_POST["nombres"];
if($accion==1){
$consulta=mysqli_query($conexion,"select * from tblfuncionario where docidentidad='$usuario' and contrasena='$contraseña' and nombres='$nombres'");
if($consult=mysqli_fetch_array($consulta)){
?>
<form action="../php/modificarfuncionario2.php" method="post">
<input type="hidden" name="cedula" value="<?php echo $consult['docidentidad'] ?>">
<table id="contenedor">
<tr align="center">
<th height="50">Cédula</th>
<td><?php echo $consult['docidentidad'] ?></td>
</tr>
<tr align="center">
<th height="50">Nombres</th>
<td><input type="text" name="nom" id="campos" value="<?php echo $consult['nombres'] ?>" required></td>
</tr>
<tr align="center">
<th height="50">Apellidos</th>
<td><input type="text" name="apelli" id="campos" value="<?php echo $consult['apellidos'] ?>" required></td>
</tr>
<tr align="center">
<th height="50">E-mail</th>
<td><input type="text" name="emai" id="campos" value="<?php echo $consult['email'] ?>"></td>
</tr>
<tr align="center">
<th height="50">Teléfono Fijo</th>
<td><input type="text" name="telfi" id="campos" value="<?php echo $consult['telfijo'] ?>"></td>
</tr>
<tr align="center">
<th height="50">Teléfono Móvil</th>
<td><input type="text" name="telmov" id="campos" value="<?php echo $consult['telmovil'] ?>"></td>
</tr>
<tr align="center">
<th>Cargo</th>
<td>
<select name="cargo" id="campos">
<?php 
$consulta=mysqli_query($conexion,"SELECT * FROM tblcargo") or die("error en la consulta".mysqli_error);
			while($cons=mysqli_fetch_array($consulta)){
				?>
			<option value="<?php echo $cons['codcargo']; ?>"><?php echo $cons['nombre']; ?></option>
			<?php
			}?></select>
</td></tr>
<tr align="center">
<td height="50" colspan="2">
<input type="submit" value="Modificar" id="campos">
</form>
</td>
</tr>
</table>
<?php
     }
     else{
	?>
<table border="2" width="400px" height="300px"  align="center">
<tr><td align="center">
<?php
echo "Usuario o contraseña incorrecta";
?>
<br>
<a href="funcionariosregistrados.php"><button id="campos">Regresar</button></a><br>
</td></tr>
</table>
<?php
   }
}else {
if($accion=2){
	$contranueva=$_POST["contraseñanueva"];
	$confirmarcontra=$_POST["confirmarcontraseña"];
	if($contranueva==$confirmarcontra){
		$consulta=mysqli_query($conexion,"select * from tblfuncionario where docidentidad='$usuario' and contrasena='$contraseña' and nombres='$nombres'");
      if($consult=mysqli_fetch_array($consulta)){
		  $sql="UPDATE tblfuncionario SET contrasena = '$contranueva' WHERE docidentidad = '$usuario'";
		  mysqli_query($conexion,$sql);
          mysqli_close($conexion);
          header("location:../html/inicio.php");
	  }else{
		  ?>
<table border="2" width="400px" height="300px"  align="center">
<tr><td align="center">
<?php
echo "Usuario o contraseña incorrecta";
?>
<br>
<form action="modificardatosfuncionario.php" method="post">
<input type="hidden" value="<?php echo $usuario;?>" name="cedula">
<input type="hidden" value="2" name="accion">
<input type="submit" value="Regresar" id="campos"><br>
</form>
</td></tr>
</table>
<?php
	  }
	  
	}else{
		?>
<table border="2" width="400px" height="300px"  align="center">
<tr><td align="center">
<?php
echo "Las contraseñas no coiciden";
?>
<br>
<form action="modificardatosfuncionario.php" method="post">
<input type="hidden" value="<?php echo $usuario;?>" name="cedula">
<input type="hidden" value="2" name="accion">
<input type="submit" value="Regresar" id="campos"><br>
</form>
</td></tr>
</table>
<?php
	}
  }
}
}
?>
</td></tr>
</table>
</table>
</div>
</body>
</html>


