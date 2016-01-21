
// Asociar el widget de validación al formulario
$("#login").validationEngine({
	promptPosition : "centerRight",
	scroll : false
});

$('#usuario').keydown(function(e) {
    if (e.keyCode == 13) {
        $('#login').submit();
    }
});

$('#clave').keydown(function(e) {
    if (e.keyCode == 13) {
        $('#login').submit();
    }
});

$(function() {
	$(document).tooltip({
		position : {
			my : "left+15 center",
			at : "right center"
		}
	},
	{ hide: { duration: 800 } }
	);
});

$(function() {
	$("button").button().click(function(event) {
		event.preventDefault();
	});
});

$("#tablaReporte").dataTable().fnDestroy();

$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#tablaReporte tfoot th').each( function () {
        var title = $(this).text();
        
        $(this).html( '<input type="text" placeholder="'+title+'" size="15"/>' );
    } );
 
    // DataTable
    var table = $('#tablaReporte').DataTable({
        
    "language": {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
	"sZeroRecords":    "No se encontraron resultados",
        "sSearch":         "Buscar:",
        "sLoadingRecords": "Cargando...",
        "sEmptyTable":     "NingÃºn dato disponible en esta tabla",
	"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
	"oPaginate": {
		"sFirst":    "Primero",
		"sLast":     "Ãšltimo",
		"sNext":     "Siguiente",
		"sPrevious": "Anterior"
	}
    }
    });
    
    $('#tablaReporte tbody')
        .on( 'mouseenter', 'td', function () {
            var colIdx = table.cell(this).index().column;
 
            $( table.cells().nodes() ).removeClass( 'highlight' );
            $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
        } );
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );

/*Validar Fecha de Retiro Mayor a la Fecha de Entrada Experiencia Laboral*/

$('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_0')?>').datepicker({
	autoHidePrompt: true,
	dateFormat: 'yy-mm-dd',
	
	changeYear: true,
	changeMonth: true,
	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
	    dayNames: ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
	    dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
	    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
	    onSelect: function(dateText, inst) {
		var lockDate = new Date($('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_0')?>').datepicker('getDate'));
		$('input#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_0')?>').datepicker('option', 'minDate', lockDate);
		},
		onClose: function() { 
	 	    if ($('input#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_0')?>').val()!='')
             {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_0')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all   validate[required]");
         }else {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_0')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all ");
             }
		  }
		
		
	});
       $('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_0')?>').datepicker({
	dateFormat: 'yy-mm-dd',
	
	changeYear: true,
	changeMonth: true,
	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
	    dayNames: ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
	    dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
	    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
	    onSelect: function(dateText, inst) {
		var lockDate = new Date($('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_0')?>').datepicker('getDate'));
		$('input#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_0')?>').datepicker('option', 'maxDate', lockDate);
		 },
		 onClose: function() { 
	 	    if ($('input#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_0')?>').val()!='')
             {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_0')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all   validate[required]");
         }else {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_0')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all ");
             }
		  }
		
});

//******************

$('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_1')?>').datepicker({
	autoHidePrompt: true,
	dateFormat: 'yy-mm-dd',
	
	changeYear: true,
	changeMonth: true,
	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
	    dayNames: ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
	    dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
	    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
	    onSelect: function(dateText, inst) {
		var lockDate = new Date($('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_1')?>').datepicker('getDate'));
		$('input#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_1')?>').datepicker('option', 'minDate', lockDate);
		},
		onClose: function() { 
	 	    if ($('input#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_1')?>').val()!='')
             {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_1')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all   validate[required]");
         }else {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_1')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all ");
             }
		  }
		
		
	});
       $('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_1')?>').datepicker({
	dateFormat: 'yy-mm-dd',
	
	changeYear: true,
	changeMonth: true,
	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
	    dayNames: ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
	    dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
	    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
	    onSelect: function(dateText, inst) {
		var lockDate = new Date($('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_1')?>').datepicker('getDate'));
		$('input#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_1')?>').datepicker('option', 'maxDate', lockDate);
		 },
		 onClose: function() { 
	 	    if ($('input#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_1')?>').val()!='')
             {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_1')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all   validate[required]");
         }else {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_1')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all ");
             }
		  }
		
});

//********************

