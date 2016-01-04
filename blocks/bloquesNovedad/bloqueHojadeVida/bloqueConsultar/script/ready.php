
$("#<?php echo $this->campoSeguro('funcionarioApellido')?>").validationEngine({
		promptPosition : "centerRight",
		scroll: false,
		autoHidePrompt: true,
		autoHideDelay: 2000,
	    updatePromptsPosition:true
});

$("#<?php echo $this->campoSeguro('funcionarioNombre')?>").validationEngine({
		promptPosition : "centerRight",
		scroll: false,
		autoHidePrompt: true,
		autoHideDelay: 2000,
	    updatePromptsPosition:true
});

/*
$('#tablaReporte').dataTable( {
	"sPaginationType": "full_numbers"
} );
*/

$('#datepicker').datepicker({
	autoHidePrompt: true
});

$("#<?php echo $this->campoSeguro('funcionarioIdentificacion')?>").width(250); 
$("#<?php echo $this->campoSeguro('funcionarioIdentificacion')?>").select2();

$("#<?php echo $this->campoSeguro('funcionarioPais')?>").width(250); 
$("#<?php echo $this->campoSeguro('funcionarioPais')?>").select2();
$("#<?php echo $this->campoSeguro('funcionarioDepartamento')?>").width(250); 
$("#<?php echo $this->campoSeguro('funcionarioDepartamento')?>").select2();
$("#<?php echo $this->campoSeguro('funcionarioCiudad')?>").width(250); 
$("#<?php echo $this->campoSeguro('funcionarioCiudad')?>").select2();


$("#<?php echo $this->campoSeguro('funcionarioContactoEstrato')?>").width(200); 
$("#<?php echo $this->campoSeguro('funcionarioContactoEstrato')?>").select2();

