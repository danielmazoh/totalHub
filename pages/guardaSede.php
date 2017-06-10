<?php
	require ('funcionesUnivirtual.php');

	$total1=new crudSede();
	$total1->conectarDB();
	$total1->insertarSede($_POST['nombreSedeSolicitada']);
	header("Location: gestionSede.php");

?>