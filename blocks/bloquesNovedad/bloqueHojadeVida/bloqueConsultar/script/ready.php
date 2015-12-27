



/*
$('#tablaReporte').dataTable( {
	"sPaginationType": "full_numbers"
} );
*/

$('#datepicker').datepicker({
	autoHidePrompt: true
});

$("#<?php echo $this->campoSeguro('funcionarioIdentificacion')?>").width(); 
$("#<?php echo $this->campoSeguro('funcionarioIdentificacion')?>").select2();

$("#<?php echo $this->campoSeguro('funcionarioPais')?>").width(250); 
$("#<?php echo $this->campoSeguro('funcionarioPais')?>").select2();
$("#<?php echo $this->campoSeguro('funcionarioDepartamento')?>").width(250); 
$("#<?php echo $this->campoSeguro('funcionarioDepartamento')?>").select2();
$("#<?php echo $this->campoSeguro('funcionarioCiudad')?>").width(250); 
$("#<?php echo $this->campoSeguro('funcionarioCiudad')?>").select2();
		

