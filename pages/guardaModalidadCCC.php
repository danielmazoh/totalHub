<?php
	require ('funcionesUnivirtual.php');
	
	$total1=new crudModalidad();
	$total1->conectarDB();
	$total1->insertarModalidad($_POST['nombreModalidadSolicitada']);
	header("Location: gestionModalidad.php");

?>