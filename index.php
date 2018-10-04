
<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('/lib/Conexion.php');
$conexion = new Conexion();
require_once('lib/funciones.php');
$operacion=new funciones();

$txt_evaluacion=$_GET["ideval"];;
?>



<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sistema de Evaluación  
    </title>
        
        
</head>
<?php include_once("inc/estilos.php");
?>
<!--script type="text/javascript" language="javascript"></script-->

<body >

<!--div class="container">
  <div class="row" >
      <div class="progress " id="mins">
        <div class="progress-bar progress-bar-striped active" id="brjerv" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" >
          <span class="sr-only">45% Complete</span>
          Minutos: <span id="minutos"> 0 </span> Segundos: <span id="segundos"></span><span id="mensajes"></span>
        </div>
      </div>
  </div>
</div-->


<div class="container">
	<div class="row">
    <br/>
    <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input here..." disabled value="<?php  echo "RESULTADOS DE ".$_SESSION['primer_nom']." ".$_SESSION['primer_ape']; ?>">
    <p class="navbar-text"> <?php $ide_usuario = $_SESSION['numero_ide']; ?></p>
    </div>
</div>
<!--MENU-->
<div class="container">
	<ul class="nav nav-tabs">
      <li role="presentation" class="active"><a href="#">Inicio</a></li>      
      <li role="presentation"><a href="cerrar.php">Cerrar Sesión</a></li>
    </ul>
</div>
<br/>
<!-- nombre y objetivo de la evaluacion-->
<?php 

$consulta=mysqli_query($conexion,"select * from evaluaciones WHERE idevaluacion=$txt_evaluacion");        
  while($filas=mysqli_fetch_array($consulta))
  {    
   $jr_idev       =$filas['idevaluacion'];
   $jr_nom_evalua =$filas['nombre'];
   $jr_fecha      =$filas['fecha_aplicacion'];
   $jr_objetivo   =$filas['objetivo'];

  }

?>
<div class="container">
  <div class="jumbotron">
    <h1><?php echo $jr_nom_evalua;?></h1>
    <p><?php echo $jr_objetivo; ?></p>
    <p><a class="btn btn-primary btn-lg" href="#" role="button"><?php echo $jr_idev;?></a></p>
  </div>  
</div>

<!--div class="container">
<div class="row">
        <div class="col-sm-10">
          <h1>
            Pregunta 0 de cada nivel de Ingles
          </h1>
            Lorem texto Lorem texto Lorem texto Lorem texto Lorem texto Lorem texto 
        </div>
    </div>


    <div class="row">
        <div class="col-sm-10">
          <h1>
            Pregunta 0 de cada nivel Matemáticas
          </h1>
            Lorem texto Lorem texto Lorem texto Lorem texto Lorem texto Lorem texto 
        </div>
    </div>

    <div class="row">
        <div class="col-sm-10">
          <h1>
            Pregunta 0 de cada nivel de Biologia
          </h1>
            Lorem texto Lorem texto Lorem texto Lorem texto Lorem texto Lorem texto 
        </div>
    </div>

    <div class="row">
        <div class="col-sm-10">
          <h1>
            Pregunta 0 de cada nivel de Lectura critica
          </h1>
            Lorem texto Lorem texto Lorem texto Lorem texto Lorem texto Lorem texto 
        </div>
    </div>
 </div-->

