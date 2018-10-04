<?php 
require_once('/lib/Conexion.php');
$conexion = new Conexion();
require_once('lib/funciones.php');
$operacion=new funciones();
$codigo_eva=$_POST['codigo_eva'];
$nombre_eva=$_POST['nombre_eva'];
$objetivo=$_POST['objetivo'];

	 $sql="INSERT INTO evaluaciones (idevaluacion,nombre,objetivo,usuario_idusuario) VALUES ($codigo_eva,'$nombre_eva', '$objetivo',1);";		
	 $consulta=mysqli_query($conexion,$sql) or die(mysqli_error());
	 if($consulta)
	 {echo"LA EVALUACION A SIDO CREADA CON EXITO<br>";
		foreach($_POST["area"] as $jr => $error)
		{if($error)
			{ 		
				$area=$_POST["area"][$jr];
				$nivel=$_POST["nivel"][$jr];
				$cantidad=$_POST["cant_preg"][$jr];
				$random=$_POST["random"][$jr];				
	
				$sql="INSERT INTO detalles_evaluaciones values('',$codigo_eva,$area,$nivel,$cantidad,'$random')";		
				$consulta=mysqli_query($conexion,$sql) or die(mysqli_error());			
				  
			}
		}
		if($consulta)echo"LAS PREGUNTAS HAN SIDO ADICIONADAS AL LA EVALUACION $nombre_eva <br>";else echo "No insertados";
		
	 }else{ echo "PROBLEMAS AL CREAR LA EVALUACION<BR>";}

	
?>