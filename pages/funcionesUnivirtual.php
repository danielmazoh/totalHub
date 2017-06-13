<?php
class Conexiones {


	// Atributos generales para la conexión y obtención de registros
		protected $conexion;
		protected $registros;
		protected $reg;


	// Método principal de conexion, siempre debe utilizarse
	public function conectarDB(){
		$this->conexion=mysqli_connect("localhost","root","","univico_pre_inscripcion") or
	    die("Problemas con la conexión");
	}

	public function consultaModalidad(){

		$this->registros=mysqli_query($this->conexion,"select *
	                        from ma_modalidad") or
	  die("Problemas en el select:".mysqli_error($this->conexion));

			while ($this->reg=mysqli_fetch_array($this->registros))
			{
			  echo "<option value='".$this->reg['md_codModalidad']."'>".$this->reg['md_nombreModalidad']."</option>";
			  
			}


	}

	public function consultaPrograma($modalidad){

		$this->registros=mysqli_query($this->conexion,"select *
	                        from ins_programa where pg_codModalidad=$modalidad") or
	  die("Problemas en el select:".mysqli_error($this->conexion));

			while ($this->reg=mysqli_fetch_array($this->registros))
			{
			  echo "<option value='".$this->reg['pg_codigo']."'>".utf8_encode($this->reg['pg_nombre'])."</option>";
			  
			}


	}

	

	public function consultaNombreSedes($codigoSede){

		$this->registros=mysqli_query($this->conexion,"select *
	                        from ma_sedes where sd_codSede=$codigoSede") or
	  die("Problemas en el select:".mysqli_error($this->conexion));

			while ($this->reg=mysqli_fetch_array($this->registros))
			{
			  echo "<option value='".$this->reg['sd_codSede']."'>".utf8_encode($this->reg['sd_nombreSede'])."</option>";
			  
			}


	}

}

class crudModalidad extends Conexiones{

	public function insertarModalidad($modalidad,$estado){

		mysqli_query($this->conexion,"insert into ma_modalidad(md_nombreModalidad,md_estadoModalidad) values 
		                       ('$modalidad','$estado')")
		  or die("Problemas en el select".mysqli_error($this->conexion));

		  echo "Modalidad Registrada";
	}

	public function listaModalidad(){

		$this->registros=mysqli_query($this->conexion,"select * from ma_modalidad")
		  or die("Problemas en el select".mysqli_error($this->conexion));

		while ($this->reg=mysqli_fetch_array($this->registros))
		{
		  echo 
		  "<tr class='odd gradeC'>
			  	<td>"
			  		.$this->reg['md_codModalidad'].
			  "</td>
			  	<td>"
			  		.$this->reg['md_nombreModalidad'].
			  "</td>
			  <td><input type='submit' value='";

			  			$total1=new crudEstado();
						$total1->conectarDB();
				  		$total1->retornaNombreEstado(
				  		$this->reg['md_estadoModalidad']);

			  echo "
			  	'  class='btn btn-warning' onclick='cambiarEstadoModalidad(".$this->reg['md_codModalidad'].")'/></td><td>
			  		<form method='post' action=''>
				  		<input type='hidden' name='codModalidadModificar' id='codModalidadModificar' value='".$this->reg['md_codModalidad']."'>
				  		<button type='button' data-toggle='modal' data-target='#myModal' class='btn btn-success'>Modificar</button>
			  		</form>
			  	</td>
			  	<td class='center'>
			  		<form method='post'>
				  		
			  		<input type='submit' value='Eliminar' class='btn btn-danger' onclick='eliminarModalidad(".$this->reg['md_codModalidad'].")'>
			  		</form>
	            </td>
                                        
           </tr>";
        }
	}

	

	public function eliminaModalidad($datoE){

		$this->registros=mysqli_query($this->conexion, "select * from ma_modalidad
			                        where md_codModalidad='$datoE'") or
			  die("Problemas en el select:".mysqli_error($this->conexion));
			if ($reg=mysqli_fetch_array($this->registros))
			{
			  mysqli_query($this->conexion,"delete from ma_modalidad where md_codModalidad='$datoE'") or
			    die("Problemas en el select:".mysqli_error($this->conexion));
			  echo "Modalidad Eliminada";
			}
			else
			{
			  echo "No Existe la Modalidad";
			}
		}
	
	public function insertarModalidad2(){

		$conexion=mysqli_connect("localhost","root","","univico_pre_inscripcion") or
	    die("Problemas con la conexión");

		$datos= array("modalidad" => "Juan");

		$statement = $conexion->prepare("insert into ma_modalidad( md_nombreModalidad) values (?)");
		$statement->bind_param("s", $datos["modalidad"]); /* s= String ¿, i= Intiger....*/
		$statement->execute();
		$statement->close();
		$conexion->close();
	}


	public function modificarEstadoModalidad($modalidad){

		$this->registros=mysqli_query($this->conexion,"select * from ma_modalidad
                        where md_codModalidad='$modalidad'") or
	  die("Problemas en el select:".mysqli_error($this->conexion));
	if ($this->reg=mysqli_fetch_array($this->registros))
	{
		if($this->reg['md_estadoModalidad']=='1'){
	mysqli_query($this->conexion, "update ma_modalidad
	                          set md_estadoModalidad='2' 
	                        where md_codModalidad='$modalidad'") or
	  die("Problemas en el select:".mysqli_error($this->conexion));
	  echo "Dato Cambiado x";
	}
	  else if ($this->reg['md_estadoModalidad']=='2') {
	  	mysqli_query($this->conexion, "update ma_modalidad
	                          set md_estadoModalidad='1' 
	                        where md_codModalidad='$modalidad'") or
	  die("Problemas en el select:".mysqli_error($this->conexion));
	  echo "Dato Cambiado y";
	  }
	  else { echo "Datos Inválidos";}
	}
	else{
		echo "Datos Inválidos";
	}
		
	}

	

}

class crudSede extends Conexiones{
		
	public function insertarSede($nombre,$telefono,$mail,$direccion,$representante,$estado){

		mysqli_query($this->conexion,"insert into ma_sedes(sd_nombreSede,
			sd_telefono,sd_mail,sd_direccion,sd_representante,sd_estado) values 
		                       ('$nombre','$telefono','$mail','$direccion','$representante','$estado')")
		  or die("Problemas en el select".mysqli_error($this->conexion));

		  echo "Sede Registrada";
	}

	public function listaSede(){

		$this->registros=mysqli_query($this->conexion,"select * from ma_sedes")
		  or die("Problemas en el select".mysqli_error($this->conexion));

		while ($this->reg=mysqli_fetch_array($this->registros))
		{
		  echo 
		  "<tr class='odd gradeC'>
			  	<td>"
			  		.$this->reg['sd_codSede'].
			  "</td>
			  	<td>"
			  		.$this->reg['sd_nombreSede'].
			  "</td>
			  <td>".$this->reg['sd_telefono']."</td>
			  
			  	
			  	<td>
			  		<form method='post' action='modificaEstadoSede.php'>
				  		<input type='hidden' name='codSedeSolicitada' value='".$this->reg['sd_codSede']."'>
				  		<input type='submit' value='";
				  		$total1=new crudEstado();
						$total1->conectarDB();
				  		$total1->retornaNombreEstado(
				  		$this->reg['sd_estado']);
				  		echo"' class='btn btn-success'>
			  		</form>
			  	</td>

			  	<td>
			  		<form method='post' action='modificaSede.php'>
				  		<input type='hidden' name='codSedeSolicitada' value='".$this->reg['sd_codSede']."'>
				  		<input type='submit' value='Modificar' class='btn btn-success'>
			  		</form>
			  	</td>
			  	<td class='center'>
			  		<form method='post' action='eliminaSede.php'>
				  		<input type='hidden' name='codSedeSolicitada' value='".$this->reg['sd_codSede']."'>
			  		<input type='submit' value='Eliminar' class='btn btn-danger'>
			  		</form>
	            </td>
                                        
           </tr>";
        }
	}

	public function eliminaSede($datoE){

		$this->registros=mysqli_query($this->conexion, "select * from ma_sedes
			                        where sd_codSede='$datoE'") or
			  die("Problemas en el select:".mysqli_error($this->conexion));
			if ($reg=mysqli_fetch_array($this->registros))
			{
			  mysqli_query($this->conexion,"delete from ma_sedes where sd_codSede='$datoE'") or
			    die("Problemas en el select:".mysqli_error($this->conexion));
			  echo "Sede Eliminada";
			}
			else
			{
			  echo "No Existe la Sede";
			}
		}

	

	public function modificarEstadoSede($sede){

		$this->registros=mysqli_query($this->conexion,"select * from ma_sedes
                        where sd_codSede='$sede'") or
	  die("Problemas en el select:".mysqli_error($this->conexion));
	if ($this->reg=mysqli_fetch_array($this->registros))
	{
		if($this->reg['sd_estado']=='1'){
	mysqli_query($this->conexion, "update ma_sedes
	                          set sd_estado='2' 
	                        where sd_codSede='$sede'") or
	  die("Problemas en el select:".mysqli_error($this->conexion));
	  echo "Dato Cambiado";
	}
	  else if ($this->reg['sd_estado']=='2') {
	  	mysqli_query($this->conexion, "update ma_sedes
	                          set sd_estado='1' 
	                        where sd_codSede='$sede'") or
	  die("Problemas en el select:".mysqli_error($this->conexion));
	  echo "Dato Cambiado";
	  }
	  else { echo "Datos Inválidos";}
	}
	else{
		echo "Datos Inválidos";
	}
		
	}
}

class crudEstado extends Conexiones{

	public function retornaNombreEstado($codigo){

		$this->registros=mysqli_query($this->conexion,"select * from ma_estado where es_codEstado = $codigo")
		  or die("Problemas en el select".mysqli_error($this->conexion));

		if ($this->reg=mysqli_fetch_array($this->registros))
		{
		  echo $this->reg['es_nombreEstado'];
        }
	}
}
?>