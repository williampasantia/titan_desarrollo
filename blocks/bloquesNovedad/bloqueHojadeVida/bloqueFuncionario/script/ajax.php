<?php

/**
 *
 * Los datos del bloque se encuentran en el arreglo $esteBloque.
 */

// Campos Superior DEPENDIENTE Limite Campos

$LimiteCamposSuperior = 5; //Tener Pendiente

$i = 0; $control = $LimiteCamposSuperior * 2;
while($i < $control){
	
	// URL base
	$url = $this->miConfigurador->getVariableConfiguracion ( "host" );
	$url .= $this->miConfigurador->getVariableConfiguracion ( "site" );
	$url .= "/index.php?";
	
	//Variables
	$cadenaACodificarS[$i] = "pagina=" . $this->miConfigurador->getVariableConfiguracion ( "pagina" );
	$cadenaACodificarS[$i] .= "&procesarAjax=true";
	$cadenaACodificarS[$i] .= "&action=index.php";
	$cadenaACodificarS[$i] .= "&bloqueNombre=" . $esteBloque ["nombre"];
	$cadenaACodificarS[$i] .= "&bloqueGrupo=" . $esteBloque ["grupo"];
	
	if ($i%2==0){
		$cadenaACodificarS[$i] .= $cadenaACodificarS[$i] . "&funcion=consultarDepartamentoAjax";
	}else{
		$cadenaACodificarS[$i] .= $cadenaACodificarS[$i] . "&funcion=consultarCiudadAjax";
	}
	$cadenaACodificarS[$i] .= "&tiempo=" . $_REQUEST ['tiempo'];
	
	// Codificar las variables
	$enlace = $this->miConfigurador->getVariableConfiguracion ( "enlace" );
	
	$cadenaS[$i] = $this->miConfigurador->fabricaConexiones->crypto->codificar_url ( $cadenaACodificarS[$i], $enlace );
	
	// URL definitiva
	$urlFinalS[$i] = $url . $cadenaS[$i];
	
	$i++;
}


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
$cadenaACodificar16 .= $cadenaACodificar16 . "&funcion=consultarDepartamentoAjax";
$cadenaACodificar16 .= "&tiempo=" . $_REQUEST ['tiempo'];

// Codificar las variables
$enlace = $this->miConfigurador->getVariableConfiguracion ( "enlace" );

$cadena16 = $this->miConfigurador->fabricaConexiones->crypto->codificar_url ( $cadenaACodificar16, $enlace );

// URL definitiva
$urlFinal16 = $url . $cadena16;
//echo $urlFinal16; exit;


// URL base
$url = $this->miConfigurador->getVariableConfiguracion ( "host" );
$url .= $this->miConfigurador->getVariableConfiguracion ( "site" );
$url .= "/index.php?";

//Variables
$cadenaACodificar17 = "pagina=" . $this->miConfigurador->getVariableConfiguracion ( "pagina" );
$cadenaACodificar17 .= "&procesarAjax=true";
$cadenaACodificar17 .= "&action=index.php";
$cadenaACodificar17 .= "&bloqueNombre=" . $esteBloque ["nombre"];
$cadenaACodificar17 .= "&bloqueGrupo=" . $esteBloque ["grupo"];
$cadenaACodificar17 .= $cadenaACodificar17 . "&funcion=consultarCiudadAjax";
$cadenaACodificar17 .= "&tiempo=" . $_REQUEST ['tiempo'];

// Codificar las variables
$enlace = $this->miConfigurador->getVariableConfiguracion ( "enlace" );

$cadena17 = $this->miConfigurador->fabricaConexiones->crypto->codificar_url ( $cadenaACodificar17, $enlace );

// URL definitiva
$urlFinal17 = $url . $cadena17;
//echo $urlFinal16; exit;


// URL base
$url = $this->miConfigurador->getVariableConfiguracion ( "host" );
$url .= $this->miConfigurador->getVariableConfiguracion ( "site" );
$url .= "/index.php?";

//Variables
$cadenaACodificar18 = "pagina=" . $this->miConfigurador->getVariableConfiguracion ( "pagina" );
$cadenaACodificar18 .= "&procesarAjax=true";
$cadenaACodificar18 .= "&action=index.php";
$cadenaACodificar18 .= "&bloqueNombre=" . $esteBloque ["nombre"];
$cadenaACodificar18 .= "&bloqueGrupo=" . $esteBloque ["grupo"];
$cadenaACodificar18 .= $cadenaACodificar18 . "&funcion=consultarDepartamentoAjax";
$cadenaACodificar18 .= "&tiempo=" . $_REQUEST ['tiempo'];

// Codificar las variables
$enlace = $this->miConfigurador->getVariableConfiguracion ( "enlace" );

$cadena18 = $this->miConfigurador->fabricaConexiones->crypto->codificar_url ( $cadenaACodificar18, $enlace );

// URL definitiva
$urlFinal18 = $url . $cadena18;
//echo $urlFinal16; exit;


// URL base
$url = $this->miConfigurador->getVariableConfiguracion ( "host" );
$url .= $this->miConfigurador->getVariableConfiguracion ( "site" );
$url .= "/index.php?";

//Variables
$cadenaACodificar19 = "pagina=" . $this->miConfigurador->getVariableConfiguracion ( "pagina" );
$cadenaACodificar19 .= "&procesarAjax=true";
$cadenaACodificar19 .= "&action=index.php";
$cadenaACodificar19 .= "&bloqueNombre=" . $esteBloque ["nombre"];
$cadenaACodificar19 .= "&bloqueGrupo=" . $esteBloque ["grupo"];
$cadenaACodificar19 .= $cadenaACodificar19 . "&funcion=consultarCiudadAjax";
$cadenaACodificar19 .= "&tiempo=" . $_REQUEST ['tiempo'];

// Codificar las variables
$enlace = $this->miConfigurador->getVariableConfiguracion ( "enlace" );

