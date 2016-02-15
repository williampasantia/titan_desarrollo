<?php

namespace bloquesPersona\personaNatural\funcion;

include_once ('Redireccionador.php');
class FormProcessor {
	var $miConfigurador;
	var $lenguaje;
	var $miFormulario;
	var $miSql;
	var $conexion;
	function __construct($lenguaje, $sql) {
		$this->miConfigurador = \Configurador::singleton ();
		$this->miConfigurador->fabricaConexiones->setRecursoDB ( 'principal' );
		$this->lenguaje = $lenguaje;
		$this->miSql = $sql;
	}
	function procesarFormulario() {
		
		// Aquí va la lógica de procesamiento
		$conexion = 'estructura';
		$primerRecursoDB = $this->miConfigurador->fabricaConexiones->getRecursoDB ( $conexion );
		
		if (isset ( $_REQUEST ['descripcion'] )) {
			switch ($_REQUEST ['descripcion']) {
				case 1 :
					$_REQUEST ['descripcion'] = 'Activo';
					break;
				case 2 :
					$_REQUEST ['descripcion'] = 'Inactivo';
					break;
			}
		}
		
		$datos = array (
				'nombre' => $_REQUEST ['nombre'],
				'descripcion' => $_REQUEST ['descripcion'] 
		);
		
		$cadenaSql = $this->miSql->getCadenaSql ( "insertarNivel", $datos );
		$primerRecursoDB->ejecutarAcceso ( $cadenaSql, "acceso");
		
		
		Redireccionador::redireccionar ( 'form' );
	}
	function resetForm() {
		foreach ( $_REQUEST as $clave => $valor ) {
			
			if ($clave != 'pagina' && $clave != 'development' && $clave != 'jquery' && $clave != 'tiempo') {
				unset ( $_REQUEST [$clave] );
			}
		}
	}
}

$miProcesador = new FormProcessor ( $this->lenguaje, $this->sql );

$resultado = $miProcesador->procesarFormulario ();

