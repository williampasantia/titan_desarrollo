<?php

/**
 *
 * Los datos del bloque se encuentran en el arreglo $esteBloque.
 */
/*
// URL base
$url = $this->miConfigurador->getVariableConfiguracion ( "host" );
$url .= $this->miConfigurador->getVariableConfiguracion ( "site" );
$url .= "/index.php?";

//Variables
$cadenaACodificar16 = "pagina=" . $this->miConfigurador->getVariableConfiguracion ( "pagina" );
$cadenaACodificar16 .= "&procesarAjax=true";
$cadenaACodificar16 .= "&action=index.php";
$cadenaACodificar16 .= "&bloqueNombre=" . $esteBloque ["nombre"];
$cadenaACodificar16 .= "&bloqueGrupo=" . $esteBloque ["grupo"];
$cadenaACodificar16 .= $cadenaACodificar16 . "&funcion=consultarDepartamento";
$cadenaACodificar16 .= "&tiempo=" . $_REQUEST ['tiempo'];

// Codificar las variables
$enlace = $this->miConfigurador->getVariableConfiguracion ( "enlace" );

echo "$enlace";
$cadena16 = $this->miConfigurador->fabricaConexiones->crypto->codificar_url ( $cadenaACodificar16, $enlace );

// URL definitiva
$urlFinal16 = $url . $cadena16;
//echo $urlFinal16; exit;*/
?>

<script>

function seleccionDoc(usuario){
	$("#<?php echo $this->campoSeguro('funcionarioDocumentoBusqueda') ?>").val(usuario);
	//alert("cLICK EN EL bOTON "+"<?php echo ' Hola ' ?> ->"+posicion);
}

function seleccionNom(nombre){
	$("#<?php echo $this->campoSeguro('funcionarioNombre') ?>").val(nombre);
}

function seleccionApe(apellido){
	$("#<?php echo $this->campoSeguro('funcionarioApellido') ?>").val(apellido);
}

$( "#<?php echo $this->campoSeguro('funcionarioFechaNacimiento')?>" ).datepicker({
	showButtonPanel: true,  /*added by oussama*/
    changeMonth: true, /*added by oussama*/
    changeYear: true, /*added by oussama*/
    dateFormat: 'yy-mm-dd',/*'dd/mm/yy'*/
    yearRange: "-99:+0",
    maxDate: "+0m +0d",
	onSelect: function(dateText) {
		
		var fecha=document.getElementById("<?php echo $this->campoSeguro('funcionarioFechaNacimiento')?>").value;

		var values=fecha.split("-");
	    var dia = values[2];
	    var mes = values[1];
	    var ano = values[0];

	    // tomamos los valores actuales

	    var fecha_hoy = new Date();
	    var ahora_ano = fecha_hoy.getYear();
	    var ahora_mes = fecha_hoy.getMonth()+1;
	    var ahora_dia = fecha_hoy.getDate();

	    // realizamos el calculo
	    var edad = (ahora_ano + 1900) - ano;
	    if ( ahora_mes < mes )
	    {
	        edad--;
	    }
	    if ((mes == ahora_mes) && (ahora_dia < dia))
	    {
	        edad--;
	    }

	    if (edad > 1900)
	    {
	        edad -= 1900;
	    }
	    $("#<?php echo $this->campoSeguro('funcionarioEdad') ?>").val(edad);
		//alert("Formato"); 
	} 
});

$(document).ready(function(){

	$("#contentDatos2").hide("fast");
	$("#contentDatos3").hide("fast");
	$("#contentDatos4").hide("fast");
	$("#contentDatos5").hide("fast");
	
	$("#mostrarb1").click(function(){
		$("#contentDatos1").show("slow");
	});

	$("#ocultarb1").click(function(){
		$("#contentDatos1").hide("slow");
	});

	$("#mostrarb2").click(function(){
		$("#contentDatos2").show("slow");
	});

	$("#ocultarb2").click(function(){
		$("#contentDatos2").hide("slow");
	});

	$("#mostrarb3").click(function(){
		$("#contentDatos3").show("slow");
	});

	$("#ocultarb3").click(function(){
		$("#contentDatos3").hide("slow");
	});

	$("#mostrarb4").click(function(){
		$("#contentDatos4").show("slow");
	});

	$("#ocultarb4").click(function(){
		$("#contentDatos4").hide("slow");
	});

	$("#mostrarb5").click(function(){
		$("#contentDatos5").show("slow");
	});

	$("#ocultarb5").click(function(){
		$("#contentDatos5").hide("slow");
	});

	$("#<?php echo $this->campoSeguro('botonGuardar')?>").click(function(){
		alert("entor");
		$("#contentDatos1").validationEngine({validateNonVisibleFields: true});
		$("#contentDatos2").validationEngine({validateNonVisibleFields: true});
		$("#contentDatos3").validationEngine({validateNonVisibleFields: true});
		$("#contentDatos4").validationEngine({validateNonVisibleFields: true});
		$("#contentDatos5").validationEngine({validateNonVisibleFields: true});
		$form.find("#bloqueFuncionario").validationEngine('updatePromptsPosition');
	});
	
});