$('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_2')?>').datepicker({
	autoHidePrompt: true,
	dateFormat: 'yy-mm-dd',
	
	changeYear: true,
	changeMonth: true,
	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
	    dayNames: ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
	    dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
	    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
	    onSelect: function(dateText, inst) {
		var lockDate = new Date($('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_2')?>').datepicker('getDate'));
		$('input#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_2')?>').datepicker('option', 'minDate', lockDate);
		},
		onClose: function() { 
	 	    if ($('input#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_2')?>').val()!='')
             {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_2')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all   validate[required]");
         }else {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_2')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all ");
             }
		  }
		
		
	});
       $('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_2')?>').datepicker({
	dateFormat: 'yy-mm-dd',
	
	changeYear: true,
	changeMonth: true,
	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
	    dayNames: ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
	    dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
	    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
	    onSelect: function(dateText, inst) {
		var lockDate = new Date($('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_2')?>').datepicker('getDate'));
		$('input#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_2')?>').datepicker('option', 'maxDate', lockDate);
		 },
		 onClose: function() { 
	 	    if ($('input#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_2')?>').val()!='')
             {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_2')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all   validate[required]");
         }else {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_2')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all ");
             }
		  }
		
});

//***********************

$('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_3')?>').datepicker({
	autoHidePrompt: true,
	dateFormat: 'yy-mm-dd',
	
	changeYear: true,
	changeMonth: true,
	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
	    dayNames: ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
	    dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
	    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
	    onSelect: function(dateText, inst) {
		var lockDate = new Date($('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_3')?>').datepicker('getDate'));
		$('input#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_3')?>').datepicker('option', 'minDate', lockDate);
		},
		onClose: function() { 
	 	    if ($('input#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_3')?>').val()!='')
             {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_3')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all   validate[required]");
         }else {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_3')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all ");
             }
		  }
		
		
	});
       $('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_3')?>').datepicker({
	dateFormat: 'yy-mm-dd',
	
	changeYear: true,
	changeMonth: true,
	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
	    dayNames: ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
	    dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
	    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
	    onSelect: function(dateText, inst) {
		var lockDate = new Date($('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_3')?>').datepicker('getDate'));
		$('input#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_3')?>').datepicker('option', 'maxDate', lockDate);
		 },
		 onClose: function() { 
	 	    if ($('input#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_3')?>').val()!='')
             {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_3')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all   validate[required]");
         }else {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_3')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all ");
             }
		  }
		
});

//*******


$('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_4')?>').datepicker({
	autoHidePrompt: true,
	dateFormat: 'yy-mm-dd',
	
	changeYear: true,
	changeMonth: true,
	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
	    dayNames: ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
	    dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
	    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
	    onSelect: function(dateText, inst) {
		var lockDate = new Date($('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_4')?>').datepicker('getDate'));
		$('input#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_4')?>').datepicker('option', 'minDate', lockDate);
		},
		onClose: function() { 
	 	    if ($('input#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_4')?>').val()!='')
             {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_4')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all   validate[required]");
         }else {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_4')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all ");
             }
		  }
		
		
	});
       $('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_4')?>').datepicker({
	dateFormat: 'yy-mm-dd',
	
	changeYear: true,
	changeMonth: true,
	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
	    dayNames: ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
	    dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
	    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
	    onSelect: function(dateText, inst) {
		var lockDate = new Date($('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_4')?>').datepicker('getDate'));
		$('input#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_4')?>').datepicker('option', 'maxDate', lockDate);
		 },
		 onClose: function() { 
	 	    if ($('input#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_4')?>').val()!='')
             {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_4')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all   validate[required]");
         }else {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_4')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all ");
             }
		  }
		
});


//***********


$('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_5')?>').datepicker({
	autoHidePrompt: true,
	dateFormat: 'yy-mm-dd',
	
	changeYear: true,
	changeMonth: true,
	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
	    dayNames: ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
	    dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
	    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
	    onSelect: function(dateText, inst) {
		var lockDate = new Date($('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_5')?>').datepicker('getDate'));
		$('input#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_5')?>').datepicker('option', 'minDate', lockDate);
		},
		onClose: function() { 
	 	    if ($('input#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_5')?>').val()!='')
             {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_5')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all   validate[required]");
         }else {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_5')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all ");
             }
		  }
		
		
	});
       $('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_5')?>').datepicker({
	dateFormat: 'yy-mm-dd',
	
	changeYear: true,
	changeMonth: true,
	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
	    dayNames: ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
	    dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
	    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
	    onSelect: function(dateText, inst) {
		var lockDate = new Date($('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_5')?>').datepicker('getDate'));
		$('input#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_5')?>').datepicker('option', 'maxDate', lockDate);
		 },
		 onClose: function() { 
	 	    if ($('input#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_5')?>').val()!='')
             {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_5')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all   validate[required]");
         }else {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_5')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all ");
             }
		  }
		
});

//***********


