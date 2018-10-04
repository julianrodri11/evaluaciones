<?php

class Conexion extends mysqli
{
	public function __construct()
	{
		parent::__construct('localhost','root','','sis_eva');
		$this->query("SET NAMES 'utf8';");
		$this->connect_errno ? die('Error de conexion, verifique sus credenciales de acceso'): $x ='conectado a la base de datos';
		//echo $x;
		unset($x);
	}
	
	
	
}
//$db=new Conexion();
?>