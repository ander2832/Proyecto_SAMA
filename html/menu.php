<ul class="nav">
<li><a href="inicio.php">INICIO</a></li>
<li><a href="">REPORTE</a>
<ul>
<li><a href="reporte.php">Registrar reportes</a></li>
<li><a href="registros.php">Lista de Reportes</a>
<ul>
<?php
include("../php/conexion.php");
$sql="SELECT COUNT(*) FROM tblpqrs where estado='1'";
$consulta=mysqli_query($conexion,$sql);
$pendiente=mysqli_fetch_row($consulta);
?>
<li><a href="pendientes.php">Pendientes (<?php echo $pendiente[0]; ?>)</a></li>
<?php
$sql="SELECT COUNT(*) FROM tblpqrs where estado='2'";
$consulta=mysqli_query($conexion,$sql);
$enproceso=mysqli_fetch_row($consulta);
?>
<li><a href="enproceso.php">En Proceso (<?php echo $enproceso[0]; ?>)</a></li>
<?php
$sql="SELECT COUNT(*) FROM tblpqrs where estado='3'";
$consulta=mysqli_query($conexion,$sql);
$cerrados=mysqli_fetch_row($consulta);
?>
<li><a href="cerrados.php">Cerrados (<?php echo $cerrados[0]; ?>)</a></li>
</ul>
</li>
</ul>
</li>
<li><a href="">CONSULTA</a>
<?php
include("../php/conexion.php");
$sql="SELECT COUNT(*) FROM tblpqrs where tipo='1'";// selecciona todo de la tabla pqrs donde el tipo sea peticion
$consulta=mysqli_query($conexion,$sql);
$cons=mysqli_fetch_row($consulta);
?>
<ul>
<li><a href="peticiones.php">Peticiones (<?php echo $cons[0]; ?>)</a><!-- escribe el resultado de la consulta -->
<ul>
<?php
$sql="SELECT COUNT(*) FROM tblpqrs where tipo='1' and estado='1'";// selecciona todo de la tabla pqrs donde el tipo sea peticion y el estado pendiente
$consulta=mysqli_query($conexion,$sql);
$cons=mysqli_fetch_row($consulta);
?>
<li><a href="peticionespendientes.php">Pendientes (<?php echo $cons[0]; ?>)</a></li><!-- escribe el resultado de la consulta-->
<?php
$sql="SELECT COUNT(*) FROM tblpqrs where tipo='1' and estado='2'";
$consulta=mysqli_query($conexion,$sql);
$cons=mysqli_fetch_row($consulta);
?>
<li><a href="peticionesenproceso.php">En proceso (<?php echo $cons[0]; ?>)</a></li>
<?php
$sql="SELECT COUNT(*) FROM tblpqrs where tipo='1' and estado='3'";
$consulta=mysqli_query($conexion,$sql);
$cons=mysqli_fetch_row($consulta);
?>
<li><a href="peticionescerradas.php">Cerradas (<?php echo $cons[0]; ?>)</a></li>
</ul>
</li>
<?php
$sql="SELECT COUNT(*) FROM tblpqrs where tipo='2'";
$consulta=mysqli_query($conexion,$sql);
$cons=mysqli_fetch_row($consulta);
?>
<li><a href="quejas.php">Quejas (<?php echo $cons[0]; ?>)</a>
<ul>
<?php
$sql="SELECT COUNT(*) FROM tblpqrs where tipo='2' and estado='1'";
$consulta=mysqli_query($conexion,$sql);
$cons=mysqli_fetch_row($consulta);
?>
<li><a href="quejaspendientes.php">Pendientes (<?php echo $cons[0]; ?>)</a></li>
<?php
$sql="SELECT COUNT(*) FROM tblpqrs where tipo='2' and estado='2'";
$consulta=mysqli_query($conexion,$sql);
$cons=mysqli_fetch_row($consulta);
?>
<li><a href="quejasenproceso.php">En proceso (<?php echo $cons[0]; ?>)</a></li>
<?php
$sql="SELECT COUNT(*) FROM tblpqrs where tipo='2' and estado='3'";
$consulta=mysqli_query($conexion,$sql);
$cons=mysqli_fetch_row($consulta);
?>
<li><a href="quejascerradas.php">Cerradas (<?php echo $cons[0]; ?>)</a></li>
</ul>
</li>
<?php
$sql="SELECT COUNT(*) FROM tblpqrs where tipo='3'";
$consulta=mysqli_query($conexion,$sql);
$cons=mysqli_fetch_row($consulta);
?>
<li><a href="reclamos.php">Reclamos (<?php echo $cons[0]; ?>)</a>
<ul>
<?php
$sql="SELECT COUNT(*) FROM tblpqrs where tipo='3' and estado='1'";
$consulta=mysqli_query($conexion,$sql);
$cons=mysqli_fetch_row($consulta);
?>
<li><a href="reclamospendientes.php">Pendientes (<?php echo $cons[0]; ?>)</a></li>
<?php
$sql="SELECT COUNT(*) FROM tblpqrs where tipo='3' and estado='2'";
$consulta=mysqli_query($conexion,$sql);
$cons=mysqli_fetch_row($consulta);
?>
<li><a href="reclamosenproceso.php">En proceso (<?php echo $cons[0]; ?>)</a></li>
<?php
$sql="SELECT COUNT(*) FROM tblpqrs where tipo='3' and estado='3'";
$consulta=mysqli_query($conexion,$sql);
$cons=mysqli_fetch_row($consulta);
?>
<li><a href="reclamoscerrados.php">Cerrados (<?php echo $cons[0]; ?>)</a></li>
</ul>
</li>
<?php
$sql="SELECT COUNT(*) FROM tblpqrs where tipo='4'";
$consulta=mysqli_query($conexion,$sql);
$cons=mysqli_fetch_row($consulta);
?>
<li><a href="solicitudes.php">Solicitudes (<?php echo $cons[0]; ?>)</a>
<ul>
<?php
$sql="SELECT COUNT(*) FROM tblpqrs where tipo='4' and estado='1'";
$consulta=mysqli_query($conexion,$sql);
$cons=mysqli_fetch_row($consulta);
?>
<li><a href="solicitudespendientes.php">Pendientes (<?php echo $cons[0]; ?>)</a></li>
<?php
$sql="SELECT COUNT(*) FROM tblpqrs where tipo='4' and estado='2'";
$consulta=mysqli_query($conexion,$sql);
$cons=mysqli_fetch_row($consulta);
?>
<li><a href="solicitudesenproceso.php">En proceso (<?php echo $cons[0]; ?>)</a></li>
<?php
$sql="SELECT COUNT(*) FROM tblpqrs where tipo='4' and estado='3'";
$consulta=mysqli_query($conexion,$sql);
$cons=mysqli_fetch_row($consulta);
?>
<li><a href="solicitudescerradas.php">Cerradas (<?php echo $cons[0]; ?>)</a></li>
</ul>
</li>
</ul>
</li>
<li><a href="">FUNCIONARIO</a>
<ul>
<li><a href="formregistrofuncionario.php">Registrar Funcionario</a></li>
<li><a href="funcionariosregistrados.php">Funcionarios Registrados</a></li>
</ul>
</li>
<li><a href="registros.php">REGISTROS PQRS</a>
<ul>
<li><a href="../html/pendientes.php">Pendientes (<?php echo $pendiente[0]; ?>)</a></li>
<li><a href="../html/enproceso.php">En proceso (<?php echo $enproceso[0]; ?>)</a></li>
<li><a href="../html/cerrados.php">Cerrado (<?php echo $cerrados[0]; ?>)</a></li>
<li><a href="../html/filtros.php">Filtrar</a></li>
</ul>
</li>
<li><a href="graficos.php">GRÁFICOS</a></li>
<li><a href="index.php">CERRAR SESIÓN</a></li>
</ul>
<div align="right"><a href="../manualusuario.pdf"><button id="campos">Descargar Manual de Usuario</button></a></div>