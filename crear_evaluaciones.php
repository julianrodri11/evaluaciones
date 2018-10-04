<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Crear Evaluaciones </title>
</head>
<?php include_once("inc/estilos.php");?>
<body><br>
<div class="container">
<form id="frm_evaluaciones" enctype="multipart/form-data">
<!--creamos el titulo-->
<div class="row">
	 <button type="button" class="btn btn-success btn-lg btn-block">Gestion de Evaluaciones
	 <span class="glyphicon glyphicon-use" aria-hidden="true"></span>
	 </button>
</div>
<br/>

<!-- creamos las filas para los datos personales-->
<div class="row">
  <div class="col-xs-4">   
	<div class="input-group">
	  <span class="input-group-addon" id="basic-addon1">Usuario</span>
	  <input type="text" class="form-control" placeholder="Julian Rodriguez" readonly aria-describedby="basic-addon1">
	</div>

  </div>
  <div class="col-xs-4">
    <input class="form-control" type="text" placeholder="Readonly input here…" readonly>
  </div>
  <div class="col-xs-4">
   	<div class="input-group">
	   <input type="text" class="form-control" placeholder="Julian Rodriguez" readonly aria-describedby="basic-addon1">
	  <span class="input-group-addon" id="basic-addon1">Cerrar Sesión</span>
	</div>
  </div>
</div>
<br/>
<!--Primer paso-->
<div class="row">
<div class="alert alert-success" role="alert">
  En esta sección aprenderas a crear una evalación con parametros personalizados, para ello se debe hacer lo siguiente:
</div>
</div>
<br/>
<div class="row">
	<span class="label label-info">Primer Paso</span>
	<label for="basic-url">Especificar codigo y el nombre de la evaluación en la siguiente casilla</label>
</div>
<br/>
<div class="row">

    <div class="col-xs-5 ">
    	<div class="input-group input-group-lg">
	  <span class="input-group-addon" id="sizing-addon1">Código Evaluación</span>
      <input type="number" name="codigo_eva" class="form-control" placeholder="1100" aria-describedby="sizing-addon1">
    </div>
    </div>
    <div class="col-xs-7 ">
    <div class="input-group input-group-lg">
      <span class="input-group-addon" id="sizing-addon1">Nombre Evaluación</span>	  
      <input type="text" name="nombre_eva" class="form-control" placeholder="Evaluación de desempeño" aria-describedby="sizing-addon1">
    </div>
	</div>
</div>
<br/>
<div class="row">
	<span class="label label-warning">Segundo Paso</span>
	<label for="basic-url">Se debe describir el OBJETIVO de la evaluación, está aparecerá en el encabezado cuando los estudiantes comiencen a responder las preguntas</label>
</div>
<br/>
<div class="row">
	<textarea name="objetivo" class="form-control" rows="3">
	</textarea>
</div>
<br/>
<!--div class="row"><button type="button" class="btn btn-primary btn-lg btn-block">Crear evaluación</button></div-->
<br>
<div class="row">
	<span class="label label-danger">Tercer Paso</span>
	<label for="basic-url">Una vez creado la evaluación, se debe agregar las áreas, niveles y el número de preguntas que el estudiante deberá responder</label>
</div>
<div class="row">
<label for="basic-url">Nota: El sistema es capaz de coger al azar del banco de preguntas cuales debera responder el estudiante, todos los estudiantes tendran preguntas y opciones de respuesta en diferente orden</label>
</div>
<br/>
<div class="col-xs-12">
	<!--button type="button" class="btn btn-default navbar-btn">Sign in</button-->
	 
	<nav>
	  <ul class="pager">
		   <button type="button" id="add_more" class="btn btn-default">Adicionar Preguntas + </button>
	  </ul>
	</nav>
</div>
<div class="col-xs-4"><label for="basic-url">Seleccione Área</label></div>
<div class="col-xs-4"><label for="basic-url">Seleccione Nivel</label></div>
<div class="col-xs-4"><label for="basic-url">Digite el numero de preguntas</label></div>
<br/>
<div class="container" id="detalle_evaluacion">

</div>

<div class="col-xs-12">
	<!--button type="button" class="btn btn-default navbar-btn">Sign in</button-->
	 
	<nav>
	  <ul class="pager">
		   <button type="button" id="add_context" class="btn btn-default">Adicionar Preguntas con contexto + </button>
	  </ul>
	</nav>
</div>
</br>
<div class="container" id="detalle_contextos">
	
</div>

<br/>
<div class="container">
    <input type="button" onclick="registrar_preguntas()" id="registrar" class="btn btn-primary btn-lg btn-block " value="Registrar Preguntas"/>
</div>
<br/>

</form>
<div class="container">
	<div class="row" id="respuesta">
		.... .......................
	</div>
</div>
</div>
</body>
</html>