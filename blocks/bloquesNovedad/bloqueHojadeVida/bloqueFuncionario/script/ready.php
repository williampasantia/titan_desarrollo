

$("#bloqueFuncionario").validationEngine({
	promptPosition : "centerRight",
	scroll: false,
	autoHidePrompt: true,
	autoHideDelay: 2000
});

/*
$('#tablaReporte').dataTable( {
	"sPaginationType": "full_numbers"
} );
*/

$('#datepicker').datepicker({
	autoHidePrompt: true
});
$('#<?php echo $this->campoSeguro('funcionarioIdentificacion')?>').width(250); 
$("#<?php echo $this->campoSeguro('funcionarioIdentificacion')?>").select2();

$('#<?php echo $this->campoSeguro('funcionarioPaisNacimiento')?>').width(250); 
$("#<?php echo $this->campoSeguro('funcionarioPaisNacimiento')?>").select2();
$('#<?php echo $this->campoSeguro('funcionarioDepartamentoNacimiento')?>').width(250); 
$("#<?php echo $this->campoSeguro('funcionarioDepartamentoNacimiento')?>").select2();
$('#<?php echo $this->campoSeguro('funcionarioCiudadNacimiento')?>').width(250); 
$("#<?php echo $this->campoSeguro('funcionarioCiudadNacimiento')?>").select2();

$("#<?php echo $this->campoSeguro('funcionarioGenero')?>").select2();
$("#<?php echo $this->campoSeguro('funcionarioEstadoCivil')?>").select2();
$("#<?php echo $this->campoSeguro('funcionarioTipoSangre')?>").select2();
$("#<?php echo $this->campoSeguro('funcionarioSangreRH')?>").select2();
$("#<?php echo $this->campoSeguro('funcionarioTipoLibreta')?>").select2();

$('#<?php echo $this->campoSeguro('funcionarioGrupoEtnico')?>').width(200); 
$("#<?php echo $this->campoSeguro('funcionarioGrupoEtnico')?>").select2();
$("#<?php echo $this->campoSeguro('funcionarioGrupoLGBT')?>").select2();
$("#<?php echo $this->campoSeguro('funcionarioCabezaFamilia')?>").select2();
$("#<?php echo $this->campoSeguro('funcionarioPersonasCargo')?>").select2();

$('#<?php echo $this->campoSeguro('funcionarioContactoPais')?>').width(250); 
$("#<?php echo $this->campoSeguro('funcionarioContactoPais')?>").select2();
$('#<?php echo $this->campoSeguro('funcionarioContactoDepartamento')?>').width(250); 
$("#<?php echo $this->campoSeguro('funcionarioContactoDepartamento')?>").select2();
$('#<?php echo $this->campoSeguro('funcionarioContactoCiudad')?>').width(250); 
$("#<?php echo $this->campoSeguro('funcionarioContactoCiudad')?>").select2();
$("#<?php echo $this->campoSeguro('funcionarioContactoEstrato')?>").select2();

$('#<?php echo $this->campoSeguro('funcionarioFormacionBasicaPais')?>').width(250); 
$("#<?php echo $this->campoSeguro('funcionarioFormacionBasicaPais')?>").select2();
$('#<?php echo $this->campoSeguro('funcionarioFormacionBasicaDepartamento')?>').width(250); 
$("#<?php echo $this->campoSeguro('funcionarioFormacionBasicaDepartamento')?>").select2();
$('#<?php echo $this->campoSeguro('funcionarioFormacionBasicaCiudad')?>').width(250); 
$("#<?php echo $this->campoSeguro('funcionarioFormacionBasicaCiudad')?>").select2();

$('#<?php echo $this->campoSeguro('funcionarioFormacionMediaPais')?>').width(250); 
$("#<?php echo $this->campoSeguro('funcionarioFormacionMediaPais')?>").select2();
$('#<?php echo $this->campoSeguro('funcionarioFormacionMediaDepartamento')?>').width(250); 
$("#<?php echo $this->campoSeguro('funcionarioFormacionMediaDepartamento')?>").select2();
$('#<?php echo $this->campoSeguro('funcionarioFormacionMediaCiudad')?>').width(250); 
$("#<?php echo $this->campoSeguro('funcionarioFormacionMediaCiudad')?>").select2();

$('#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorModalidad')?>').width(250); 
$("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorModalidad')?>").select2();

jQuery.fn.generaNuevosCampos = function(etiqueta, nombreCampo, indice){
   $(this).each(function(){
      elem = $(this);
      elem.data("etiqueta",etiqueta);
      elem.data("nombreCampo",nombreCampo);
      elem.data("indice",indice);
      
      
      elem.click(function(e){
      
      	e.preventDefault();
         elem = $(this);
         etiqueta = elem.data("etiqueta");
         nombreCampo = elem.data("nombreCampo");
         indice = elem.data("indice");
         texto_insertar = '<p>' + etiqueta + ' ' + indice + ':<input type="text" name="' + nombreCampo + indice + '" /></p>';
         indice ++;
         elem.data("indice",indice);
         nuevo_campo = $(texto_insertar);
         elem.before(nuevo_campo);
         alert("texto..."+indice);
      });
   });
   return this;
}


$(document).ready(function(){
   $("#mascampos").generaNuevosCampos("Registro", "compra", 2);
}); 