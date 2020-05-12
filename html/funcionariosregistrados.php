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
<tr><td>
<table align="center" id="contenedor" border="2">
<tr><td colspan="2">
<h2>FUNCIONARIOS REGISTRADOS</h2>
<br>
</td></tr>
<?php
 include("../php/conexion.php");
 $usuario=mysqli_query($conexion, "select * from tblfuncionario") or die("Error en el select de el usuario".mysqli_error($conexion));
 while($usu=mysqli_fetch_array($usuario)){
	 ?>
	 <tr><th align="left"><h3>
	 <form action="datosfuncionario.php" method="post">
	 <?php
	 echo $usu['nombres']." ".$usu['apellidos'];
    ?>
</h3><br></th>
<td>
<input type="hidden" value="<?php echo $usu['docidentidad']; ?>" name="cedula">
<input type="submit" value="Ver Datos" id="campos">
</form>
</td>
</tr>
<?php
 }
?>
</table>
<br><br><br><br><br><br>
</table>
</table>
</div>
<footer align="center"><a href="acercade.php">Acerca de</a></footer>
</body>
</html>

