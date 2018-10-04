<?php
require_once('/lib/Conexion.php');
$conexion = new Conexion();
require_once('lib/funciones.php');
$operacion=new funciones();
if (!isset($_SESSION)) {
  session_start();
}

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
<div class="row">
  <h2>Responder revaluación </h2>
</div>
<?php 
$ide_usuario = $_SESSION['numero_ide']; 



 $sql="SELECT ru.fk_idevaluaciones,e.nombre FROM respuestas_us ru inner join evaluaciones e on ru.fk_idevaluaciones=e.idevaluacion where fk_idusuario=$ide_usuario and finalizado='1';";
 $consulta=mysqli_query($conexion,$sql);        
  while($filas=mysqli_fetch_array($consulta))
  {    
   $jr_idev       =$filas['fk_idevaluaciones'];
   $jr_nom_evalua =$filas['nombre'];
  ?>

  <div class="row">
    <div class="col-lg-2 col-xs-2 col-sm-2"><?php echo "Id: <label class='btn btn-success btn-sm'>".$jr_idev."</label>";?></div>	
	<div class="col-lg-8 col-xs-6 col-sm-6"><?php echo " Nombre: ".$jr_nom_evalua; ?></div>
    <div class="col-lg-2 col-xs-4 col-sm-4"><a class="btn btn-primary btn-sm" href="index.php?ideval=<?php echo $jr_idev; ?>" >Responder evaluación</a></div>
  </div>  
<?php 
  }
?>

</div>
<hr width="80%">







<div class="container">
<div class="row">
  <h2>Consultar resultados de evaluación </h2>
</div>
<?php 
$ide_usuario = $_SESSION['numero_ide']; 



 $sql="SELECT ru.fk_idevaluaciones,e.nombre FROM respuestas_us ru inner join evaluaciones e on ru.fk_idevaluaciones=e.idevaluacion where fk_idusuario=$ide_usuario and finalizado='1';";
 $consulta=mysqli_query($conexion,$sql);        
  while($filas=mysqli_fetch_array($consulta))
  {    
   $jr_idev       =$filas['fk_idevaluaciones'];
   $jr_nom_evalua =$filas['nombre'];
  ?>

  <div class="row">
    <div class="col-lg-2 col-xs-2 col-sm-2"><?php echo "Id: <label class='btn btn-success btn-sm'>".$jr_idev."</label>";?></div>  
  <div class="col-lg-8 col-xs-6 col-sm-6"><?php echo " Nombre: ".$jr_nom_evalua; ?></div>
    <div class="col-lg-2 col-xs-4 col-sm-4"><a class="btn btn-primary btn-sm" href="resultados.php?ideval=<?php echo $jr_idev; ?>" >Conusltar resultados</a></div>
  </div>  
<?php 
  }
?>


</div>



</body>
</html>