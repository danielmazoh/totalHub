<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<script type="text/javascript" src="scripts.js"></script>
<body>
	<?php require ('funcionesUnivirtual.php');?>

	<label for="programaSolicitado">Modalidad</label><br>
			
			<form method="post" action="">


			<select name="modalidadSolicitada" id="modalidadSolicitada" class="form-control" onChange="cargarProgramaEducativo()" required>
		    <option> </option>
		    	<?php
							$total1=new Conexiones();
							$total1->conectarDB();
							$total1->consultaModalidad();
						?>
		    </select>
			<br>

			<label for="cursoSolicitado">Programa</label><br>
			<select name="cursoSolicitado" id="cursoSolicitado" class="form-control" required onChange="cargarSede()" >
		    	
		    			
		    </select>
			<br>

			
			<label for="sedeSolicitada">Sede</label><br>
			<select name="sedeSolicitada" id="sedeSolicitada" class="form-control" required="required"  >
				<option></option>

				
			
		    	
		    </select>

		    <input type="submit" Value="Enviar">
		    </form>

</body>
</html>