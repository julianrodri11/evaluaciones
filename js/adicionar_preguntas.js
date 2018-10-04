// JavaScript Document
$(document).ready(function() 
{
	$('#add_more').click(function(){
		//var current_count = $('input:file').length;
//		var next_count=current_count + 1;
//		$('#file_upload').prepend('<p><input type="file" name="file_' + next_count + '" /></p>');	
		$('#detalle_evaluacion').append('<br/><div class="col-xs-4"><select name="area[]" class="form-control"><option value="1">Matemáticas</option><option value="2">Biologia</option><option value="3">Inglés</option><option value="4">Lectura critica</option><option value="5">Física</option><option value="6">Química</option></select></div><div class="col-xs-4"><select name="nivel[]" class="form-control"><option value="1">1-Uno</option><option value="2">2-Dos</option><option value="3">3-Tres</option><option value="4">Nivel uno de biologia</option><option value="5">Nivel dos de biología</option><option value="6">Nivel tres de biología</option><option value="7">Nivel uno de lectura critica</option><option value="8">Nivel dos de lectura critica</option><option value="9">Nivel tres de lectura critica</option><option value="10">Nivel uno de ingles</option><option value="11">Nivel dos de ingles</option><option value="12">Nivel tres de ingles</option><option value="13">Nivel uno de física</option><option value="14">Nivel dos de física</option><option value="15">Nivel tres de física</option><option value="16">Nivel uno de Química</option><option value="17">Nivel dos de Química</option><option value="18">Nivel tres de Química</option></select></div><div class="col-xs-4"><input type="number" min="1" name="cant_preg[]" class="form-control" placeholder="?" aria-describedby="sizing-addon2"><input type="text" style="display:none;" name="random[]" value="y"></div><br/>');
		/*$('#area').prepend('aaa');
		$('#nivel').prepend('bbb');
		$('#cantidad_preguntas').prepend('ccc');*/
		}); 
	
	//adicionar preguntas con contextos
	$('#add_context').click(function(){	
		$('#detalle_contextos').append('<br/><div class="col-xs-4"><select name="area[]" class="form-control"><option value="1">Matemáticas</option><option value="2">Biologia</option><option value="3">Inglés</option><option value="4">Lectura critica</option><option value="5">Física</option><option value="6">Química</option></select></div><div class="col-xs-4"><select name="nivel[]" class="form-control"><option value="1">1-Uno</option><option value="2">2-Dos</option><option value="3">3-Tres</option><option value="4">Nivel uno de biologia</option><option value="5">Nivel dos de biología</option><option value="6">Nivel tres de biología</option><option value="7">Nivel uno de lectura critica</option><option value="8">Nivel dos de lectura critica</option><option value="9">Nivel tres de lectura critica</option><option value="10">Nivel uno de ingles</option><option value="11">Nivel dos de ingles</option><option value="12">Nivel tres de ingles</option><option value="13">Nivel uno de física</option><option value="14">Nivel dos de física</option><option value="15">Nivel tres de física</option><option value="16">Nivel uno de Química</option><option value="17">Nivel dos de Química</option><option value="18">Nivel tres de Química</option></select></div><div class="col-xs-4"><input type="number" min="1" name="cant_preg[]" class="form-control" placeholder="?" aria-describedby="sizing-addon2"><input type="text" style="display:none;" name="random[]" value="n"></div><br/>');		
		}); 

	$('#eli_more').click(function(){		   
		$('#detalle_evaluacion').remove();
		});





});//fin funcionjquery
//FUNCION USADA DESDE EL ARCHIVO CREAR_EVALUACIONES.PHP
function registrar_preguntas(){
		var formData=new FormData($("#frm_evaluaciones")[0]);
		var ruta="./insertar_evaluacion.php";
		$.ajax({
			url:  ruta,
			type: "POST",
			data: formData,
			contentType:false,
			processData:false,
			success: function(datos)
			{
				alert(datos);
			//$("#respuesta").html(datos);
			}
		});		
	}
	