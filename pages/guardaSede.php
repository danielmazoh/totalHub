<?php
	require ('funcionesUnivirtual.php');

	$total1=new crudSede();
	$total1->conectarDB();
	$total1->insertarSede(
		$_POST['nombreSedeSolicitad'],
		$_POST['telefonoSedeSolicitada'],
		$_POST['mailSedeSolicitada'],
		$_POST['direccionSedeSolicitada'],
		$_POST['representanteSedeSolicitada'],
		$_POST['estadoSedeSolicitada']);


	
	header("Location: gestionSede.php");

?>