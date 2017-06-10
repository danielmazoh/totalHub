<?php
	require ('funcionesUnivirtual.php');

	$modalidad=isset($_POST['nomModSol'])?$_POST['nomModSol']:'';
	$estado=isset($_POST['estModSol'])?$_POST['estModSol']:'';
	

	$total1=new crudModalidad();
	$total1->conectarDB();
	$total1->insertarModalidad($modalidad,$estado);

?>
