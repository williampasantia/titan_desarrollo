<?php

namespace bloquesModelo\bloqueContenido;

if (! isset ( $GLOBALS ["autorizado"] )) {
	include ("../index.php");
	exit ();
}

include_once ("core/manager/Configurador.class.php");
include_once ("core/connection/Sql.class.php");

/**
 * IMPORTANTE: Se recomienda que no se borren registros.
 * Utilizar mecanismos para - independiente del motor de bases de datos,
 * poder realizar rollbacks gestionados por el aplicativo.
 */
class Sql extends \Sql {
	var $miConfigurador;
	function getCadenaSql($tipo, $variable = '') {
		
		/**
		 * 1.
		 * Revisar las variables para evitar SQL Injection
		 */
		$prefijo = $this->miConfigurador->getVariableConfiguracion ( "prefijo" );
		$idSesion = $this->miConfigurador->getVariableConfiguracion ( "id_sesion" );
		$cadenaSql = '';
		switch ($tipo) {
			
			/**
			 * Clausulas específicas
			 */
			case 'insertarRegistro' :
				$cadenaSql = 'INSERT INTO ';
				$cadenaSql .= 'parametro.cargo ';
				$cadenaSql .= '( ';
				$cadenaSql .= 'nivel,';
				$cadenaSql .= 'grado,';
				$cadenaSql .= 'tipo_cargo,';
				$cadenaSql .= 'sueldo,';
				$cadenaSql .= 'tipo_sueldo,';
				$cadenaSql .= 'funciones,';
				$cadenaSql .= 'ley,';
				$cadenaSql .= 'estado';
				$cadenaSql .= ') ';
				$cadenaSql .= 'VALUES ';
				$cadenaSql .= '( ';
				$cadenaSql .= $variable ['nivelRegistro'] . ', ';
				$cadenaSql .= $variable ['gradoRegistro'] . ', ';
				$cadenaSql .= '\'' . $variable ['TipoCargo'] . '\', ';
				$cadenaSql .= $variable ['sueldoRegistro'] . ', ';
				$cadenaSql .= '\'' . $variable ['tipoSueldoRegistro'] . '\', ';
				$cadenaSql .= '\'' . $variable ['funciones'] . '\', ';
				$cadenaSql .= $variable ['ley'] . ', ';
				$cadenaSql .= '\'' . $variable ['estadoRegistro'] . '\' ';
				$cadenaSql .= ') ';
				break;
			
			case 'buscarRegistroxCargo' :
				
				$cadenaSql = 'SELECT ';
				$cadenaSql .= 'codigo_cargo as COD_CARGO, ';
				$cadenaSql .= 'nivel as NIVEL, ';
				$cadenaSql .= 'grado as GRADO,';
				$cadenaSql .= 'tipo_cargo as TIPO, ';
				$cadenaSql .= 'estado as ESTADO ';
				$cadenaSql .= 'FROM ';
				$cadenaSql .= 'parametro.cargo';
				// $cadenaSql .= 'WHERE ';
				// $cadenaSql .= 'nombre=\'' . $_REQUEST ['usuario'] . '\' AND ';
				// $cadenaSql .= 'clave=\'' . $claveEncriptada . '\' ';
				
				break;
			
			case 'buscarModificarxCargo' :
				
				$cadenaSql = 'SELECT ';
				$cadenaSql .= 'codigo_cargo as COD_CARGO, ';
				$cadenaSql .= 'nivel as NIVEL, ';
				$cadenaSql .= 'grado as GRADO,';
				$cadenaSql .= 'sueldo as SUELDO, ';
				$cadenaSql .= 'tipo_sueldo as TIPO_SUELDO, ';
				$cadenaSql .= 'estado as ESTADO, ';
				$cadenaSql .= 'tipo_cargo as TIPO_CARGO, ';
				$cadenaSql .= 'funciones as FUNCIONES, ';
				$cadenaSql .= 'ley as LEY ';
				$cadenaSql .= 'FROM ';
				$cadenaSql .= 'parametro.cargo ';
				$cadenaSql .= 'WHERE ';
				$cadenaSql .= 'codigo_cargo = ';
				$cadenaSql .= '\'' . $variable ['codigoRegistro'] . '\'';
				
				break;
			
			case 'buscarVerdetallexCargo' :
				
				$cadenaSql = 'SELECT ';
				$cadenaSql .= 'codigo_cargo as COD_CARGO, ';
				$cadenaSql .= 'nivel as NIVEL, ';
				$cadenaSql .= 'grado as GRADO,';
				$cadenaSql .= 'sueldo as SUELDO, ';
			    $cadenaSql .= 'tipo_sueldo as TIPO_SUELDO, ';
				$cadenaSql .= 'estado as ESTADO, ';
				$cadenaSql .= 'tipo_cargo as TIPO, ';
				$cadenaSql .= 'funciones as FUNCIONES, ';
				$cadenaSql .= 'ley as LEY ';
				$cadenaSql .= 'FROM ';
				$cadenaSql .= 'parametro.cargo ';
				$cadenaSql .= 'WHERE ';
				$cadenaSql .= 'codigo_cargo = ';
				$cadenaSql .= '\'' . $variable ['codigoRegistro'] . '\'';
				break;
			
			case 'buscarNivel' :
				
				$cadenaSql = 'SELECT ';
				$cadenaSql .= 'id as ID, ';
				$cadenaSql .= 'nombre as NOMBRE ';
				$cadenaSql .= 'FROM ';
				$cadenaSql .= 'parametro.nivel_cargo';
				
				break;
			
			case 'buscar_ley' :
				
				$cadenaSql = 'SELECT ';
				$cadenaSql .= 'nombre as NOMBRE ';
				$cadenaSql .= 'FROM ';
				$cadenaSql .= 'parametro.ley_decreto_norma ';
				$cadenaSql .= 'WHERE ';
				$cadenaSql .= 'id_ldn = ';
				$cadenaSql .= '\'' . $variable ['id'] . '\'';
				break;
			
			case 'modificarRegistro' :
				$cadenaSql = 'UPDATE ';
				$cadenaSql .= 'parametro.cargo ';
				$cadenaSql .= 'SET ';
				$cadenaSql .= 'nivel = ';
				$cadenaSql .= $variable ['nivelRegistro'] . ', ';
				$cadenaSql .= 'grado = ';
				$cadenaSql .= $variable ['gradoRegistro'] . ', ';
				$cadenaSql .= 'sueldo = ';
				$cadenaSql .= $variable ['sueldoRegistro'] . ', ';
				$cadenaSql .= 'tipo_sueldo = ';
				$cadenaSql .= '\'' . $variable ['tipoSueldoRegistro'] . '\', ';
				$cadenaSql .= 'tipo_cargo = ';
				$cadenaSql .= '\'' . $variable ['TipoCargo'] . '\', ';
				$cadenaSql .= 'funciones = ';
				$cadenaSql .= '\'' . $variable ['funciones'] . '\', ';
				$cadenaSql .= 'ley = ';
				$cadenaSql .= '\'' . $variable ['ley'] . '\' ';
				$cadenaSql .= 'WHERE ';
				$cadenaSql .= 'codigo_cargo = ';
				$cadenaSql .= '\'' . $variable ['codigoRegistro'] . '\'';
				break;
			
			case 'inactivarRegistro' :
				$cadenaSql = 'UPDATE ';
				$cadenaSql .= 'parametro.cargo ';
				$cadenaSql .= 'SET ';
				$cadenaSql .= 'estado = ';
				$cadenaSql .= '\'' . $variable ['estadoRegistro'] . '\' ';
				$cadenaSql .= 'WHERE ';
				$cadenaSql .= 'codigo_cargo = ';
				$cadenaSql .= '\'' . $variable ['codigoRegistro'] . '\'';
				break;
		}
		
		return $cadenaSql;
	}
}
?>
