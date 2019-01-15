<?php
	require_once("BaseDatos\baseDatos.php");
 
	// abro la conexion a la base de datos
	$usuario = 'root';
 	$password = 'IamRoot2.';

	$idUsuario=$baseDatos->conectar($usuario,$password);

  header("Location: ".$location."principal.php");
	exit;



?>


