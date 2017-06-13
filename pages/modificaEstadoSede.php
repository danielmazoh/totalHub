<?php
	require ('funcionesUnivirtual.php');
	
	$sede=$_POST['codSedeSolicitada'];
	echo $sede;
	$total1=new crudSede();
	$total1->conectarDB();
	$total1->modificarEstadoSede($sede);
	header("Location: gestionSede.php");

?>