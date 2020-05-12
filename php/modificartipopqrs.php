<?php

include('conexion.php');

$consulta=mysqli_query($conexion,"select * from tbltipopqrs
       where codtipopqrs='1'");
	   while($consult=mysqli_fetch_array($consulta)){
		  // echo $consult['codtipopqrs'];
		  // echo $consult['nombre'];
  

?>
<html>
<body>

<form action="modificartipopqrs2.php" method="post">
<input type="hidden" name="codtipopqrs" value="<?php echo $consult['codtipopqrs'] ?>">
<br>
<input type="text" name="nom" value="<?php echo $consult['nombre'] ?>">
<?php
	   }
 ?>
 <br>
 <input type="submit" value="Enviar" id="campos">	

</body>
</html>