$('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_6')?>').datepicker({
	autoHidePrompt: true,
	dateFormat: 'yy-mm-dd',
	
	changeYear: true,
	changeMonth: true,
	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
	    dayNames: ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
	    dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
	    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
	    onSelect: function(dateText, inst) {
		var lockDate = new Date($('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_6')?>').datepicker('getDate'));
		$('input#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_6')?>').datepicker('option', 'minDate', lockDate);
		},
		onClose: function() { 
	 	    if ($('input#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_6')?>').val()!='')
             {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_6')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all   validate[required]");
         }else {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_6')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all ");
             }
		  }
		
		
	});
       $('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_6')?>').datepicker({
	dateFormat: 'yy-mm-dd',
	
	changeYear: true,
	changeMonth: true,
	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
	    dayNames: ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
	    dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
	    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
	    onSelect: function(dateText, inst) {
		var lockDate = new Date($('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_6')?>').datepicker('getDate'));
		$('input#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_6')?>').datepicker('option', 'maxDate', lockDate);
		 },
		 onClose: function() { 
	 	    if ($('input#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_6')?>').val()!='')
             {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_6')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all   validate[required]");
         }else {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_6')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all ");
             }
		  }
		
});


//***********


$('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_7')?>').datepicker({
	autoHidePrompt: true,
	dateFormat: 'yy-mm-dd',
	
	changeYear: true,
	changeMonth: true,
	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
	    dayNames: ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
	    dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
	    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
	    onSelect: function(dateText, inst) {
		var lockDate = new Date($('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_7')?>').datepicker('getDate'));
		$('input#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_7')?>').datepicker('option', 'minDate', lockDate);
		},
		onClose: function() { 
	 	    if ($('input#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_7')?>').val()!='')
             {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_7')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all   validate[required]");
         }else {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_7')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all ");
             }
		  }
		
		
	});
       $('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_7')?>').datepicker({
	dateFormat: 'yy-mm-dd',
	
	changeYear: true,
	changeMonth: true,
	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
	    dayNames: ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
	    dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
	    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
	    onSelect: function(dateText, inst) {
		var lockDate = new Date($('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_7')?>').datepicker('getDate'));
		$('input#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_7')?>').datepicker('option', 'maxDate', lockDate);
		 },
		 onClose: function() { 
	 	    if ($('input#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_7')?>').val()!='')
             {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_7')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all   validate[required]");
         }else {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_7')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all ");
             }
		  }
		
});


//***********


$('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_8')?>').datepicker({
	autoHidePrompt: true,
	dateFormat: 'yy-mm-dd',
	
	changeYear: true,
	changeMonth: true,
	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
	    dayNames: ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
	    dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
	    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
	    onSelect: function(dateText, inst) {
		var lockDate = new Date($('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_8')?>').datepicker('getDate'));
		$('input#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_8')?>').datepicker('option', 'minDate', lockDate);
		},
		onClose: function() { 
	 	    if ($('input#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_8')?>').val()!='')
             {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_8')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all   validate[required]");
         }else {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_8')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all ");
             }
		  }
		
		
	});
       $('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_8')?>').datepicker({
	dateFormat: 'yy-mm-dd',
	
	changeYear: true,
	changeMonth: true,
	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
	    dayNames: ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
	    dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
	    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
	    onSelect: function(dateText, inst) {
		var lockDate = new Date($('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_8')?>').datepicker('getDate'));
		$('input#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_8')?>').datepicker('option', 'maxDate', lockDate);
		 },
		 onClose: function() { 
	 	    if ($('input#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_8')?>').val()!='')
             {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_8')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all   validate[required]");
         }else {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_8')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all ");
             }
		  }
		
});


//***********


$('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_9')?>').datepicker({
	autoHidePrompt: true,
	dateFormat: 'yy-mm-dd',
	
	changeYear: true,
	changeMonth: true,
	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
	    dayNames: ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
	    dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
	    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
	    onSelect: function(dateText, inst) {
		var lockDate = new Date($('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_9')?>').datepicker('getDate'));
		$('input#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_9')?>').datepicker('option', 'minDate', lockDate);
		},
		onClose: function() { 
	 	    if ($('input#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_9')?>').val()!='')
             {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_9')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all   validate[required]");
         }else {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_9')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all ");
             }
		  }
		
		
	});
       $('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_9')?>').datepicker({
	dateFormat: 'yy-mm-dd',
	
	changeYear: true,
	changeMonth: true,
	monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
	    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
	    dayNames: ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
	    dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
	    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
	    onSelect: function(dateText, inst) {
		var lockDate = new Date($('#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_9')?>').datepicker('getDate'));
		$('input#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_9')?>').datepicker('option', 'maxDate', lockDate);
		 },
		 onClose: function() { 
	 	    if ($('input#<?php echo $this->campoSeguro('funcionarioFechaSalidaExperiencia_9')?>').val()!='')
             {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_9')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all   validate[required]");
         }else {
                 $('#<?php echo $this->campoSeguro('funcionarioFechaEntradaExperiencia_9')?>').attr("class", "cuadroTexto ui-widget ui-widget-content ui-corner-all ");
             }
		  }
		
});
