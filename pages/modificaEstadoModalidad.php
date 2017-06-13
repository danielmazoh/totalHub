<?php
	require ('funcionesUnivirtual.php');
	
	$modalidad=$_POST['codEstMod'];
	echo $modalidad;
	$total1=new crudModalidad();
	$total1->conectarDB();
	$total1->modificarEstadoModalidad($modalidad);
	


?>