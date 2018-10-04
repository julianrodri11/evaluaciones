<?php
    require_once('/lib/Conexion.php');
	$conexion = new Conexion();
	require_once('lib/funciones.php');
	$operacion=new funciones();

	$tipo=	$_POST['txt_tide'];
	$iden=	$_POST['txt_nide'];
	$pnom=	$_POST['txt_pnom'];
	$pape=	$_POST['txt_pape'];
	$corr=	$_POST['txt_corr'];
	$tele=	$_POST['txt_tele'];
	$dire=	$_POST['txt_dire'];
	$fnac=	$_POST['txt_fnac'];
	$tusu=	$_POST['txt_tusu'];
	
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

	

?>