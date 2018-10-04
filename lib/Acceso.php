<?php

class Acceso 
{	protected $user;
	protected $pass;

	public function __construct($usuario,$contrasena)
	{
		$this->user = $usuario;
		$this->pass = $contrasena;		
	}
	public function login()
	{

		$db = new Conexion();
		$sql->$db->query("SELECT 
			  tipo_usuario.nombre,
			  usuario.primer_nombre,
			  usuario.primer_apellido,
			  login.fk_idusuario
			FROM
			  login,
			  usuario,
			  tipo_usuario
			  where
			  login.login=".$this->user." and login.password=".$this->pass.";");	
	$datos->$db->recorrer($sql);
	if($datos!=0)
	{
		session_start();
		$_SESSION['usuario']=$this->user;
		//header('location:acceso2.php');
	}
	else
	{
//header('location:../login.php');
	}
	
	}
	
	public function registro()
	{
	
	}
	
	public function claveperdida()
	{
	
	
	}
	


}

?>