<!DOCTYPE html>
<html>
<head>
<title>PQRS SAMA</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/estilis.css">
<link rel="icon" href="../imagenes/logofw.png">
<script src="../javascript/tablaToExcel.js"></script>
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
$sql="SELECT COUNT(*) FROM tblpqrs where tipo='1'";
// cuenta todos los datos de la tabla pqrs done tipo =1(peticiones)
$consulta=mysqli_query($conexion,$sql);
$cons=mysqli_fetch_row($consulta);
?>
<br>
<table border="2" width="100%" id="tabla">
<tr><th colspan="5"><h2>Peticiones (<?php echo $cons[0]; ?>)</h2></th></tr>
<!-- nos muestra el resultado de la consulta8cantidad de peticiones-->
<tr>
<th>#</th>
<th>Cédula</th>
<th>Nombres</th>
<th>Apellidos</th>
<th>Más</th>
</tr>
<?php
$i=0;
 $usuario=mysqli_query($conexion, "select tblpqrs.codpqrs,tblpqrs.usuario,tblusuario.nombres,tblusuario.apellidos,tblpqrs.estado from tblpqrs inner join tblusuario on tblpqrs.usuario=tblusuario.docidentidad where tblpqrs.tipo='1'");
 while($usu=mysqli_fetch_array($usuario)){
	 $i=$i+1;
	 //hacemos  una consulta para que nos muestre los datos de los usuarios que han hecho paticiones
	 //mientras que en la  anterior consulta solo nos muestra la cantidad esta nos muestra los datos
 ?>
<tr>
<td><?php echo $i; ?></td><!--enumera cada uno de los datos-->
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
<br>
<button onclick="tableToExcel('tabla','Informe')" id="bajar" title="Genera un archico en excel con la informacion dada en esta pagina">
                Exportar a Excel
            </button>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</td></tr>
</table>
</table>
</div>
<footer align="center"><a href="acercade.php">Acerca de</a></footer>
</body>
  <script>

    $(document).ready(function(){
      $("#bajar").on('click',requestDescargar);
      function requestDescargar(){
        tableToExcel("tabla","informe")
      }
    })
  </script>
</html>