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

$(document).ready(function() {
	var iCnt = 0;
	 
	// Crear un elemento div añadiendo estilos CSS
	var container = $(document.createElement('div')).css({
		padding: '5px', margin: '20px', width: '170px', border: '1px dashed',
		borderTopColor: '#999', borderBottomColor: '#999',
		borderLeftColor: '#999', borderRightColor: '#999'
	});
	 
	$('#btAdd').click(function() {
		if (iCnt <= 19) {
	 
			iCnt = iCnt + 1;
	 
			// Añadir caja de texto.
			$(container).append('<input type=text class="input" id=tb' + iCnt + ' ' +
			'value="Elemento de Texto ' + iCnt + '" />');
	 
			if (iCnt == 1) {
	 
				var divSubmit = $(document.createElement('div'));
				$(divSubmit).append('<input type=button class="bt" onclick="GetTextValue()"' +
				'id=btSubmit value=Enviar />');
	 
			}
	 
			$('#camposDinamicos').after(container, divSubmit);
		}
		else { //se establece un limite para añadir elementos, 20 es el limite
	 
			$(container).append('<label>Limite Alcanzado</label>');
			$('#btAdd').attr('class', 'bt-disable');
			$('#btAdd').attr('disabled', 'disabled');
	 
		}
	});
	 
	$('#btRemove').click(function() { // Elimina un elemento por click

		if (iCnt != 0) { $('#tb' + iCnt).remove(); iCnt = iCnt - 1; }
	 
		if (iCnt == 0) { $(container).empty();
	 
			$(container).remove();
			$('#btSubmit').remove();
			$('#btAdd').removeAttr('disabled');
			$('#btAdd').attr('class', 'bt')
	 
		}
	});
	 
	$('#btRemoveAll').click(function() { // Elimina todos los elementos del contenedor
	 
		$(container).empty();
		$(container).remove();
		$('#btSubmit').remove(); iCnt = 0;
		$('#btAdd').removeAttr('disabled');
		$('#btAdd').attr('class', 'bt');
	 
	});
});
	 
// Obtiene los valores de los textbox al dar click en el boton "Enviar"
var divValue, values = '';
	 
function GetTextValue() {
	 
	$(divValue).empty();
	$(divValue).remove(); values = '';
	 
	$('.input').each(function() {
		divValue = $(document.createElement('div')).css({
			padding:'5px', width:'200px'
		});
		values += this.value + '<br />'
	});
	 
	$(divValue).append('<p><b>Tus valores añadidos</b></p>' + values);
	$('body').append(divValue);
	 
}

</script>