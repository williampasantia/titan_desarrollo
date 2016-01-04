$( document ).ready(function() {
	
	var campoFecha = [];
	var campoFechaInput = [];
	
	var IFechaA = 0;
	var IFechaB= 0;
	var contFecha = 0;
	
	campoFecha[IFechaA++] = "#<?php echo $this->campoSeguro('funcionarioFechaExpDoc')?>";
	campoFechaInput[IFechaB++] = "input#<?php echo $this->campoSeguro('funcionarioFechaExpDoc')?>";
	
	campoFecha[IFechaA++] = "#<?php echo $this->campoSeguro('funcionarioFechaNacimiento')?>";
	campoFechaInput[IFechaB++] = "input#<?php echo $this->campoSeguro('funcionarioFechaNacimiento')?>";
	
	campoFecha[IFechaA++] = "#<?php echo $this->campoSeguro('funcionarioFechaFormacionBasica')?>";
	campoFechaInput[IFechaB++] = "input#<?php echo $this->campoSeguro('funcionarioFechaFormacionBasica')?>";
	
	campoFecha[IFechaA++] = "#<?php echo $this->campoSeguro('funcionarioFechaFormacionMedia')?>";
	campoFechaInput[IFechaB++] = "input#<?php echo $this->campoSeguro('funcionarioFechaFormacionMedia')?>";
	
	$(campoFecha).each(function(){
		$(this.valueOf()).datepicker({
			dateFormat: 'yy-mm-dd',
			maxDate: 0,
			yearRange: '-50:+0',
			changeYear: true,
			changeMonth: true,
			monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
			'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
			monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
			dayNames: ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],
			dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
			dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
			onSelect: function(dateText, inst) {
				var lockDate = new Date($(this.valueOf()).datepicker('getDate'));
			}, onClose: function() { 
				}
		})
	});
	
	
	$("#<?php echo $this->campoSeguro('funcionarioContactoPais')?>").width(250); 
	$("#<?php echo $this->campoSeguro('funcionarioContactoPais')?>").select2();
	$("#<?php echo $this->campoSeguro('funcionarioContactoDepartamento')?>").width(250); 
	$("#<?php echo $this->campoSeguro('funcionarioContactoDepartamento')?>").select2();
	$("#<?php echo $this->campoSeguro('funcionarioContactoCiudad')?>").width(250); 
	$("#<?php echo $this->campoSeguro('funcionarioContactoCiudad')?>").select2();
	$("#<?php echo $this->campoSeguro('funcionarioContactoEstrato')?>").select2();


	$("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorModalidad')?>").width(250); 
	$("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorModalidad')?>").select2();


});