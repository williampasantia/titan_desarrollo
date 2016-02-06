<?php

?>

<script>
 
 $('#<?php echo $this->campoSeguro('listaSignos')?>').width(100);
 $("#<?php echo $this->campoSeguro('listaSignos')?>").select2();
 
 $('#<?php echo $this->campoSeguro('operadores')?>').width(120);
 $("#<?php echo $this->campoSeguro('operadores')?>").select2();

 $('#<?php echo $this->campoSeguro('concepto')?>').width(80);
 $("#<?php echo $this->campoSeguro('concepto')?>").select2();

 $('#<?php echo $this->campoSeguro('parametro')?>').width(80);
 $("#<?php echo $this->campoSeguro('parametro')?>").select2();
 
 $('#<?php echo $this->campoSeguro('tipoSueldoRegistroMod')?>').width(250);
 $('#<?php echo $this->campoSeguro('tipoSueldoRegistroMod')?>').select2(); 

 $('#<?php echo $this->campoSeguro('ley')?>').width(250);
 $('#<?php echo $this->campoSeguro('ley')?>').select2(); 

 $('#<?php echo $this->campoSeguro('naturaleza')?>').width(200);
 $('#<?php echo $this->campoSeguro('naturaleza')?>').select2();  
 
 
 $('#<?php echo $this->campoSeguro('estadoRegistro')?>').width(200);
 $("#<?php echo $this->campoSeguro('estadoRegistro')?>").select2();

 $('#<?php echo $this->campoSeguro('categoriaConceptos')?>').width(250);
 $("#<?php echo $this->campoSeguro('categoriaConceptos')?>").select2();
 
 $('#<?php echo $this->campoSeguro('categoriaConceptosList')?>').width(260);
 $("#<?php echo $this->campoSeguro('categoriaConceptosList')?>").select2();

 $('#<?php echo $this->campoSeguro('categoriaParametrosList')?>').width(260);
 $("#<?php echo $this->campoSeguro('categoriaParametrosList')?>").select2();

 $( '#<?php echo $this->campoSeguro('ley')?>' ).change(function() {
		$("#<?php echo $this->campoSeguro('leyRegistros') ?>").val($("#<?php echo $this->campoSeguro('ley') ?>").val());
 });
   
    
$( '#<?php echo $this->campoSeguro('formula')?>' ).keypress(function(tecla) {
	 if(tecla.charCode != 0  && tecla.charCode != 42 && tecla.charCode != 43 && 
	    tecla.charCode != 45 && tecla.charCode != 47 && 
	    tecla.charCode != 40 && tecla.charCode != 41) return false;
});

$( '#<?php echo $this->campoSeguro('valorConcepto')?>' ).keypress(function(tecla) {
	 if(tecla.charCode != 0  && tecla.charCode != 42 && tecla.charCode != 43 && 
	    tecla.charCode != 45 && tecla.charCode != 47 && 
	    tecla.charCode != 40 && tecla.charCode != 41) return false;
});

$(function () {
	    $("#parametros").draggable({
	        revert: true,
	        helper: 'clone',
	        start: function (event, ui) {
	            $(this).fadeTo('fast', 1.5);
	        },
	        stop: function (event, ui) {
	            $(this).fadeTo(0, 1);
	        }
	    });

	    $('#<?php echo $this->campoSeguro('formula')?>').droppable({
	        hoverClass: 'active',
	        drop: function (event, ui) {
	            this.value += $(ui.draggable).find('select option:selected').text();
	        }
	    });
});

$(function () {
    $("#conceptos").draggable({
        revert: true,
        helper: 'clone',
        start: function (event, ui) {
            $(this).fadeTo('fast', 1.5);
        },
        stop: function (event, ui) {
            $(this).fadeTo(0, 1);
        }
    });

    $('#<?php echo $this->campoSeguro('formula')?>').droppable({
        hoverClass: 'active',
        drop: function (event, ui) {
            this.value += $(ui.draggable).find('select option:selected').text();
        }
    });
});

$( '#<?php echo $this->campoSeguro('categoriaConceptosList')?>' ).change(function() {
	$('#<?php echo $this->campoSeguro('valorConcepto')?>').attr("readonly","readonly");
	$('#<?php echo $this->campoSeguro('valorConcepto')?>').addClass("readOnly");
	$('#<?php echo $this->campoSeguro('valorConcepto')?>').val("");

	$("#editarBotonesConcepto").show("slow");
	$("#ingresoBotonesConcepto").hide("fast");

	$("#<?php echo $this->campoSeguro('seccionConceptos')?>").removeAttr('disabled');
    $("#<?php echo $this->campoSeguro('seccionConceptos')?>").select2();
});

$( '#<?php echo $this->campoSeguro('seccionConceptos')?>' ).change(function() {
	$('#<?php echo $this->campoSeguro('valorConcepto')?>').attr("readonly","readonly");
	$('#<?php echo $this->campoSeguro('valorConcepto')?>').addClass("readOnly");
	$('#<?php echo $this->campoSeguro('valorConcepto')?>').val("");

	$("#editarBotonesConcepto").show("slow");
	$("#ingresoBotonesConcepto").hide("fast");
});


$( '#<?php echo $this->campoSeguro('categoriaParametrosList')?>' ).change(function() {

	$("#<?php echo $this->campoSeguro('seccionParametros')?>").removeAttr('disabled');
    $("#<?php echo $this->campoSeguro('seccionParametros')?>").select2();
});


//***********************************************************************************************************
//***********************************************************************************************************


//Funciones de arrastre apara condicion
//
//	 
$(function () {
	    $("#parametros").draggable({
	        revert: true,
	        helper: 'clone',
	        start: function (event, ui) {
	            $(this).fadeTo('fast', 1.5);
	        },
	        stop: function (event, ui) {
	            $(this).fadeTo(0, 1);
	        }
	    });
            $('#<?php echo $this->campoSeguro('condicionSi')?>').droppable({
	        hoverClass: 'active',
	        drop: function (event, ui) {
	            this.value += $(ui.draggable).find('select option:selected').text();
	        }
	    });
            
	    $('#<?php echo $this->campoSeguro('condicionEntonces')?>').droppable({
	        hoverClass: 'active',
	        drop: function (event, ui) {
	            this.value += $(ui.draggable).find('select option:selected').text();
	        }
	    });
});

$(function () {
    $("#conceptos").draggable({
        revert: true,
        helper: 'clone',
        start: function (event, ui) {
            $(this).fadeTo('fast', 1.5);
        },
        stop: function (event, ui) {
            $(this).fadeTo(0, 1);
        }
    });

    $('#<?php echo $this->campoSeguro('condicionSi')?>').droppable({
        hoverClass: 'active',
        drop: function (event, ui) {
            this.value += $(ui.draggable).find('select option:selected').text();
        }
    });
    $('#<?php echo $this->campoSeguro('condicionEntonces')?>').droppable({
        hoverClass: 'active',
        drop: function (event, ui) {
            this.value += $(ui.draggable).find('select option:selected').text();
        }
    });
});				 
// Funcion que Obtiene los valores de los textbox y los select
var values = '', condiciones = '';
	 
function GetTextValue() {
	 
	values = '';
	 
	$('.input').each(function() {
		values += this.value + ',';
		$("#<?php echo $this->campoSeguro('variablesRegistros') ?>").val(values);
	});

	condiciones = '';

	$( "select option:selected" ).each(function() {
	   condiciones += '['+ this.value + ']';
	   $("#<?php echo $this->campoSeguro('condicionesRegistros') ?>").val(condiciones);
	});

	 
}




</script> 