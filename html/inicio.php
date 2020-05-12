<!DOCTYPE html>
<html>
<head>
<title>PQRS SAMA</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/estilis.css">
<link rel="icon" href="../imagenes/logofw.png">
<script type="text/javascript" src="../javascript/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="../javascript/dist/Chart.bundle.min.js"></script>
<?php 
include("../php/conexion.php");
 @$pqrs=mysqli_query($conexion, "SELECT COUNT(*) FROM tblpqrs INNER JOIN tbltipopqrs ON tblpqrs.tipo=tbltipopqrs.codtipopqrs inner JOIN tblestadopqrs ON tblpqrs.estado=tblestadopqrs.codestadopqrs GROUP by tblpqrs.tipo");
 //seleccionamos los registros de la tabla pqrs y los contamos por tipo 

	

?>
<script>
	$(document).ready(function(){
		var datos = {
			type: "bar",
			data : {
				datasets :[{
					data : [<?php 
					while($resultado=mysqli_fetch_row($pqrs)){
						echo $resultado[0].",";
					}
					?>0,
					],
					backgroundColor: [
						"#F7464A",
						"#46BFBD",
						"#FDB45C",
						"#949FB1",
					
					],
				}],
				labels : [
					"Peticiones",
					"Quejas",
					"Reclamos",
					"Solicitudes",
					
				],

			},
			options : {
				responsive : true,
				
				
			}
		};

		var canvas = document.getElementById('chart').getContext('2d');
		window.pie = new Chart(canvas, datos);

	});
</script>
</head>
<body>
<div id="contenido">
<table border="3" width="100%" >
<tr><td>
<h1><img src="../imagenes/logofw.png"> <span class="nomPqr">PQRS SAMA</span> <?php include("../php/funcionario.php"); ?></h1>
<!--funcionario.php contiene los datos del funcionario que inicio sesion-->

<tr><td id="contenedor">
<h2>
<nav>
<?php
include("menu.php");
//con esto podemos tener  acceso al menu
?>
</nav>
</h2>
</td></tr>
<tr><td>
<table width="50%" height="450px"  align="center" id="contenedor">
<tr><td>

<canvas id="chart" width="200" height="90"></canvas>

</td></tr>
</td></tr>
</table>
</table>
</div>
<footer align="center"><a href="acercade.php">Acerca de</a></footer>
</body>
</html>