$cadena19 = $this->miConfigurador->fabricaConexiones->crypto->codificar_url ( $cadenaACodificar19, $enlace );

// URL definitiva
$urlFinal19 = $url . $cadena19;
//echo $urlFinal16; exit;


// URL base
$url = $this->miConfigurador->getVariableConfiguracion ( "host" );
$url .= $this->miConfigurador->getVariableConfiguracion ( "site" );
$url .= "/index.php?";

//Variables
$cadenaACodificar20 = "pagina=" . $this->miConfigurador->getVariableConfiguracion ( "pagina" );
$cadenaACodificar20 .= "&procesarAjax=true";
$cadenaACodificar20 .= "&action=index.php";
$cadenaACodificar20 .= "&bloqueNombre=" . $esteBloque ["nombre"];
$cadenaACodificar20 .= "&bloqueGrupo=" . $esteBloque ["grupo"];
$cadenaACodificar20 .= $cadenaACodificar20 . "&funcion=consultarDepartamentoAjax";
$cadenaACodificar20 .= "&tiempo=" . $_REQUEST ['tiempo'];

// Codificar las variables
$enlace = $this->miConfigurador->getVariableConfiguracion ( "enlace" );

$cadena20 = $this->miConfigurador->fabricaConexiones->crypto->codificar_url ( $cadenaACodificar20, $enlace );

// URL definitiva
$urlFinal20 = $url . $cadena20;
//echo $urlFinal16; exit;


// URL base
$url = $this->miConfigurador->getVariableConfiguracion ( "host" );
$url .= $this->miConfigurador->getVariableConfiguracion ( "site" );
$url .= "/index.php?";

//Variables
$cadenaACodificar21 = "pagina=" . $this->miConfigurador->getVariableConfiguracion ( "pagina" );
$cadenaACodificar21 .= "&procesarAjax=true";
$cadenaACodificar21 .= "&action=index.php";
$cadenaACodificar21 .= "&bloqueNombre=" . $esteBloque ["nombre"];
$cadenaACodificar21 .= "&bloqueGrupo=" . $esteBloque ["grupo"];
$cadenaACodificar21 .= $cadenaACodificar21 . "&funcion=consultarCiudadAjax";
$cadenaACodificar21 .= "&tiempo=" . $_REQUEST ['tiempo'];

// Codificar las variables
$enlace = $this->miConfigurador->getVariableConfiguracion ( "enlace" );

$cadena21 = $this->miConfigurador->fabricaConexiones->crypto->codificar_url ( $cadenaACodificar21, $enlace );

// URL definitiva
$urlFinal21 = $url . $cadena21;
//echo $urlFinal16; exit;


// URL base
$url = $this->miConfigurador->getVariableConfiguracion ( "host" );
$url .= $this->miConfigurador->getVariableConfiguracion ( "site" );
$url .= "/index.php?";

//Variables
$cadenaACodificar22 = "pagina=" . $this->miConfigurador->getVariableConfiguracion ( "pagina" );
$cadenaACodificar22 .= "&procesarAjax=true";
$cadenaACodificar22 .= "&action=index.php";
$cadenaACodificar22 .= "&bloqueNombre=" . $esteBloque ["nombre"];
$cadenaACodificar22 .= "&bloqueGrupo=" . $esteBloque ["grupo"];
$cadenaACodificar22 .= $cadenaACodificar22 . "&funcion=consultarDepartamentoAjax";
$cadenaACodificar22 .= "&tiempo=" . $_REQUEST ['tiempo'];

// Codificar las variables
$enlace = $this->miConfigurador->getVariableConfiguracion ( "enlace" );

$cadena22 = $this->miConfigurador->fabricaConexiones->crypto->codificar_url ( $cadenaACodificar22, $enlace );

// URL definitiva
$urlFinal22 = $url . $cadena22;
//echo $urlFinal16; exit;


// URL base
$url = $this->miConfigurador->getVariableConfiguracion ( "host" );
$url .= $this->miConfigurador->getVariableConfiguracion ( "site" );
$url .= "/index.php?";

//Variables
$cadenaACodificar23 = "pagina=" . $this->miConfigurador->getVariableConfiguracion ( "pagina" );
$cadenaACodificar23 .= "&procesarAjax=true";
$cadenaACodificar23 .= "&action=index.php";
$cadenaACodificar23 .= "&bloqueNombre=" . $esteBloque ["nombre"];
$cadenaACodificar23 .= "&bloqueGrupo=" . $esteBloque ["grupo"];
$cadenaACodificar23 .= $cadenaACodificar23 . "&funcion=consultarCiudadAjax";
$cadenaACodificar23 .= "&tiempo=" . $_REQUEST ['tiempo'];

// Codificar las variables
$enlace = $this->miConfigurador->getVariableConfiguracion ( "enlace" );

$cadena23 = $this->miConfigurador->fabricaConexiones->crypto->codificar_url ( $cadenaACodificar23, $enlace );

// URL definitiva
$urlFinal23 = $url . $cadena23;
//echo $urlFinal16; exit;



// URL base
$url = $this->miConfigurador->getVariableConfiguracion ( "host" );
$url .= $this->miConfigurador->getVariableConfiguracion ( "site" );
$url .= "/index.php?";

//Variables
$cadenaACodificar24 = "pagina=" . $this->miConfigurador->getVariableConfiguracion ( "pagina" );
$cadenaACodificar24 .= "&procesarAjax=true";
$cadenaACodificar24 .= "&action=index.php";
$cadenaACodificar24 .= "&bloqueNombre=" . $esteBloque ["nombre"];
$cadenaACodificar24 .= "&bloqueGrupo=" . $esteBloque ["grupo"];
$cadenaACodificar24 .= $cadenaACodificar24 . "&funcion=consultarDepartamentoAjax";
$cadenaACodificar24 .= "&tiempo=" . $_REQUEST ['tiempo'];

