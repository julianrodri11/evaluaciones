<?php



if(!isset($_POST['user']) || !isset($_POST['password']) || empty($_POST['user']) || empty($_POST['password']))
{
	header('location:../login.php');	
}
else
{
	require_once('../lib/Conexion.php');
	$bd = new Conexion();
	
	include_once('../lib/funciones.php');
	$op =new funciones();
	$usuario=$_POST['user'];
	$contrasena=$_POST['password'];
	
	//$usuario=$op->tildes($usuario);
	//$contrasena=$op->tildes($contrasena);
	$longA=$op->longitud($usuario,100);
	$longB=$op->longitud($contrasena,100);
	if($longA && $longB)
	{			  
			  $sql=mysqli_query($bd,"SELECT 
			  	idusuario,
			  	numero_ide,			
				primer_nombre,
				primer_apellido,
				tipo_usuario.nombre AS rol
				FROM usuario
				INNER JOIN tipo_usuario ON usuario.fk_idtipo_usuario=tipo_usuario.idtipo_usuario
				INNER JOIN login ON login.fk_idusuario=usuario.idusuario
				where login.login='$usuario' and login.pass=sha1('$contrasena');")or  die("Problemas en el select:".mysqli_error($conexion));

			  $consulta=mysqli_fetch_array($sql);
				if($consulta)
					{	
						///////////llamo libreria de sesiones/////////////
						if (!isset($_SESSION)) {
							  session_start();
						}
						//$_SESSION['numero_ide']=$consulta['idusuario'];
						$_SESSION['numero_ide']=$consulta['numero_ide'];
						$_SESSION['primer_nom']=$consulta['primer_nombre'];
						$_SESSION['primer_ape']=$consulta['primer_apellido'];
						$_SESSION['tipoUsu']=$consulta['rol'];			
						if($_SESSION['tipoUsu']=="administrador" || $_SESSION['tipoUsu']=="docente" || $_SESSION['tipoUsu']=="estudiante")
							{
								//echo "----------------".$ses_pri_nom.$ses_pri_ape;
								header('Location:../crear_evaluaciones.php');
							
							}
							else 
							if($_SESSION['tipoUsu']=='SuperUserAdmin'){header('Location:menureg.php');}
						else{header('Location:login.php');}			  
					}else
						{ echo "<center><h4 style='color:red'>Verifica tus datos el usuario no esta registrado<h4><br><a href='login.php'>Atras</a></center>";       
						}
	
	}
	
//	$login= new Acceso($_POST['user'],$_POST['password']);
//	$login->login();

}
	


?>