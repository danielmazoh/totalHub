<?php
	require ('funcionesUnivirtual.php');
	

	$total1=new crudModalidad();
	$total1->conectarDB();
	$total1->modificarEstadoModalidad(149);
	


?>