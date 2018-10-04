
<?php
require_once('/lib/Conexion.php');
$conexion = new Conexion();
require_once('lib/funciones.php');
$operacion=new funciones();


/*if (!isset($_SESSION)) {
  session_start();
}*/
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

<body>
<div class="container text-center">

	<div class="row">
    <ul class="list-group">
		  <li class="list-group-item">
    		<div class="alert alert-success" role="alert"><h3> Registro de estudiantes</h3></div>
		  </li>
    </div>
    <div class="row">
     	<form class="ce" method="post" action="insertar_usuario.php">

        <div class="input-group input-group-lg  col-lg-12">
          <span class="input-group-addon" id="sizing-addon1">Tipo Identificación</span>
          <input type="text" class="form-control" name="txt_tide" placeholder="CC-TI-RC" aria-describedby="sizing-addon1">
        </div>        
		        <br>
        <div class="input-group input-group-lg  col-lg-12">
          <span class="input-group-addon" id="sizing-addon1">Número Identificación</span>
          <input type="text" class="form-control" name="txt_nide" placeholder="1088987654" aria-describedby="sizing-addon1">
        </div>
                <br>
        <div class="input-group input-group-lg  col-lg-12">
          <span class="input-group-addon" id="sizing-addon1">Primer Nombre</span>
          <input type="text" class="form-control" name="txt_pnom" placeholder="Julian" aria-describedby="sizing-addon1">
        </div>
           
                <br>
        <div class="input-group input-group-lg  col-lg-12">
          <span class="input-group-addon" id="sizing-addon1">Primer Apellido</span>
          <input type="text" class="form-control" name="txt_pape" placeholder="Rodriguez" aria-describedby="sizing-addon1">
        </div>            
        
                <br>
        <div class="input-group input-group-lg  col-lg-12">
          <span class="input-group-addon" id="sizing-addon1">Correo</span>
          <input type="email" class="form-control" name="txt_corr" placeholder="julianrodri11@gmail.com" aria-describedby="sizing-addon1">
        </div>
        
        
                <br>
        <div class="input-group input-group-lg  col-lg-12">
          <span class="input-group-addon" id="sizing-addon1">Teléfono ó Celular</span>
          <input type="tel" class="form-control" name="txt_tele" placeholder="3127080006" aria-describedby="sizing-addon1">
        </div>
        
                <br>
        <div class="input-group input-group-lg  col-lg-12">
          <span class="input-group-addon" id="sizing-addon1">Dirección</span>
          <input type="text" class="form-control" name="txt_dire" placeholder="Calle 20 No 00-0" aria-describedby="sizing-addon1">
        </div>        
        
 				<br>
        <div class="input-group input-group-lg  col-lg-12">
          <span class="input-group-addon" id="sizing-addon1">Fecha de Nacimiento</span>
          <input type="text" class="form-control" name="txt_fnac" placeholder="27121989" aria-describedby="sizing-addon1">
        </div> 

        		<br>
        <div class="input-group input-group-lg  col-lg-12">          
          <input style="display:none;" type="text" class="form-control" name="txt_tusu" placeholder="Username" value="3" aria-describedby="sizing-addon1"  >
        </div> 

        <p><button type="submit" class="btn btn-primary">Registrar Estudiante</button></p>
        </form>
    </div>
    
</div>
</body>
</html>