<?php
	require ('funcionesUnivirtual.php');
	
	$modalidad=$_POST['codModSol'];

	$total1=new crudModalidad();
	$total1->conectarDB();
	$total1->eliminaModalidad($modalidad);
	


?>