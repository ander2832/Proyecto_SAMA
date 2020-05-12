

<?php

<?php
  include("conexion.php");
$sql="UPDATE tbltratamiento (fecha, codpqrs, funcionario, descripcion, destino) VALUES ('$fec_trat', '$_POST[codigo]', '$_SESSION[usuario]', '$gest', '$asig_a')";
 mysqli_query($conexion,$sql) or die ("Error en el modificar del tratamiento".mysqli_error($conexion));
header("location:../html/inicio.php");
?>

<html>
<body>

<form action="" method="post">
<input type="hidden" name="codtratamiento" value="<?php echo $consult['codtratamiento'] ?>">
<br>
<input type="text" name="fech" value="<?php echo $consult['fecha'] ?>">
<input type="text" name="codpqrs" value="<?php echo $consult['codpqrs'] ?>">
<input type="text" name="funci" value="<?php echo $consult['funcionario'] ?>">
<input type="text" name="descrip" value="<?php echo $consult['descripcion'] ?>">
<input type="dest" name="fech" value="<?php echo $consult['destino'] ?>">

 <br>
 
 <input type="submit" value="Enviar" id="campos">	

</body>
</html>

