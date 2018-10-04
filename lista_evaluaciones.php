<?php
require_once('/lib/Conexion.php');
$conexion = new Conexion();
require_once('lib/funciones.php');
$operacion=new funciones();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Listado de evaluaciones</title>
</head>
<?php include_once("inc/estilos.php");
?>
<body>
<div class="container">
<h2>Lista de evaluaciones</h2>

<?php 

$consulta=mysqli_query($conexion,"select * from evaluaciones");        
  while($filas=mysqli_fetch_array($consulta))
  {    
   $jr_idev       =$filas['idevaluacion'];
   $jr_nom_evalua =$filas['nombre'];
   $jr_fecha      =$filas['fecha_aplicacion'];
   $jr_objetivo   =$filas['objetivo'];

?>
  <div class="row">
  <hr width="100%">
    <div class="col-lg-2 col-xs-2 col-sm-2"><?php echo "Id: <label class='btn btn-success btn-sm'>".$jr_idev."</label>";?></div>	
	<div class="col-lg-6 col-xs-6 col-sm-6"><?php echo " Nombre: ".$jr_nom_evalua; ?></div>
    <div class="col-lg-4 col-xs-4 col-sm-4"><a class="btn btn-primary btn-sm" href="agregar_estu_evaluacion.php?ideval=<?php echo $jr_idev; ?>" >adicionar estudiantes</a></div>
  </div>  
<?php 
  }
?>


</div>


</body>
</html>