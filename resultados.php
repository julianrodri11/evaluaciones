
<?php

if (!isset($_SESSION)) {
  session_start();
}

require_once('/lib/Conexion.php');
$conexion = new Conexion();
require_once('lib/funciones.php');
$operacion=new funciones();

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Consulta de Resultados 
    </title>
        
        
</head>
<?php include_once("inc/estilos.php"); ?>
<body>
<div class="container">
	<div class="row">
    <br/>
    <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input here..." disabled value="<?php  echo "RESULTADOS DE ".$_SESSION['primer_nom']." ".$_SESSION['primer_ape']; ?>">    
    </div>
</div>
<?php $num_ide=$_SESSION['numero_ide']; ?>
<div class="container">

	<div class="row">
    <?php
    $txt_evaluacion=$_GET["ideval"];
	$total_ponderado=0;
	$consulta=mysqli_query($conexion,"SELECT

									a.area,
                                    COUNT(p.fk_idnivel) correctas,                                    
									p.fk_idnivel,
									n.valor peso,
									n.nivel,
									(COUNT(p.fk_idnivel)*n.valor) total
									FROM respuestas_us ru
									INNER JOIN preguntas p ON ru.fk_idpregunta= p.idpregunta
									INNER JOIN opciones o ON (RU.fk_idpregunta=o.fk_idpregunta AND ru.respuestas_usuario=o.idopcion)
									INNER JOIN niveles n ON p.fk_idnivel= n.idnivel
                                    INNER JOIN areas a ON n.fk_idarea= a.idarea
									WHERE ru.fk_idusuario = $num_ide
									AND ru.fk_idevaluaciones = $txt_evaluacion
									AND o.correcta IN ('si')
									GROUP BY P.fk_idnivel");
?>
<br>
<table  class="table">
<thead ><tr class="warning"><td>Área</td><td>Nivel</td><td>Respuestas Correctas</td><td>Valor c/u por nivel</td><td>Correctas* valor</td> </tr> </thead>
<?php
		while($filas=mysqli_fetch_array($consulta))
		{
		  echo"<tr><td class='warning'>".$filas['area']."</td>";
		  echo"<td class='active'>".$filas['nivel']."</td>";
		  echo"<td class='success'>".$correctas=$filas['correctas']."</td>";
		  echo"<td class='danger'>".$pregunta=$filas['peso']."</td>";
		  echo"<td class='info'>".$total=$filas['total']."</td></tr>";
		  $pc=$total_ponderado+=$total;
		  //echo"<br>".

		}
		echo"Total puntaje de respuestas correctas<h1>".$pc;
	?>

</table>
    </div>
 </div>
 <hr width="100%">
 
 
 <div class="container">

	<div class="row">
    <?php
	$total_ponderado=0;
	$consulta=mysqli_query($conexion,"SELECT

									a.area,
                                    COUNT(p.fk_idnivel) correctas,                                    
									p.fk_idnivel,
									n.valor peso,
									n.nivel,
									(COUNT(p.fk_idnivel)*n.valor) total
									FROM respuestas_us ru
									INNER JOIN preguntas p ON ru.fk_idpregunta= p.idpregunta
									INNER JOIN opciones o ON (RU.fk_idpregunta=o.fk_idpregunta AND ru.respuestas_usuario=o.idopcion)
									INNER JOIN niveles n ON p.fk_idnivel= n.idnivel
                                    INNER JOIN areas a ON n.fk_idarea= a.idarea
									WHERE ru.fk_idusuario = $num_ide
									AND ru.fk_idevaluaciones = $txt_evaluacion
									AND o.correcta IN ('no')
									GROUP BY P.fk_idnivel");
?>
<br>
<table  class="table">
<thead ><tr class="warning"><td>Área</td><td>Nivel</td><td>Respuestas incorrectas</td><td>Valor c/u por nivel</td><td>Incorrectas* valor</td> </tr> </thead>
<?php
		while($filas=mysqli_fetch_array($consulta))
		{
		  echo"<tr><td class='warning'>".$filas['area']."</td>";
		  echo"<td class='active'>".$filas['nivel']."</td>";
		  echo"<td class='success'>".$correctas=$filas['correctas']."</td>";
		  echo"<td class='danger'>".$pregunta=$filas['peso']."</td>";
		  echo"<td class='info'>".$total=$filas['total']."</td></tr>";
		  $pi=$total_ponderado+=$total;
		  //echo"<br>".

		}
		echo"Total puntaje suma de respuestas INCORRECTAS<h1>".$pi;
	?>

</table>
    </div>
 </div>
 <div class="container">
   <div class="row">
   <?php 
		echo "<br>Puntaje Máximo posible a obtener <h1 class='label-info'>".$puntaje_maximo= $pc+$pi."</h1>";
		echo "<br> Puntaje de respuestas correctas <h1 class='label-success'>".$pc."</h1>";
		echo "<br> Puntaje de respuestas Incorrectas <h1 class='label-danger'>".$pi."</h1>";

        $x=round((($pc*100)/$puntaje_maximo),2);
		echo"<h2>Su resultado equivale al  $x % de un máximo de 100% posible</h2>";
		if ($x>0 && $x<=50) {
			$color_barra="danger";
			$cursos_de_nivelacion=" A, B, C ";
		}elseif ($x>50 && $x<85) {
			$color_barra="warning";
			$cursos_de_nivelacion=" I, J, K";
		} elseif ($x>=85 && $x<=100) {
			$color_barra="success";
			$cursos_de_nivelacion=" X, Y, Z , Excelente";
		}
   ?>
   </div>
 </div>
 <br>
 <div class="container">
 	<div class="row">
 		<div class="progress">
		  <div class="progress-bar progress-bar-<?php echo $color_barra; ?>" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $x.'%' ?>">
		    
		    <?php echo $x.'%' ?>
		  </div>
		</div>
 	</div>
 	<div class="row">
 		<h2>Usted debe realizar los siguientes cursos de nivelación : <span class="label label-default"><?php echo $cursos_de_nivelacion;?></span></h2>
 	</div>
 </div>
 <br><br>
 </body>
 </html>