// Codificar las variables
$enlace = $this->miConfigurador->getVariableConfiguracion ( "enlace" );

$cadena24 = $this->miConfigurador->fabricaConexiones->crypto->codificar_url ( $cadenaACodificar24, $enlace );

// URL definitiva
$urlFinal24 = $url . $cadena24;
//echo $urlFinal16; exit;


// URL base
$url = $this->miConfigurador->getVariableConfiguracion ( "host" );
$url .= $this->miConfigurador->getVariableConfiguracion ( "site" );
$url .= "/index.php?";

//Variables
$cadenaACodificar25 = "pagina=" . $this->miConfigurador->getVariableConfiguracion ( "pagina" );
$cadenaACodificar25 .= "&procesarAjax=true";
$cadenaACodificar25 .= "&action=index.php";
$cadenaACodificar25 .= "&bloqueNombre=" . $esteBloque ["nombre"];
$cadenaACodificar25 .= "&bloqueGrupo=" . $esteBloque ["grupo"];
$cadenaACodificar25 .= $cadenaACodificar25 . "&funcion=consultarCiudadAjax";
$cadenaACodificar25 .= "&tiempo=" . $_REQUEST ['tiempo'];

// Codificar las variables
$enlace = $this->miConfigurador->getVariableConfiguracion ( "enlace" );

$cadena25 = $this->miConfigurador->fabricaConexiones->crypto->codificar_url ( $cadenaACodificar25, $enlace );

