function cargarProgramaEducativo(){

  var tipoSol = $('#modalidadSolicitada').val(); /*id de la lista del programa */

  $.ajax({
    type:'POST',
    url:'listarProgramas.php',
    data:{"tipoSol":tipoSol},

    success: function(data){
      $('#cursoSolicitado option').remove();
      $('#cursoSolicitado').append(data);
    }
  });
}

$(document).ready(function(){
  $( "#modalidadSolicitada" ).change(function() {
    if($('#sedeSolicitada').val() != ''){
      $('#sedeSolicitada option').remove();
    }
});
})

function cargarSede(){
  var modalidad = $('#modalidadSolicitada').val();
  var curso = $('#cursoSolicitado').val();

  // alert("Modalidad="+modalidad+" Curso="+curso);
  $.ajax({
    type:'POST',
    url:'listarSedes.php',
    data:{"modalidad":modalidad,"curso":curso},

    success: function(data){
      $('#sedeSolicitada option').remove();
      $('#sedeSolicitada').append(data);
    }
  }); 
}

function guardarModalidad(){
  
  var nomModSol = $('#nombreModalidadSolicitada').val(); /*id de la lista del programa*/ 
  var estModSol = $('#estadoModalidadSolicitado').val();

  $.ajax({
    type:'POST',
    url:'guardaModalidad.php',
    data:{"nomModSol":nomModSol,"estModSol":estModSol},

    success: function(data){
      alert("Modalidad Registrada");
      $('#nombreModalidadSolicitada').val('');
      
    }
  });
}

function eliminarModalidad(){
  
  var codModSol = $('#codModalidadEliminar').val(); 

  $.ajax({
    type:'POST',
    url:'eliminaModalidad.php',
    data:{"codModSol":codModSol},
    timeout:'5000',

    success: function(data){
      alert("Modalidad Eliminada");
      
      //$('#codModalidadSolicitada').val('');
      //document.location.href='gestionModalidad.php';
      
    }
  });
}


