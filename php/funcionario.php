<div class="nombre"><a href="datosfuncionario.php">
<?php
@session_start();
if (empty($_SESSION["usuario"])){
	header("location:../html/index.php");
	//si no se a iniciado sesion nos llevara automaticamente a index.php para iniciar sesion
}
$funcionario=$_SESSION['usuario'];
include("../php/conexion.php");
$consulta=mysqli_query($conexion,"select * from tblfuncionario where docidentidad='$funcionario'")
or die("Error".mysqli_error($conexion)); 
//seleccione todos los datos del funcionario que inicio sesion
if($cons=mysqli_fetch_array($consulta)){
	echo $cons['nombres'] ." ". $cons['apellidos'];
	//escribe los nombres y apellidos del funcionario que inicio sesion( aparece en la parte superior derecha)
  }
 ?>
</a>
</div>