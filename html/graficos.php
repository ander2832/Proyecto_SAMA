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
 @$pqrs=mysqli_query($conexion, "SELECT COUNT(*) FROM tblpqrs INNER JOIN tbltipopqrs ON tblpqrs.tipo=tbltipopqrs.codtipopqrs inner JOIN tblestadopqrs ON tblpqrs.estado=tblestadopqrs.codestadopqrs where tbltipopqrs.codtipopqrs='1' GROUP by tblestadopqrs.codestadopqrs");
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
						
					
					],
				}],
				labels : [
					"Pendientes",
					"En proceso",
					"Cerrados",
					
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
<?php 
include("../php/conexion.php");
 @$quejas=mysqli_query($conexion, "SELECT COUNT(*) FROM tblpqrs INNER JOIN tbltipopqrs ON tblpqrs.tipo=tbltipopqrs.codtipopqrs inner JOIN tblestadopqrs ON tblpqrs.estado=tblestadopqrs.codestadopqrs where tbltipopqrs.codtipopqrs='2' GROUP by tblestadopqrs.codestadopqrs");
 //seleccionamos los registros de la tabla pqrs y los contamos por tipo 

	

?>

<script>
	$(document).ready(function(){
		var datos = {
			type: "bar",
			data : {
				datasets :[{
					data : [<?php 
					while($resultadoqueja=mysqli_fetch_row($quejas)){
						echo $resultadoqueja[0].",";
					}
					?>0,
					],
					backgroundColor: [
						"#F7464A",
						"#46BFBD",
						"#FDB45C",
						
					
					],
				}],
				labels : [
					"Pendientes",
					"En proceso",
					"Cerrados",
					
				],

			},
			options : {
				responsive : true,
				
				
			}
		};

		var quejas = document.getElementById('quejas').getContext('2d');
		window.pie = new Chart(quejas, datos);

	});
</script>
<?php 
include("../php/conexion.php");
 @$reclamos=mysqli_query($conexion, "SELECT COUNT(*) FROM tblpqrs INNER JOIN tbltipopqrs ON tblpqrs.tipo=tbltipopqrs.codtipopqrs inner JOIN tblestadopqrs ON tblpqrs.estado=tblestadopqrs.codestadopqrs where tbltipopqrs.codtipopqrs='3' GROUP by tblestadopqrs.codestadopqrs");
 //seleccionamos los registros de la tabla pqrs y los contamos por tipo 

	

?>

<script>
	$(document).ready(function(){
		var datos = {
			type: "bar",
			data : {
				datasets :[{
					data : [<?php 
					while($resultadoreclamos=mysqli_fetch_row($reclamos)){
						echo $resultadoreclamos[0].",";
					}
					?>0,
					],
					backgroundColor: [
						"#F7464A",
						"#46BFBD",
						"#FDB45C",
						
					
					],
				}],
				labels : [
					"Pendientes",
					"En proceso",
					"Cerrados",
					
				],

			},
			options : {
				responsive : true,
				
				
			}
		};

		var reclamos = document.getElementById('reclamos').getContext('2d');
		window.pie = new Chart(reclamos, datos);

	});
</script>

<?php 
include("../php/conexion.php");
 @$solicitudes=mysqli_query($conexion, "SELECT COUNT(*) FROM tblpqrs INNER JOIN tbltipopqrs ON tblpqrs.tipo=tbltipopqrs.codtipopqrs inner JOIN tblestadopqrs ON tblpqrs.estado=tblestadopqrs.codestadopqrs where tbltipopqrs.codtipopqrs='4' GROUP by tblestadopqrs.codestadopqrs");
 //seleccionamos los registros de la tabla pqrs y los contamos por tipo 

	

?>

<script>
	$(document).ready(function(){
		var datos = {
			type: "bar",
			data : {
				datasets :[{
					data : [<?php 
					while($resultadosolicitudes=mysqli_fetch_row($solicitudes)){
						echo $resultadosolicitudes[0].",";
					}
					?>0,
					],
					backgroundColor: [
						"#F7464A",
						"#46BFBD",
						"#FDB45C",
						
					
					],
				}],
				labels : [
					"Pendientes",
					"En proceso",
					"Cerrados",
					
				],

			},
			options : {
				responsive : true,
				
				
			}
		};

		var solicitudes = document.getElementById('solicitudes').getContext('2d');
		window.pie = new Chart(solicitudes, datos);

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
<table align="center" id="contenedor" width="100%" height="650px">
<tr><td>
<div style="width:45%;height:200px;margin-left:0px;margin-top:25px;float:left">
<label><a href="peticiones.php">Peticiones</a></label>
<canvas id="chart" style="width:45%;height:200px;"></canvas>
</div>
<div style="width:45%;height:200px;margin-top:25px;float:right">
<label><a href="quejas.php">Quejas</a></label>
<canvas id="quejas" style="width:50%;height:200px"></canvas>
</div>
<br>
</td></tr>
<tr><td>
<div style="width:45%;height:200px;margin-top:25px;float:left">
<label><a href="reclamos.php">Reclamos</a></label>
<canvas id="reclamos" style="width:50%;height:200px"></canvas>
</div>
<div style="width:45%;height:200px;margin-top:25px;float:right">
<label><a href="solicitudes.php">Solicitudes</a></label>
<canvas id="solicitudes" style="width:50%;height:200px"></canvas>
</div>
</td></tr>
</td></tr>
</table>
</table>
</div>
<footer align="center"><a href="acercade.php">Acerca de</a></footer>
</body>
</html>

