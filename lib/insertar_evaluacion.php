<?php
session_start();
 //Validar si se está ingresando con sesión correctamente
if (!$_SESSION){echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "../login.php"
</script>';
}else{	$ide=$_SESSION['numero_ide'] ;
/*if( $tipo=="Administrador" || $tipo=="Docente" )
{*/
	
		$arr_preg_resp=$_POST["arrCesta"];
		$jstxt_eval=$_POST["jsevalua"];
		$arr_preg_resp=implode(",",$arr_preg_resp);
		$lista = explode(',', $arr_preg_resp);
		require_once('Conexion.php');
		$conexion = new Conexion();

		foreach($lista as $k => $v)
		{
			$lista2 = explode('--',$v);
			$preguntas=$array1=$lista2[0];
			$respuestas=$array2=$lista2[1];
		/*	var_dump($preguntas);
			var_dump($respuestas);*/
			
			//$sql="INSERT INTO respuestas_us (idcalificacion, respuestas_usuario, fk_idevaluaciones, fk_idpregunta, fk_idusuario) VALUES (NULL, $respuestas, 1111, $preguntas, $ide);";				
			$sql="UPDATE respuestas_us SET respuestas_usuario=$respuestas WHERE fk_idevaluaciones=$jstxt_eval AND fk_idpregunta=$preguntas AND fk_idusuario=$ide";
 		    $consulta=mysqli_query($conexion,$sql);			
		}
		  	if($consulta)echo"Examen guardado con éxito ";else echo "No se pudo registrar la prueba en el sistema";	


		  	/*proceso que sirve para insertar los resultados de la evaluacion por cada nivel*/
		  	$sql="INSERT INTO notas
				(
				area,
				correctas,
				nivel,
				peso,
				nombrenivel,
				total,
				usuario,
				evaluacion
				)
				SELECT
					a.area,
					COUNT(p.fk_idnivel) correctas,                                    
					p.fk_idnivel,
					n.valor peso,
					n.nivel,
					(COUNT(p.fk_idnivel)*n.valor) total,
				    $ide,
				    $jstxt_eval    
					FROM respuestas_us ru
					INNER JOIN preguntas p ON ru.fk_idpregunta= p.idpregunta
					INNER JOIN opciones o ON (RU.fk_idpregunta=o.fk_idpregunta AND ru.respuestas_usuario=o.idopcion)
					INNER JOIN niveles n ON p.fk_idnivel= n.idnivel
					INNER JOIN areas a ON n.fk_idarea= a.idarea
					WHERE ru.fk_idusuario = $ide
					AND ru.fk_idevaluaciones = $jstxt_eval
					AND o.correcta IN ('si')
					GROUP BY P.fk_idnivel";
 		    $consulta=mysqli_query($conexion,$sql);			
 		    if($consulta)echo"datos ok ";else echo "error, No se pudo registrar la prueba en el sistema";	


/*}else{
	echo "<center>No tienes privilegios para hacer esto ";
	echo '<br><a href="login.php">Iniciar session</a>';
}*/

}

?>