<?php
 class funciones
 {
	 function tildes($cadena)		
	{	$a_tofind = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'à', 'á', 'â', 'ã', 'ä', 'å',
		'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø',
		'È', 'É', 'Ê', 'Ë', 'è', 'é', 'ê', 'ë', 'Ç', 'ç',
		'Ì', 'Í', 'Î', 'Ï', 'ì', 'í', 'î', 'ï',
		'Ù', 'Ú', 'Û', 'Ü', 'ù', 'ú', 'û', 'ü', 'ÿ', 'Ñ', 'ñ',' ','´',"'",">","<");
	
		$a_replac = array('A', 'A', 'A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a', 'a' ,
		 'O', 'O', 'O', 'O', 'O', 'O', 'o', 'o', 'o', 'o', 'o', 'o'   ,
		 'E', 'E', 'E', 'E', 'e', 'e', 'e', 'e', 'C', 'c' ,
		 'I', 'I', 'I', 'I', 'i', 'i', 'i', 'i',
		 'U', 'U', 'U', 'U', 'u', 'u', 'u', 'u', 'y', 'N', 'n','_','-','','','');
	
		$nombreImagen = str_replace($a_tofind, $a_replac, $cadena);
		return $nombreImagen;//		me retorna la cadena sin caracteres especiales
	}
	//si la cadena es menor a una longitud retorna verdadero
	function longitud($cadena, $limite)
	{
		if(strlen($cadena)<$limite)
			$x=true;
		else
			$x=false;
		
	return $x;
	}
	
	function con_opc_respuesta($id_pregunta,$conexion,$contador)
	{
	$consulta=mysqli_query($conexion,"SELECT					
										o.idopcion,
										o.opcion,RAND()
										FROM opciones o
										where fk_idpregunta =$id_pregunta
										order by rand();
						");

		while($filas=mysqli_fetch_array($consulta)){
//						var_dump($filas);
		$id_opcion=$filas['idopcion'];
		$opcion_respuesta=$filas['opcion'];
		?>
        <li class="list-group-item ">
		<label>
        	    <input type="radio"  name="pregunta<?php echo $contador; ?>"  value="<?php echo $id_pregunta; ?>--<?php echo $id_opcion ?>"  onClick="pintar(<?php echo $contador; ?>)">
        	   <?php echo $opcion_respuesta ?>
        </label>
        </li>
		<?php		
		}
	
	}
	function con_rec_preguntas($id_pregunta,$conexion)	
	{
		$consulta=mysqli_query($conexion,"SELECT 
												rhp.mostrar,
												r.recurso,
												r.ubicacioncss,
												tir.tipo_recurs																											
											FROM preguntas p 												
											INNER JOIN recursos_has_preguntas rhp ON p.idpregunta=rhp.preguntas_idpregunta
											INNER JOIN recursos r ON rhp.recursos_idrecurso=r.idrecurso
											INNER JOIN tipo_recursos tir ON r.fk_idtipo_recursos=tir.idtipo_recursos
											WHERE p.idpregunta=$id_pregunta;
											
						");
			while($filas=mysqli_fetch_array($consulta))
		{
			$visible=$filas['mostrar'];
			$recurso=$filas['recurso'];
			$ubicacioncss=$filas['ubicacioncss'];
			$tipo_recurso=$filas['tipo_recurs'];
			
			if($tipo_recurso=='imagen')
			{ 	?>
				  <img class="center-block img-responsive" src="img/preguntas/<?php echo $recurso ?>" alt="..." class="img-thumbnail">		
	        	<?php 
			}
			else if ($visible=='s') 
			{
				echo $recurso;
			}				
		}
		
	}

	function insertar_datos( $conexion,$sql)
	{
		$consulta=mysqli_query($conexion,$sql);
	}


 }
?>