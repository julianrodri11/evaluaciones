
		//Funcion que sirve para cuando el usuario seleccione alguna pregunta el panel cambie a estado satisfactorio
	function pintar(x)
	{	
		$(document).ready(function(e) {			
//			$("input[name='pregunta"+x+"']").removeClass("panel-danger panel-info panel-warning alert-danger").addClass("panel-success alert-success");
			$("input[class='pregunta"+x+"']").removeClass().addClass("panel-success alert-success");
//            $("#panelpregunta"+x).removeClass("panel-danger panel-info panel-warning alert-danger").addClass("panel-success alert-success");
            $("#panelpregunta"+x).removeClass().addClass("panel-success alert-success");
        });		
		
	
	}


	/*funcion que sirve para el reloj*/

	 //setInterval
    var cronometro;
    function detenerse()
    {
      clearInterval(cronometro);
    }

    function carga(numero_preguntas)
    {	
    	tm=numero_preguntas*3;


        contador_s =0;
        contador_m =0;
        s = document.getElementById("segundos");
        m = document.getElementById("minutos");
        mensajes=document.getElementById("mensajes");
        barra=document.getElementById("brjerv");

        cronometro = setInterval(
            function(){
                if(contador_s==60)
                {
                    contador_s=0;
                    contador_m++;
                    m.innerHTML = contador_m;

                    if(contador_m==60)
                    {
                        contador_m=0;
                    }
                }

                	x=((contador_m*100)/tm);
                	if(x==50)
                    {
                        mensajes.innerHTML="Queda la mitad del tiempo para responder la evaluación";
                    }
                	barra.style.width=x+"%";

                s.innerHTML = contador_s;

                contador_s++;


            }
            ,1000);

    } //fin carga

	
	
	$(document).ready(function()
{	




	/*funcion que sirve para verificar si todas las preguntas al menos tiene seleccionado una opcion de respuesta */	
	//inicia registrar	
    $("#registrar").click(
		
		function()
		{	var pre_sin_resp=[];	//array para guardar preguntas que no se respondieron
			var pre_con_resp=[];
	        for(var vradio=1; vradio<26 ;vradio++)
			{	//ciclo que recorre todas las preguntas
				if($("input[name='pregunta"+vradio+"']:checked").length=="")
				//if($("input[class='val_p"+vradio+"']:checked").length=="")
				{				//	alert(vradio)
					pre_sin_resp[pre_sin_resp.length] = "<br/>Pregunta No  "+vradio;
					//alert(pre_sin_resp);
					$("#panelpregunta"+vradio).addClass("panel-danger alert-danger");

				}				
				
			}//return pre_sin_resp;
			if(pre_sin_resp.length!='')
			{	$('#mensajes').modal('toggle');
				$('.modal-body').addClass('alert alert-danger');
				$('.modal-body').empty().append("Las siguientes presuntas estan sin responder "+pre_sin_resp);

			}
			else
			{	//si ninguna quedo sin ser respondida entonces se envia al server
	
//				$('.modal-body').removeClass('alert alert-danger').addClass('alert alert-success');			

				//recorro todas las preguntas para ver que marco el usuario
				$("input[type=radio]:checked").each(function() 
				{
				//adiciono las respuestas a un array para ser enviadas al backend
				pre_con_resp[pre_con_resp.length] = $(this).val();				
				});
				$('#adicionar_acciones').html("<button type=button class='btn btn-primary' id='guardar'>Guardar cambios</button>");			
				$('.modal-body').empty().html("Usted ya seleccionó una respuesta a todas las preguntas\nestá seguro de enviarlas y finalizar evaluación");				
				$('#mensajes').modal('toggle');
				$('.modal-body').removeClass().addClass('alert alert-success');	
				
				$("#adicionar_acciones").click(function()
				{	/*inicia post*/					
					$.post("lib/insertar_evaluacion.php",
					{	arrCesta:pre_con_resp,
						beforeSend: function(){$(".modal-body").html("Procesando...<br><img width=50 src='imagenes/cargar2.gif'/>");},
					},function(data,status)
					  {	
					  	alert(data);
					  }									
					);/*fin post*/
				
			   	});

		
				
				
			}



    	}
	);	
	//fin registrar
	
	
	
//cierra el document
});