//-------------------------------------Control Select UBICACIÓN Anidada Dependiente----------------------------
$( "#<?php echo $this->campoSeguro('funcionarioPaisNacimiento')?>" ).change(function() {
	//alert ('aaa');
    
    var valor = $("#<?php echo $this->campoSeguro('funcionarioPaisNacimiento')?>").val();
    if (valor >= 1){
    	$("#<?php echo $this->campoSeguro('funcionarioDepartamentoNacimiento')?>").removeAttr('disabled');
    	$("#<?php echo $this->campoSeguro('funcionarioDepartamentoNacimiento')?>").select2();
    }else{
		$("#<?php echo $this->campoSeguro('funcionarioDepartamentoNacimiento')?>").attr('disabled', true);
		$("#<?php echo $this->campoSeguro('funcionarioDepartamentoNacimiento')?>").select2();

		$("#<?php echo $this->campoSeguro('funcionarioCiudadNacimiento')?>").attr('disabled', true);
		$("#<?php echo $this->campoSeguro('funcionarioCiudadNacimiento')?>").select2();
    }
    //alert(valor);
    //var codigo = valor; 
});

$( "#<?php echo $this->campoSeguro('funcionarioDepartamentoNacimiento')?>" ).change(function() {
	//alert ('aaa');
    
    var valor = $("#<?php echo $this->campoSeguro('funcionarioDepartamentoNacimiento')?>").val();
    if(valor >= 1){
		$("#<?php echo $this->campoSeguro('funcionarioCiudadNacimiento')?>").removeAttr('disabled');
		$("#<?php echo $this->campoSeguro('funcionarioCiudadNacimiento')?>").select2();
	}else{
		$("#<?php echo $this->campoSeguro('funcionarioCiudadNacimiento')?>").attr('disabled', true);
		$("#<?php echo $this->campoSeguro('funcionarioCiudadNacimiento')?>").select2();
	}
    //alert(valor);
    //var codigo = valor; 
});
//---------------------------------------------------------------------------------------------------------

$( "#<?php echo $this->campoSeguro('funcionarioGenero')?>" ).change(function() {
	//alert ('aaa');
    
    var valor = $("#<?php echo $this->campoSeguro('funcionarioGenero')?>").val();
	if(valor == 1){
		$("#<?php echo $this->campoSeguro('funcionarioTipoLibreta')?>").removeAttr('disabled');
		$("#<?php echo $this->campoSeguro('funcionarioTipoLibreta')?>").select2();

		$("#<?php echo $this->campoSeguro('funcionarioNumeroLibreta')?>").attr("readonly", false);
		$("#<?php echo $this->campoSeguro('funcionarioDistritoLibreta')?>").attr("readonly", false);
		$("#<?php echo $this->campoSeguro('funcionarioSoporteLibreta')?>").prop('disabled', false);
	}else{
		$("#<?php echo $this->campoSeguro('funcionarioTipoLibreta')?>").val(-1);
		$("#<?php echo $this->campoSeguro('funcionarioTipoLibreta')?>").attr('disabled', true);
		$("#<?php echo $this->campoSeguro('funcionarioTipoLibreta')?>").select2();

		$("#<?php echo $this->campoSeguro('funcionarioNumeroLibreta')?>").attr("readonly", true);
		$("#<?php echo $this->campoSeguro('funcionarioNumeroLibreta')?>").val(' ');
		$("#<?php echo $this->campoSeguro('funcionarioDistritoLibreta')?>").attr("readonly", true);
		$("#<?php echo $this->campoSeguro('funcionarioDistritoLibreta')?>").val(' ');
		$("#<?php echo $this->campoSeguro('funcionarioSoporteLibreta')?>").prop('disabled', true);
		$("#<?php echo $this->campoSeguro('funcionarioSoporteLibreta')?>").val(' ');
	}
    //alert(valor);
    //var codigo = valor; 
});


//---------------------------------------------------------------------------------------------------------
</script>