// URL definitiva
$urlFinal25 = $url . $cadena25;
//echo $urlFinal16; exit;
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

	$("#bloqueFuncionario").validationEngine();

	$("#bloqueFuncionario").validationEngine({
		validateNonVisibleFields: true,
	    updatePromptsPosition:true
	});
	
	$("#novedadesDatosPersonales").hide("fast");
	$("#novedadesDatosCiudadania").hide("fast");
	$("#novedadesDatosFormacionAcademica").hide("fast");
	$("#novedadesDatosExperiencia").hide("fast");
	
	$("#ocultarb1").click(function(){
		$("#novedadesIdentificacion").hide("fast");
		$("#novedadesDatosPersonales").show("fast");
	});

	$("#mostrarb2").click(function(){
		$("#novedadesIdentificacion").show("fast");
		$("#novedadesDatosPersonales").hide("fast");
	});

	$("#ocultarb2").click(function(){
		$("#novedadesDatosCiudadania").show("fast");
		$("#novedadesDatosPersonales").hide("fast");
	});

	$("#mostrarb3").click(function(){
		$("#novedadesDatosCiudadania").hide("fast");
		$("#novedadesDatosPersonales").show("fast");
	});

	$("#ocultarb3").click(function(){
		$("#novedadesDatosCiudadania").hide("fast");
		$("#novedadesDatosFormacionAcademica").show("fast");
	});

	$("#mostrarb4").click(function(){
		$("#novedadesDatosCiudadania").show("fast");
		$("#novedadesDatosFormacionAcademica").hide("fast");
	});

	$("#ocultarb4").click(function(){
		$("#novedadesDatosFormacionAcademica").hide("fast");
		$("#novedadesDatosExperiencia").show("fast");
	});

	$("#mostrarb5").click(function(){
		$("#novedadesDatosFormacionAcademica").show("fast");
		$("#novedadesDatosExperiencia").hide("fast");
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

	$("#<?php echo $this->campoSeguro('botonSiguiente')?>").click(function(){
		//alert("entor");
		$("#contentDatos1").validationEngine({validateNonVisibleFields: true});
		$form.find("#bloqueFuncionario").validationEngine('updatePromptsPosition');
	});

	$("#<?php echo $this->campoSeguro('botonSiguienteDos')?>").click(function(){
		//alert("entor");
		$("#contentDatos1").validationEngine({validateNonVisibleFields: true});
		$("#contentDatos2").validationEngine({validateNonVisibleFields: true});
		$form.find("#bloqueFuncionario").validationEngine('updatePromptsPosition');
		
	});
	
	$("#<?php echo $this->campoSeguro('botonSiguienteTres')?>").click(function(){
		//alert("entor");
		$("#contentDatos1").validationEngine({validateNonVisibleFields: true});
		$("#contentDatos2").validationEngine({validateNonVisibleFields: true});
		$("#contentDatos3").validationEngine({validateNonVisibleFields: true});
		$form.find("#bloqueFuncionario").validationEngine('updatePromptsPosition');
	});

	$("#<?php echo $this->campoSeguro('botonSiguienteCuatro')?>").click(function(){
		//alert("entor");
		$("#contentDatos1").validationEngine({validateNonVisibleFields: true});
		$("#contentDatos2").validationEngine({validateNonVisibleFields: true});
		$("#contentDatos3").validationEngine({validateNonVisibleFields: true});
		$("#contentDatos4").validationEngine({validateNonVisibleFields: true});
		$form.find("#bloqueFuncionario").validationEngine('updatePromptsPosition');
	});

	$("#<?php echo $this->campoSeguro('botonSiguienteCuatroD1')?>").click(function(){
		//alert("entor");
		$("#bloqueFuncionario").validationEngine({
			promptPosition : "centerRight",
			scroll: false,
			autoHidePrompt: true,
			autoHideDelay: 2000,
			validateNonVisibleFields: true,
		    updatePromptsPosition:true
		});
	});


	//*****************************EDUCACION SUPERIOR**********************************************

    var iCntSup = 0;
    var LimiteSuperior = 5;//Tener Presente

    while(iCntSup < LimiteSuperior){
        $("#novedadesDatosCantidadEduacionSuperior_"+iCntSup).hide("fast");
        iCntSup = iCntSup + 1;
    }

    iCntSup = 0;
     
    $('#btAdd').click(function() {

        if (iCntSup < LimiteSuperior) {

            $("#novedadesDatosCantidadEduacionSuperior_"+iCntSup).show("fast");
     
            iCntSup = iCntSup + 1;
        }
        else {
            $('#btAdd').attr('disabled', 'disabled');
        }

        $("#<?php echo $this->campoSeguro('funcionarioRegistrosSuperior') ?>").val(iCntSup);
    });
     
    $('#btRemove').click(function() { // Elimina un elemento por click
        if (iCntSup != 0) {
            iCntSup = iCntSup - 1;  
            $("#novedadesDatosCantidadEduacionSuperior_"+iCntSup).hide("fast");
            $('#btAdd').removeAttr('disabled');
        }
     
        if (iCntSup == 0) { 

            $('#btAdd').removeAttr('disabled');
     
        }
        $("#<?php echo $this->campoSeguro('funcionarioRegistrosSuperior') ?>").val(iCntSup);
    });

    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorModalidad_0')?>").width(200); 
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorModalidad_0')?>").select2();
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorModalidad_1')?>").width(200); 
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorModalidad_1')?>").select2();
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorModalidad_2')?>").width(200); 
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorModalidad_2')?>").select2();
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorModalidad_3')?>").width(200); 
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorModalidad_3')?>").select2();
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorModalidad_4')?>").width(200); 
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorModalidad_4')?>").select2();

    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorGraduado_0')?>").width(200); 
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorGraduado_0')?>").select2();
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorGraduado_1')?>").width(200); 
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorGraduado_1')?>").select2();
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorGraduado_2')?>").width(200); 
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorGraduado_2')?>").select2();
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorGraduado_3')?>").width(200); 
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorGraduado_3')?>").select2();
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorGraduado_4')?>").width(200); 
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorGraduado_4')?>").select2();

    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorPais_0')?>").width(250); 
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorPais_0')?>").select2();
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorPais_1')?>").width(250); 
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorPais_1')?>").select2();
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorPais_2')?>").width(250); 
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorPais_2')?>").select2();
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorPais_3')?>").width(250); 
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorPais_3')?>").select2();
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorPais_4')?>").width(250); 
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorPais_4')?>").select2();

    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_0')?>").width(250); 
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_0')?>").select2();
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_1')?>").width(250); 
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_1')?>").select2();
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_2')?>").width(250); 
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_2')?>").select2();
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_3')?>").width(250); 
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_3')?>").select2();
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_4')?>").width(250); 
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_4')?>").select2();

    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorCiudad_0')?>").width(250); 
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorCiudad_0')?>").select2();
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorCiudad_1')?>").width(250); 
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorCiudad_1')?>").select2();
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorCiudad_2')?>").width(250); 
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorCiudad_2')?>").select2();
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorCiudad_3')?>").width(250); 
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorCiudad_3')?>").select2();
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorCiudad_4')?>").width(250); 
    $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorCiudad_4')?>").select2();


    //***********************************************************************************************

	

	$("#<?php echo $this->campoSeguro('funcionarioPaisNacimiento')?>").width(250); 
	$("#<?php echo $this->campoSeguro('funcionarioPaisNacimiento')?>").select2();
	$("#<?php echo $this->campoSeguro('funcionarioDepartamentoNacimiento')?>").width(250); 
	$("#<?php echo $this->campoSeguro('funcionarioDepartamentoNacimiento')?>").select2();
	$("#<?php echo $this->campoSeguro('funcionarioCiudadNacimiento')?>").width(250); 
	$("#<?php echo $this->campoSeguro('funcionarioCiudadNacimiento')?>").select2();
	
	$("#<?php echo $this->campoSeguro('funcionarioGenero')?>").select2();
	$("#<?php echo $this->campoSeguro('funcionarioEstadoCivil')?>").select2();
	$("#<?php echo $this->campoSeguro('funcionarioTipoSangre')?>").select2();
	$("#<?php echo $this->campoSeguro('funcionarioSangreRH')?>").select2();
	$("#<?php echo $this->campoSeguro('funcionarioTipoLibreta')?>").select2();

	$("#<?php echo $this->campoSeguro('funcionarioGrupoEtnico')?>").width(200); 
	$("#<?php echo $this->campoSeguro('funcionarioGrupoEtnico')?>").select2();
	$("#<?php echo $this->campoSeguro('funcionarioGrupoLGBT')?>").select2();
	$("#<?php echo $this->campoSeguro('funcionarioCabezaFamilia')?>").select2();
	$("#<?php echo $this->campoSeguro('funcionarioPersonasCargo')?>").select2();


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


function consultarDepartamento(elem, request, response){
	  $.ajax({
	    url: "<?php echo $urlFinal16?>",
	    dataType: "json",
	    data: { valor:$("#<?php echo $this->campoSeguro('funcionarioPais')?>").val()},
	    success: function(data){ 



	        if(data[0]!=" "){

	            $("#<?php echo $this->campoSeguro('funcionarioDepartamento')?>").html('');
	            $("<option value=''>Seleccione  ....</option>").appendTo("#<?php echo $this->campoSeguro('funcionarioDepartamento')?>");
	            $.each(data , function(indice,valor){

	            	$("<option value='"+data[ indice ].id_departamento+"'>"+data[ indice ].nombre+"</option>").appendTo("#<?php echo $this->campoSeguro('funcionarioDepartamento')?>");
	            	
	            });
	            
	            $("#<?php echo $this->campoSeguro('funcionarioDepartamento')?>").removeAttr('disabled');
	            
	            //$('#<?php echo $this->campoSeguro('funcionarioDepartamento')?>').width(250);
	            $("#<?php echo $this->campoSeguro('funcionarioDepartamento')?>").select2();
	            
	            $("#<?php echo $this->campoSeguro('funcionarioDepartamento')?>").removeClass("validate[required]");
	            
		        }
	    			

	    }
		                    
	   });
	};


	function consultarCiudad(elem, request, response){
		  $.ajax({
		    url: "<?php echo $urlFinal17?>",
		    dataType: "json",
		    data: { valor:$("#<?php echo $this->campoSeguro('funcionarioDepartamento')?>").val()},
		    success: function(data){ 



		        if(data[0]!=" "){

		            $("#<?php echo $this->campoSeguro('funcionarioCiudad')?>").html('');
		            $("<option value=''>Seleccione  ....</option>").appendTo("#<?php echo $this->campoSeguro('funcionarioCiudad')?>");
		            $.each(data , function(indice,valor){

		            	$("<option value='"+data[ indice ].id_ciudad+"'>"+data[ indice ].nombreciudad+"</option>").appendTo("#<?php echo $this->campoSeguro('funcionarioCiudad')?>");
		            	
		            });
		            
		            $("#<?php echo $this->campoSeguro('funcionarioCiudad')?>").removeAttr('disabled');
		            
		            //$('#<?php echo $this->campoSeguro('funcionarioCiudad')?>').width(250);
		            $("#<?php echo $this->campoSeguro('funcionarioCiudad')?>").select2();
		            
		            $("#<?php echo $this->campoSeguro('funcionarioCiudad')?>").removeClass("validate[required]");
		            
			        }
		    			

		    }
			                    
		   });
		};



		function consultarDepartamentoNac(elem, request, response){
			  $.ajax({
			    url: "<?php echo $urlFinal18?>",
			    dataType: "json",
			    data: { valor:$("#<?php echo $this->campoSeguro('funcionarioPaisNacimiento')?>").val()},
			    success: function(data){ 



			        if(data[0]!=" "){

			            $("#<?php echo $this->campoSeguro('funcionarioDepartamentoNacimiento')?>").html('');
			            $("<option value=''>Seleccione  ....</option>").appendTo("#<?php echo $this->campoSeguro('funcionarioDepartamentoNacimiento')?>");
			            $.each(data , function(indice,valor){

			            	$("<option value='"+data[ indice ].id_departamento+"'>"+data[ indice ].nombre+"</option>").appendTo("#<?php echo $this->campoSeguro('funcionarioDepartamentoNacimiento')?>");
			            	
			            });
			            
			            $("#<?php echo $this->campoSeguro('funcionarioDepartamentoNacimiento')?>").removeAttr('disabled');
			            
			            //$('#<?php echo $this->campoSeguro('funcionarioDepartamentoNacimiento')?>').width(250);
			            $("#<?php echo $this->campoSeguro('funcionarioDepartamentoNacimiento')?>").select2();
			            
			            $("#<?php echo $this->campoSeguro('funcionarioDepartamentoNacimiento')?>").removeClass("validate[required]");
			            
				        }
			    			

			    }
				                    
			   });
			};


			function consultarCiudadNac(elem, request, response){
				  $.ajax({
				    url: "<?php echo $urlFinal19?>",
				    dataType: "json",
				    data: { valor:$("#<?php echo $this->campoSeguro('funcionarioDepartamentoNacimiento')?>").val()},
				    success: function(data){ 



				        if(data[0]!=" "){

				            $("#<?php echo $this->campoSeguro('funcionarioCiudadNacimiento')?>").html('');
				            $("<option value=''>Seleccione  ....</option>").appendTo("#<?php echo $this->campoSeguro('funcionarioCiudadNacimiento')?>");
				            $.each(data , function(indice,valor){

				            	$("<option value='"+data[ indice ].id_ciudad+"'>"+data[ indice ].nombreciudad+"</option>").appendTo("#<?php echo $this->campoSeguro('funcionarioCiudadNacimiento')?>");
				            	
				            });
				            
				            $("#<?php echo $this->campoSeguro('funcionarioCiudadNacimiento')?>").removeAttr('disabled');
				            
				            //$('#<?php echo $this->campoSeguro('funcionarioCiudadNacimiento')?>').width(250);
				            $("#<?php echo $this->campoSeguro('funcionarioCiudadNacimiento')?>").select2();
				            
				            $("#<?php echo $this->campoSeguro('funcionarioCiudadNacimiento')?>").removeClass("validate[required]");
				            
					        }
				    			

				    }
					                    
				   });
				};



				function consultarDepartamentoCon(elem, request, response){
					  $.ajax({
					    url: "<?php echo $urlFinal20?>",
					    dataType: "json",
					    data: { valor:$("#<?php echo $this->campoSeguro('funcionarioContactoPais')?>").val()},
					    success: function(data){ 



					        if(data[0]!=" "){

					            $("#<?php echo $this->campoSeguro('funcionarioContactoDepartamento')?>").html('');
					            $("<option value=''>Seleccione  ....</option>").appendTo("#<?php echo $this->campoSeguro('funcionarioContactoDepartamento')?>");
					            $.each(data , function(indice,valor){

					            	$("<option value='"+data[ indice ].id_departamento+"'>"+data[ indice ].nombre+"</option>").appendTo("#<?php echo $this->campoSeguro('funcionarioContactoDepartamento')?>");
					            	
					            });
					            
					            $("#<?php echo $this->campoSeguro('funcionarioContactoDepartamento')?>").removeAttr('disabled');
					            
					            //$('#<?php echo $this->campoSeguro('funcionarioContactoDepartamento')?>').width(250);
					            $("#<?php echo $this->campoSeguro('funcionarioContactoDepartamento')?>").select2();
					            
					            $("#<?php echo $this->campoSeguro('funcionarioContactoDepartamento')?>").removeClass("validate[required]");
					            
						        }
					    			

					    }
						                    
					   });
					};


					function consultarCiudadCon(elem, request, response){
						  $.ajax({
						    url: "<?php echo $urlFinal21?>",
						    dataType: "json",
						    data: { valor:$("#<?php echo $this->campoSeguro('funcionarioContactoDepartamento')?>").val()},
						    success: function(data){ 



						        if(data[0]!=" "){

						            $("#<?php echo $this->campoSeguro('funcionarioContactoCiudad')?>").html('');
						            $("<option value=''>Seleccione  ....</option>").appendTo("#<?php echo $this->campoSeguro('funcionarioContactoCiudad')?>");
						            $.each(data , function(indice,valor){

						            	$("<option value='"+data[ indice ].id_ciudad+"'>"+data[ indice ].nombreciudad+"</option>").appendTo("#<?php echo $this->campoSeguro('funcionarioContactoCiudad')?>");
						            	
						            });
						            
						            $("#<?php echo $this->campoSeguro('funcionarioContactoCiudad')?>").removeAttr('disabled');
						            
						            //$('#<?php echo $this->campoSeguro('funcionarioContactoCiudad')?>').width(250);
						            $("#<?php echo $this->campoSeguro('funcionarioContactoCiudad')?>").select2();
						            
						            $("#<?php echo $this->campoSeguro('funcionarioContactoCiudad')?>").removeClass("validate[required]");
						            
							        }
						    			

						    }
							                    
						   });
						};	
	

						function consultarDepartamentoBas(elem, request, response){
							  $.ajax({
							    url: "<?php echo $urlFinal22?>",
							    dataType: "json",
							    data: { valor:$("#<?php echo $this->campoSeguro('funcionarioFormacionBasicaPais')?>").val()},
							    success: function(data){ 



							        if(data[0]!=" "){

							            $("#<?php echo $this->campoSeguro('funcionarioFormacionBasicaDepartamento')?>").html('');
							            $("<option value=''>Seleccione  ....</option>").appendTo("#<?php echo $this->campoSeguro('funcionarioFormacionBasicaDepartamento')?>");
							            $.each(data , function(indice,valor){

							            	$("<option value='"+data[ indice ].id_departamento+"'>"+data[ indice ].nombre+"</option>").appendTo("#<?php echo $this->campoSeguro('funcionarioFormacionBasicaDepartamento')?>");
							            	
							            });
							            
							            $("#<?php echo $this->campoSeguro('funcionarioFormacionBasicaDepartamento')?>").removeAttr('disabled');
							            
							            //$('#<?php echo $this->campoSeguro('funcionarioFormacionBasicaDepartamento')?>').width(250);
							            $("#<?php echo $this->campoSeguro('funcionarioFormacionBasicaDepartamento')?>").select2();
							            
							            $("#<?php echo $this->campoSeguro('funcionarioFormacionBasicaDepartamento')?>").removeClass("validate[required]");
							            
								        }
							    			

							    }
								                    
							   });
							};


							function consultarCiudadBas(elem, request, response){
								  $.ajax({
								    url: "<?php echo $urlFinal23?>",
								    dataType: "json",
								    data: { valor:$("#<?php echo $this->campoSeguro('funcionarioFormacionBasicaDepartamento')?>").val()},
								    success: function(data){ 



								        if(data[0]!=" "){

								            $("#<?php echo $this->campoSeguro('funcionarioFormacionBasicaCiudad')?>").html('');
								            $("<option value=''>Seleccione  ....</option>").appendTo("#<?php echo $this->campoSeguro('funcionarioFormacionBasicaCiudad')?>");
								            $.each(data , function(indice,valor){

								            	$("<option value='"+data[ indice ].id_ciudad+"'>"+data[ indice ].nombreciudad+"</option>").appendTo("#<?php echo $this->campoSeguro('funcionarioFormacionBasicaCiudad')?>");
								            	
								            });
								            
								            $("#<?php echo $this->campoSeguro('funcionarioFormacionBasicaCiudad')?>").removeAttr('disabled');
								            
								            //$('#<?php echo $this->campoSeguro('funcionarioFormacionBasicaCiudad')?>').width(250);
								            $("#<?php echo $this->campoSeguro('funcionarioFormacionBasicaCiudad')?>").select2();
								            
								            $("#<?php echo $this->campoSeguro('funcionarioFormacionBasicaCiudad')?>").removeClass("validate[required]");
								            
									        }
								    			

								    }
									                    
								   });
								};	
			

								function consultarDepartamentoMed(elem, request, response){
									  $.ajax({
									    url: "<?php echo $urlFinal24?>",
									    dataType: "json",
									    data: { valor:$("#<?php echo $this->campoSeguro('funcionarioFormacionMediaPais')?>").val()},
									    success: function(data){ 



									        if(data[0]!=" "){

									            $("#<?php echo $this->campoSeguro('funcionarioFormacionMediaDepartamento')?>").html('');
									            $("<option value=''>Seleccione  ....</option>").appendTo("#<?php echo $this->campoSeguro('funcionarioFormacionMediaDepartamento')?>");
									            $.each(data , function(indice,valor){

									            	$("<option value='"+data[ indice ].id_departamento+"'>"+data[ indice ].nombre+"</option>").appendTo("#<?php echo $this->campoSeguro('funcionarioFormacionMediaDepartamento')?>");
									            	
									            });
									            
									            $("#<?php echo $this->campoSeguro('funcionarioFormacionMediaDepartamento')?>").removeAttr('disabled');
									            
									            //$('#<?php echo $this->campoSeguro('funcionarioFormacionMediaDepartamento')?>').width(250);
									            $("#<?php echo $this->campoSeguro('funcionarioFormacionMediaDepartamento')?>").select2();
									            
									            $("#<?php echo $this->campoSeguro('funcionarioFormacionMediaDepartamento')?>").removeClass("validate[required]");
									            
										        }
									    			

									    }
										                    
									   });
									};


									function consultarCiudadMed(elem, request, response){
										  $.ajax({
										    url: "<?php echo $urlFinal25?>",
										    dataType: "json",
										    data: { valor:$("#<?php echo $this->campoSeguro('funcionarioFormacionMediaDepartamento')?>").val()},
										    success: function(data){ 



										        if(data[0]!=" "){

										            $("#<?php echo $this->campoSeguro('funcionarioFormacionMediaCiudad')?>").html('');
										            $("<option value=''>Seleccione  ....</option>").appendTo("#<?php echo $this->campoSeguro('funcionarioFormacionMediaCiudad')?>");
										            $.each(data , function(indice,valor){

										            	$("<option value='"+data[ indice ].id_ciudad+"'>"+data[ indice ].nombreciudad+"</option>").appendTo("#<?php echo $this->campoSeguro('funcionarioFormacionMediaCiudad')?>");
										            	
										            });
										            
										            $("#<?php echo $this->campoSeguro('funcionarioFormacionMediaCiudad')?>").removeAttr('disabled');
										            
										            //$('#<?php echo $this->campoSeguro('funcionarioFormacionMediaCiudad')?>').width(250);
										            $("#<?php echo $this->campoSeguro('funcionarioFormacionMediaCiudad')?>").select2();
										            
										            $("#<?php echo $this->campoSeguro('funcionarioFormacionMediaCiudad')?>").removeClass("validate[required]");
										            
											        }
										    			

										    }
											                    
										   });
										};	
					


	  $(function () {


	        $("#<?php echo $this->campoSeguro('funcionarioPais')?>").change(function(){
	        	if($("#<?php echo $this->campoSeguro('funcionarioPais')?>").val()!=''){
	            	consultarDepartamento();
	    		}else{
	    			$("#<?php echo $this->campoSeguro('funcionarioDepartamento')?>").attr('disabled','');
	    			}

	    	      });


	        $("#<?php echo $this->campoSeguro('funcionarioDepartamento')?>").change(function(){
	        	if($("#<?php echo $this->campoSeguro('funcionarioDepartamento')?>").val()!=''){
	            	consultarCiudad();
	    		}else{
	    			$("#<?php echo $this->campoSeguro('funcionarioCiudad')?>").attr('disabled','');
	    			}

	    	      });



	        $("#<?php echo $this->campoSeguro('funcionarioPaisNacimiento')?>").change(function(){
	        	if($("#<?php echo $this->campoSeguro('funcionarioPaisNacimiento')?>").val()!=''){
	            	consultarDepartamentoNac();
	    		}else{
	    			$("#<?php echo $this->campoSeguro('funcionarioDepartamentoNacimiento')?>").attr('disabled','');
	    			}

	    	      });


	        $("#<?php echo $this->campoSeguro('funcionarioDepartamentoNacimiento')?>").change(function(){
	        	if($("#<?php echo $this->campoSeguro('funcionarioDepartamentoNacimiento')?>").val()!=''){
	            	consultarCiudadNac();
	    		}else{
	    			$("#<?php echo $this->campoSeguro('funcionarioCiudadNacimiento')?>").attr('disabled','');
	    			}

	    	      });

		
	    });

	  
	  $("#<?php echo $this->campoSeguro('funcionarioContactoPais')?>").change(function(){

		    
			if($("#<?php echo $this->campoSeguro('funcionarioContactoPais')?>").val()!=''){
		    	consultarDepartamentoCon();
			}else{
				$("#<?php echo $this->campoSeguro('funcionarioContactoDepartamento')?>").attr('disabled','');
				}

		      });


		$("#<?php echo $this->campoSeguro('funcionarioContactoDepartamento')?>").change(function(){
			if($("#<?php echo $this->campoSeguro('funcionarioContactoDepartamento')?>").val()!=''){
		    	consultarCiudadCon();
			}else{
				$("#<?php echo $this->campoSeguro('funcionarioContactoCiudad')?>").attr('disabled','');
				}

		      });

		$("#<?php echo $this->campoSeguro('funcionarioFormacionBasicaPais')?>").width(250); 
		$("#<?php echo $this->campoSeguro('funcionarioFormacionBasicaPais')?>").select2();
		$("#<?php echo $this->campoSeguro('funcionarioFormacionBasicaDepartamento')?>").width(250); 
		$("#<?php echo $this->campoSeguro('funcionarioFormacionBasicaDepartamento')?>").select2();
		$("#<?php echo $this->campoSeguro('funcionarioFormacionBasicaCiudad')?>").width(250); 
		$("#<?php echo $this->campoSeguro('funcionarioFormacionBasicaCiudad')?>").select2();

		$("#<?php echo $this->campoSeguro('funcionarioFormacionMediaPais')?>").width(250); 
		$("#<?php echo $this->campoSeguro('funcionarioFormacionMediaPais')?>").select2();
		$("#<?php echo $this->campoSeguro('funcionarioFormacionMediaDepartamento')?>").width(250); 
		$("#<?php echo $this->campoSeguro('funcionarioFormacionMediaDepartamento')?>").select2();
		$("#<?php echo $this->campoSeguro('funcionarioFormacionMediaCiudad')?>").width(250); 
		$("#<?php echo $this->campoSeguro('funcionarioFormacionMediaCiudad')?>").select2();


		$("#<?php echo $this->campoSeguro('funcionarioFormacionBasicaPais')?>").change(function(){

		    
			if($("#<?php echo $this->campoSeguro('funcionarioFormacionBasicaPais')?>").val()!=''){
		    	consultarDepartamentoBas();
			}else{
				$("#<?php echo $this->campoSeguro('funcionarioFormacionBasicaDepartamento')?>").attr('disabled','');
				}

		      });


		$("#<?php echo $this->campoSeguro('funcionarioFormacionBasicaDepartamento')?>").change(function(){
			if($("#<?php echo $this->campoSeguro('funcionarioFormacionBasicaDepartamento')?>").val()!=''){
		    	consultarCiudadBas();
			}else{
				$("#<?php echo $this->campoSeguro('funcionarioFormacionBasicaCiudad')?>").attr('disabled','');
				}

		      });


		$("#<?php echo $this->campoSeguro('funcionarioFormacionMediaPais')?>").change(function(){

		    
			if($("#<?php echo $this->campoSeguro('funcionarioFormacionMediaPais')?>").val()!=''){
		    	consultarDepartamentoMed();
			}else{
				$("#<?php echo $this->campoSeguro('funcionarioFormacionMediaDepartamento')?>").attr('disabled','');
				}

		      });


		$("#<?php echo $this->campoSeguro('funcionarioFormacionMediaDepartamento')?>").change(function(){
			if($("#<?php echo $this->campoSeguro('funcionarioFormacionMediaDepartamento')?>").val()!=''){
		    	consultarCiudadMed();
			}else{
				$("#<?php echo $this->campoSeguro('funcionarioFormacionMediaCiudad')?>").attr('disabled','');
				}

		      });

		$("#bloqueFuncionario").validationEngine({
			promptPosition : "centerRight",
			scroll: false,
			autoHidePrompt: true,
			autoHideDelay: 2000,
			validateNonVisibleFields: true,
		    updatePromptsPosition:true
		});

		//Bloque Eduación Superior # 1
		function consultarDepartamentoS1(elem, request, response){
			  $.ajax({
			    url: "<?php echo $urlFinalS[0]?>",
			    dataType: "json",
			    data: { valor:$("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorPais_0')?>").val()},
			    success: function(data){ 



			        if(data[0]!=" "){

			            $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_0')?>").html('');
			            $("<option value=''>Seleccione  ....</option>").appendTo("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_0')?>");
			            $.each(data , function(indice,valor){

			            	$("<option value='"+data[ indice ].id_departamento+"'>"+data[ indice ].nombre+"</option>").appendTo("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_0')?>");
			            	
			            });
			            
			            $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_0')?>").removeAttr('disabled');
			            
			            //$('#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_0')?>').width(250);
			            $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_0')?>").select2();
			            
			            $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_0')?>").removeClass("validate[required]");
			            
				        }
			    			

			    }
				                    
			   });
			};


			function consultarCiudadS1(elem, request, response){
				  $.ajax({
				    url: "<?php echo $urlFinalS[1]?>",
				    dataType: "json",
				    data: { valor:$("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_0')?>").val()},
				    success: function(data){ 



				        if(data[0]!=" "){

				            $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorCiudad_0')?>").html('');
				            $("<option value=''>Seleccione  ....</option>").appendTo("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorCiudad_0')?>");
				            $.each(data , function(indice,valor){

				            	$("<option value='"+data[ indice ].id_ciudad+"'>"+data[ indice ].nombreciudad+"</option>").appendTo("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorCiudad_0')?>");
				            	
				            });
				            
				            $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorCiudad_0')?>").removeAttr('disabled');
				            
				            //$('#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorCiudad_0')?>').width(250);
				            $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorCiudad_0')?>").select2();
				            
				            $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorCiudad_0')?>").removeClass("validate[required]");
				            
					        }
				    			

				    }
					                    
				   });
				};

				$("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorPais_0')?>").change(function(){

				    
					if($("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorPais_0')?>").val()!=''){
				    	consultarDepartamentoS1();
					}else{
						$("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_0')?>").attr('disabled','');
						}

				      });


				$("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_0')?>").change(function(){
					if($("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_0')?>").val()!=''){
				    	consultarCiudadS1();
					}else{
						$("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorCiudad_0')?>").attr('disabled','');
						}

				      });
		//****************************************************************
		
		//Bloque Educación Superior # 2
		function consultarDepartamentoS2(elem, request, response){
			  $.ajax({
			    url: "<?php echo $urlFinalS[2]?>",
			    dataType: "json",
			    data: { valor:$("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorPais_1')?>").val()},
			    success: function(data){ 



			        if(data[0]!=" "){

			            $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_1')?>").html('');
			            $("<option value=''>Seleccione  ....</option>").appendTo("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_1')?>");
			            $.each(data , function(indice,valor){

			            	$("<option value='"+data[ indice ].id_departamento+"'>"+data[ indice ].nombre+"</option>").appendTo("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_1')?>");
			            	
			            });
			            
			            $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_1')?>").removeAttr('disabled');
			            
			            //$('#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_1')?>').width(250);
			            $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_1')?>").select2();
			            
			            $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_1')?>").removeClass("validate[required]");
			            
				        }
			    			

			    }
				                    
			   });
			};


			function consultarCiudadS2(elem, request, response){
				  $.ajax({
				    url: "<?php echo $urlFinalS[3]?>",
				    dataType: "json",
				    data: { valor:$("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_1')?>").val()},
				    success: function(data){ 



				        if(data[0]!=" "){

				            $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorCiudad_1')?>").html('');
				            $("<option value=''>Seleccione  ....</option>").appendTo("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorCiudad_1')?>");
				            $.each(data , function(indice,valor){

				            	$("<option value='"+data[ indice ].id_ciudad+"'>"+data[ indice ].nombreciudad+"</option>").appendTo("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorCiudad_1')?>");
				            	
				            });
				            
				            $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorCiudad_1')?>").removeAttr('disabled');
				            
				            //$('#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorCiudad_1')?>').width(250);
				            $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorCiudad_1')?>").select2();
				            
				            $("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorCiudad_1')?>").removeClass("validate[required]");
				            
					        }
				    			

				    }
					                    
				   });
				};

				$("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorPais_1')?>").change(function(){

				    
					if($("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorPais_1')?>").val()!=''){
				    	consultarDepartamentoS2();
					}else{
						$("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_1')?>").attr('disabled','');
						}

				      });


				$("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_1')?>").change(function(){
					if($("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorDepartamento_1')?>").val()!=''){
				    	consultarCiudadS2();
					}else{
						$("#<?php echo $this->campoSeguro('funcionarioFormacionSuperiorCiudad_1')?>").attr('disabled','');
						}

				      });
		//****************************************************************
		
		
		
		
//---------------------------------------------------------------------------------------------------------
</script>