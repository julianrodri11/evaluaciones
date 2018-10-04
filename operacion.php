
<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('/lib/Conexion.php');
$conexion = new Conexion();
require_once('lib/funciones.php');
$operacion=new funciones();

?>