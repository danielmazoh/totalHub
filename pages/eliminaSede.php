<?php
	require ('funcionesUnivirtual.php');
	
	$total1=new crudSede();
	$total1->conectarDB();
	$total1->eliminaSede($_POST['codSedeSolicitada']);
	header("Location: gestionSede.php");


?>