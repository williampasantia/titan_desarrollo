<?php

namespace bloquesModelo\bloqueContenido\funcion;

if (! isset ( $GLOBALS ["autorizado"] )) {
	include ("index.php");
	exit ();
}
class Redireccionador {
	public static function redireccionar($opcion, $valor = "") {
		
	    $miConfigurador = \Configurador::singleton ();
            $miPaginaActual = $miConfigurador->getVariableConfiguracion ( "pagina" );
		
		switch ($opcion) {
			
			case "opcion1" :
				
				$variable = 'pagina='.$miPaginaActual;                                
				$variable .= "&opcion=form";
				break;
			case "form" :
				
				$variable = 'pagina='.$miPaginaActual;                                
				$variable .= "&opcion=form";
				break;
                        case "registrar" :
				$variable = 'pagina='.$miPaginaActual;                                
				$variable .= "&opcion=registrar";
				break;
			default:
			    $variable='';
			
		}
		foreach ( $_REQUEST as $clave => $valor ) {
			unset ( $_REQUEST [$clave] );
		}
		
		$enlace = $miConfigurador->getVariableConfiguracion ( "enlace" );
		$variable = $miConfigurador->fabricaConexiones->crypto->codificar ( $variable );
		
		$_REQUEST [$enlace] = $variable;
		$_REQUEST ["recargar"] = true;
		
		return true;
	}
}
?>