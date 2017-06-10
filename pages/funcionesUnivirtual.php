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
			  <td>".$this->reg['md_estadoModalidad']."
			  	</td><td>
			  		<form method='post' action='modificaModalidad.php'>
				  		<input type='hidden' name='codModalidadModificar' id='codModalidadModificar' value='".$this->reg['md_codModalidad']."'>
				  		<input type='submit' value='Modificar' class='btn btn-success'>
			  		</form>
			  	</td>
			  	<td class='center'>
			  		<form method='post' action=''>
				  		<input type='text' name='codModalidadEliminar' id='codModalidadEliminar' value='".$this->reg['md_codModalidad']."'>
			  		<input type='submit' value='Eliminar' class='btn btn-danger' onclick='eliminarModalidad()'>
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
	



}

class crudSede extends Conexiones{
		
	public function insertarSede($sede){

		mysqli_query($this->conexion,"insert into ma_sedes(sd_nombreSede) values 
		                       ('$sede')")
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

	}
?>