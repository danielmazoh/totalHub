<?php
require ('funcionesUnivirtual.php');
$modalidad=isset($_POST['modalidad'])?$_POST['modalidad']:'';
$curso=$_POST['curso'];


$conexion=mysqli_connect("localhost","root","","univico_pre-inscripcion") or
    die("Problemas con la conexión");

$registros=mysqli_query($conexion,"select *
                        from ins_programa where pg_codModalidad = ".$modalidad."&& pg_codigo=$curso") or
  die("Problemas en el select:".mysqli_error($conexion));
echo "<option></option>";
if ($reg=mysqli_fetch_array($registros))
{

							$total1=new Conexiones();
							$total1->conectarDB();
							$total1->consultaNombreSedes($reg['pg_sede']);

	}			

?>