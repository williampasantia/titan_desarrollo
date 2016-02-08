<?php

?>

<script>
 
 $('#<?php echo $this->campoSeguro('listaSignos')?>').width(100);
 $("#<?php echo $this->campoSeguro('listaSignos')?>").select2();
 
 $('#<?php echo $this->campoSeguro('operadores')?>').width(120);
 $("#<?php echo $this->campoSeguro('operadores')?>").select2();

 $('#<?php echo $this->campoSeguro('concepto')?>').width(140);
 $("#<?php echo $this->campoSeguro('concepto')?>").select2();

 $('#<?php echo $this->campoSeguro('parametro')?>').width(140);
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

//Codigo AGREGAR y QUITAR Campos Dinamicos

var limite = 20; //Se define el Limite de Paneles de Condiciones que se pueden Generar
				 //No requiere que se cambie en otro lugar


$(function () {
    
    
    
	$("#cancelar").hide("fast");
	$('#<?php echo $this->campoSeguro('botones')?>').hide("fast");
	
	var iCnt = 0;
	var numId = 0;
	 
	// Crear un elemento div añadiendo estilos CSS
	var container = $(document.createElement('div')).css({
		padding: '5px'
	});
	$(container).attr('class', 'col-md-12')+
       
        
                      
	 
	$('#btAdd').click(function() {
		if (iCnt < limite) {
	 
			iCnt = iCnt + 1;
	 
			// Añadir elementos Dinamicos en el DOM
			
			$(container).append('<fieldset id=panel'+iCnt+' class="ui-widget ui-widget-content">'+
					'<legend class="ui-state-default ui-corner-all"> CONDICIÓN #'+iCnt+'</legend>'+
					'<div id=lab1'+iCnt+' class="col-md-2">'+
						'<label> Si </label> ' + 
					'</div>'+
					'<input type=text class="input" id=tb1' + iCnt + ' value="" />'+
					'<select id=sel1'+iCnt+' tabindex="-1" size="1" style="width: 100px;">'+
						'<option value="1">signo</option>' +
						'<option value="2"><</option>'+
						'<option value="3"><=</option>'+
						'<option value="4">>=</option>'+
						'<option value="5">></option>'+
						'<option value="6">=</option>'+
						'<option value="7">!=</option>'+
					'</select>'+
					'<input type=text class="input" id=tb2' + iCnt + ' value="" />'+
					'<select id=sel2'+iCnt+' tabindex="-1" size="1" style="width: 100px;">'+
						'<option value="1">operador</option>' +
						'<option value="2">&&</option>'+
						'<option value="3">||</option>'+
					'</select>'+
					'<div>'+
						'<div id=lab2'+iCnt+' class="col-md-2">'+
							'<label> Entonces </label> ' + 
						'</div>'+
						'<input type=text class="input" id=tb3' + iCnt + ' value="" />'+
					'</div>'+ 
					'</fieldset>');
			
			$('#camposDinamicos').after(container);
			$('#sel1'+iCnt).width(120);
			$('#sel1'+iCnt).select2();
			
			$('#sel2'+iCnt).width(120);
			$('#sel2'+iCnt).select2();
                        
                      arrastreParametro('tb1' + iCnt);
                      arrastreParametro('tb2' + iCnt);
                      arrastreParametro('tb3' + iCnt);
	              
                      arrastreConcepto('tb1' + iCnt);
                      arrastreConcepto('tb2' + iCnt);
                      arrastreConcepto('tb3' + iCnt);
       
		}
		else { //alerta y deshabilitar boton de agregar por alcanzar el limite
	 
			alert('Limite Alcanzado');
			$('#btAdd').attr('disabled', 'disabled');
	 
		}
	});
	
         
        
        
        
        
	$('#btRemove').click(function() { // Elimina un panel de condiciones del DOM
		if (iCnt != 0) {
			$('#lab1' + iCnt).remove(); 
			$('#tb1' + iCnt).remove();
			$('#sel1' + iCnt).remove();
			$('#tb2' + iCnt).remove();
			$('#sel2' + iCnt).remove();
			$('#lab2' + iCnt).remove(); 
			$('#tb3' + iCnt).remove();
			$('#panel' + iCnt).remove();    
			iCnt = iCnt - 1; 
			$('#btAdd').removeAttr('disabled');
			$('#btAdd').attr('class', 'btn btn-success btn-block');
		}
	 
		if (iCnt == 0) { $(container).empty(); 
	 
			$(container).remove();
			$('#btAdd').removeAttr('disabled');
			$('#btAdd').attr('class', 'btn btn-success btn-block')
	 
		}
	});
	 
	$('#btRemoveAll').click(function() { //Quitar todos los paneles de condiciones Agregados
	 
		$(container).empty();
		$(container).remove();
		iCnt = 0;
		$('#btAdd').removeAttr('disabled');
		$('#btAdd').attr('class', 'btn btn-success btn-block');
	 
	});
        
        
});
//Funciones de arrastre apara dinamicos
//
//	 
function arrastreParametro(nombre) {
            
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
	    $('#'+nombre).droppable({
	        hoverClass: 'active',
	        drop: function (event, ui) {
	            this.value += $(ui.draggable).find('select option:selected').text();
	        }
	    });
};

function arrastreConcepto(nombre) {
            
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
    $('#'+nombre).droppable({
        hoverClass: 'active',
        drop: function (event, ui) {
            this.value += $(ui.draggable).find('select option:selected').text();
        }
    });
};				 
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