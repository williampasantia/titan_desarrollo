<?php

if (! isset ( $GLOBALS ["autorizado"] )) {
	include ("../index.php");
	exit ();
}

/**
 * Este script está incluido en el método html de la clase Frontera.class.php.
 *
 * La ruta absoluta del bloque está definida en $this->ruta
 */

$esteBloque = $this->miConfigurador->getVariableConfiguracion ( "esteBloque" );

$nombreFormulario = $esteBloque ["nombre"];

include_once ("core/crypto/Encriptador.class.php");
$cripto = Encriptador::singleton ();
$valorCodificado = "action=" . $esteBloque ["nombre"];
$valorCodificado .= "&bloque=" . $esteBloque ["id_bloque"];
$valorCodificado .= "&bloqueGrupo=" . $esteBloque ["grupo"];
$valorCodificado = $cripto->codificar ( $valorCodificado );
$directorio = $this->miConfigurador->getVariableConfiguracion ( "rutaUrlBloque" ) . "/imagen/";

// ------------------Division para las pestañas-------------------------
$atributos ["id"] = "tabs";
$atributos ["estilo"] = "";
echo $this->miFormulario->division ( "inicio", $atributos );
// unset ( $atributos );
{
	
	// ---------------- SECCION: Controles del Formulario -----------------------------------------------
	
	echo "<nav class=\"navbar navbar-default\">";
	echo "<ul class=\"nav nav-tabs nav-justified\">";
	 
	echo "<li role=\"presentation\" class=\"active\"><a href=\"#\">Información Básica</a></li>";
	echo "<li><a href=\"#\">Formulación del Concepto</a></li>";
	echo "<li><a href=\"#\">Condiciones del Concepto</a></li>";
	//echo "<li><a href=\"#\">Opción 5</a></li>";
	 
	echo "</ul>";
	echo "</nav>";
	
	// ------------------- SECCION: Paso de variables ------------------------------------------------
	
	
	
	/*
	// -------------------- Listado de Pestañas (Como lista No Ordenada) -------------------------------

	$items = array (
			"tabRegistrar" => $this->lenguaje->getCadena ( "tabRegistrar" ),
			"tabRegistrarMasivo" => $this->lenguaje->getCadena ( "tabRegistrarMasivo" )
	);
	$atributos ["items"] = $items;
	$atributos ["estilo"] = "jqueryui";
	$atributos ["pestañas"] = "true";
	echo $this->miFormulario->listaNoOrdenada ( $atributos );
	// unset ( $atributos );

	$atributos ["id"] = "tabRegistrar";
	$atributos ["estilo"] = "";
	echo $this->miFormulario->division ( "inicio", $atributos );
	{
		include ($this->ruta . "formulario/registrar.php");

		// -----------------Fin Division para la pestaña 1-------------------------
	}
	echo $this->miFormulario->division ( "fin" );

	// ------------------Division para la pestaña 2-------------------------
	$atributos ["id"] = "tabRegistrarMasivo";
	$atributos ["estilo"] = "";
	echo $this->miFormulario->division ( "inicio", $atributos );
	{
		include ($this->ruta . "formulario/mensaje.php");
	}

	// -----------------Fin Division para la pestaña 2-------------------------
	echo $this->miFormulario->division ( "fin" );
	
	*/

}

echo $this->miFormulario->division ( "fin" );

?>