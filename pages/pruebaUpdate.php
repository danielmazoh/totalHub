<?php

	$conexion=mysqli_connect("localhost","root","","univico_pre_inscripcion") or
    die("Problemas con la conexión");

	$registros=mysqli_query($conexion,"select * from ma_modalidad
                        where md_codModalidad='147'") or
	  die("Problemas en el select:".mysqli_error($conexion));
	if ($reg=mysqli_fetch_array($registros))
	{
		if($reg['md_estadoModalidad']=='1'){
	mysqli_query($conexion, "update ma_modalidad
	                          set md_estadoModalidad='2' 
	                        where md_codModalidad='147'") or
	  die("Problemas en el select:".mysqli_error($conexion));
	  echo "Dato Cambiado x";
	}
	  else if ($reg['md_estadoModalidad']=='2') {
	  	mysqli_query($conexion, "update ma_modalidad
	                          set md_estadoModalidad='1' 
	                        where md_codModalidad='147'") or
	  die("Problemas en el select:".mysqli_error($conexion));
	  echo "Dato Cambiado y";
	  }
	  else { echo "Datos Inválidos";}
	}
	else{
		echo "Datos Inválidos";
	}

	

?>