<!--fin slider-->
<!-------------------------------------------->
<?php

  $consulta=mysqli_query($conexion,"select fk_idarea,fk_idnivel,numero_preguntas,random FROM detalles_evaluaciones WHERE fk_idevaluacion=$txt_evaluacion");        
  while($filas=mysqli_fetch_array($consulta))
  {
    
   $d_area=$filas['fk_idarea'];
   $d_nivel=$filas['fk_idnivel'];
   $d_preguntas=$filas['numero_preguntas'];
   $d_random=$filas['random'];
   if($d_random=='y')
   {
      $cad_ran=" order by rand() ";
   }
   else
   {
      $cad_ran='  ';
   }

   /*FUNCION QUE SIRVE PARA EVALUAR SI YA EXISTEN PREGUNTAS ANTES DE INSERTAR*/
  $sql="SELECT fk_idpregunta FROM respuestas_us WHERE fk_idevaluaciones=$txt_evaluacion and fk_idusuario='$ide_usuario' and finalizado=1;";
  //$sql="UPDATE evaluaciones SET estado = 1 WHERE idevaluacion = 6055;";
  
  $ooo=mysqli_query($conexion,$sql);
  $numero_reg=mysqli_num_rows($ooo);
  
       if($numero_reg!=0)
        {
          //echo"puede insertar preguntas";
        $sql="INSERT INTO respuestas_us(fk_idevaluaciones,fk_idpregunta, fk_idusuario, finalizado)
  SELECT $txt_evaluacion, p.idpregunta,$ide_usuario,2 FROM preguntas p INNER JOIN niveles n ON p.fk_idnivel= n.idnivel INNER JOIN areas a ON n.fk_idarea= a.idarea WHERE a.idarea iN (SELECT fk_idarea FROM detalles_evaluaciones WHERE fk_idevaluacion=$txt_evaluacion ) AND n.idnivel=$d_nivel ".$cad_ran." LIMIT $d_preguntas"; 
        $operacion->insertar_datos($conexion,$sql);
        }
        else 
        {
          echo"Solamente debe consultarlas";
        }
  }

  

  //------------------
  
  //--------------------
  ?>
<!-------------------------------------------->

    <div class="container">
    <form method="post" class="frm_preguntas" action="#">
		<?php 
		$contador=0;
		$consulta=mysqli_query($conexion,"SELECT 
                        p.idpregunta,
                        p.pregunta,
                        n.nivel,
                        n.color_clase,
                        a.area
                        FROM preguntas p 
                        INNER JOIN niveles n ON p.fk_idnivel= n.idnivel 
                        INNER JOIN areas a ON n.fk_idarea= a.idarea 
                        INNER JOIN  respuestas_us rus ON p.idpregunta= rus.fk_idpregunta                                                
                        WHERE a.idarea !=3 AND rus.fk_idevaluaciones=$txt_evaluacion                                             
                        
												");
    $numero_registros=mysqli_num_rows($consulta);
    ?>
    <script>
      numero_preguntas="<?php echo $numero_registros; ?>"
      carga(numero_preguntas);

    </script>
    <?php
    
		while($filas=mysqli_fetch_array($consulta)){
//		$numero_preguntas=$filas['np'];

		$contador=$contador+1;
		$id_pregunta=$filas['idpregunta'];
		$pregunta=$filas['pregunta'];
		$nivel=$filas['nivel'];
		$color_pregunta=$filas['color_clase'];
		$area=$filas['area'];
				
		?>
        
        <div class="row" >
        <div class="col-sm-10"></div>
            <div class="col-sm-2 text-right">
                      <button class="btn btn-primary" type="button"><h2></h2> Área <span class="badge"><?php echo $area?></span>
                      </button>
            </div>
        </div> 
        
		<div class="panel panel-primary" id="panelpregunta<?php echo $contador; ?>" >
        
        <div class="panel-heading">Pregunta número <?php echo $contador; ?></div>
         <div class="panel-body">

        <?php
        	$operacion->con_rec_preguntas($id_pregunta,$conexion);
			echo("</br><strong><em>".$pregunta."</em></strong></br></br>");
		
	        $operacion->con_opc_respuesta($id_pregunta, $conexion,$contador);
		?>
		 
         
       

		</div>
        
         </div>
         <?php 
		 
		}
		 ?>

                
        
	</div> 
    <div class="container">
    <input type="button"  class="btn btn-primary btn-lg btn-block " value="Enviar Respuestas y finalizar exámen" onclick="validar_preguntas_con_respuesta('<?php echo  $numero_registros; ?>','<?php echo $txt_evaluacion; ?>')"  />
    </div>
</form> 


<script type="text/javascript" language="javascript">	


</script> 


    
<!-- Modal Mostrar los mensajes-->
<div class="modal fade" id="mensajes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Mensaje</h4>
      </div>
      <div class="modal-body">
        ... ... 
      </div>
      <div class="modal-footer">
      <div class="col-sm-5">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
       <div class="col-sm-5">
        <div id="adicionar_acciones">

        </div>
        </div>

      </div>
    </div>
  </div>
</div>    
</body>
</html>