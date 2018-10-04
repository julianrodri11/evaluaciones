<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Agregar estudiantes a evaluación</title>
</head>
<?php include_once("inc/estilos.php");
?>
<body>
<?php
if (!isset($_SESSION)) {
  session_start();
}

	require_once('/lib/Conexion.php');
	$conexion = new Conexion();
	require_once('lib/funciones.php');
	$operacion=new funciones();

	
	if(empty($_GET["ideval"]) or !isset($_GET["ideval"]))
	{
	echo "Debe ingresar un dato numerico";//$evaluacion=$_GET["ideval"];

	}else
	{
	echo $ide_evaluacion=$_GET["ideval"];
    $consulta=mysqli_query($conexion,"select * from usuario");
    ?>
    <div class="container">
	<div class="table-responsive">
	<table class="table table-striped">    
	<?php    
	while($filas=mysqli_fetch_array($consulta))
	{	echo"<tr onClick=adicionar_aevaluacion('".$filas['numero_ide']."') ><td></td>";
		echo "<td>".$cedula=$filas['numero_ide']."</td>    ";
		echo "<td>".$cedula=$filas['primer_nombre']."</td>    ";
		echo "<td>".$cedula=$filas['primer_apellido']."</td>    ";		
		echo "<td>".$cedula=$filas['correo']."</td>  </tr>";	
	}
	?>
    </tr>
    </table>
    </div>    
    </div>

    <div class="container">
    <div class="container-fluid">
    <div class="row">
    <form method="post" action="insertar_estuevaluaucion.php">
    <input type="hidden" name="txtiEva" value="<?php echo $ide_evaluacion; ?>">
    <div class="row" id="contenedor_usuarios"> 
    </div>
    <button type="submit" class="btn btn-primary btn-lg btn-block">Adicionar estudiantes a la evaluación</button>
    </form>	

    </div>
    </div>
    </div>
    
    </div>

    
<?php 	} ?>
</body>
</html>