<?php
require ('funcionesUnivirtual.php');
$tipoSol=isset($_POST['tipoSol'])?$_POST['tipoSol']:'';



$conexion=mysqli_connect("localhost","root","","univico_pre-inscripcion") or
    die("Problemas con la conexión");

$registros=mysqli_query($conexion,"select *
                        from ins_programa  where pg_codModalidad =" . $tipoSol) or
  die("Problemas en el select:".mysqli_error($conexion));
echo "<option></option>";
if ($reg=mysqli_fetch_array($registros))
{
  

				
							$total1=new Conexiones();
							$total1->conectarDB();
							$total1->consultaPrograma($tipoSol);
					
        
}

mysqli_close($conexion);



?>