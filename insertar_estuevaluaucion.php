<?php
    require_once('/lib/Conexion.php');
	$conexion = new Conexion();
	require_once('lib/funciones.php');
	$operacion=new funciones();

	//echo $tipo=	$_POST['txtced'];


		$cedulas=$_POST["txtced"];
		$id_evaluacion=$_POST["txtiEva"];
		$cedulas=implode(",",$cedulas);
		$lista = explode(',', $cedulas);
		//require_once('Conexion.php');
		//$conexion = new Conexion();

		foreach($lista as $k => $v)
		{
			$lista2 = explode('--',$v);
		$ids=$array1=$lista2[0];
		$id_evaluacion;
		//	$respuestas=$array2=$lista2[1];
		/*	var_dump($ids);
			var_dump($respuestas);*/
			
			$sql="INSERT INTO respuestas_us (fk_idevaluaciones,fk_idusuario,finalizado) VALUES ($id_evaluacion, $ids,1);";				
		//	$sql="UPDATE respuestas_us SET respuestas_usuario=$respuestas WHERE fk_idevaluaciones=8090 AND fk_idpregunta=$ids AND fk_idusuario=$ide";
 		    $consulta=mysqli_query($conexion,$sql);			
		}
		  	if($consulta)echo"Operación realizada con éxito ";else echo "No se pudo adicionar los estudiantes a la evaluación";	

	
	/*
	$sql="INSERT INTO usuario
(
tipoidentificacion,
numero_ide,
primer_nombre,
primer_apellido,
correo,
telefono,
direccion,
fecha_nac,
fk_idtipo_usuario)
VALUES
(
'$tipo',
'$iden',
'$pnom',
'$pape',
'$corr',
'$tele',
'$dire',
'$fnac',
$tusu
);
";
	$operacion=$operacion->insertar_datos($conexion,$sql);	
	if($operacion=="")
	{echo"Estudiante registrado ";}
	else
	{echo"Datos no insertados";}

	
*/
?>