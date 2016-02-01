<?php

namespace bloquesPersona\personaNatural;

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
			case 'insertarCategoria' :
				$cadenaSql = 'INSERT INTO ';
				$cadenaSql .= 'liquidacion.categorias_conceptos ';
				$cadenaSql .= '( ';
				$cadenaSql .= 'nombre,';
				$cadenaSql .= 'descripcion,';
				$cadenaSql .= 'ley,';
				$cadenaSql .= 'estado';
				$cadenaSql .= ') ';
				$cadenaSql .= 'VALUES ';
				$cadenaSql .= '( ';
				$cadenaSql .= '\'' . $variable ['nombre'] . '\'' . ', ';
				$cadenaSql .= '\'' . $variable ['descripcion'] . '\'' . ', ';
				$cadenaSql .= $variable ['ley'] . ', ';
				$cadenaSql .= '\'' . 'Activo' . '\'';
				$cadenaSql .= ') ';
				break;
			
			case 'insertarRegistroComercial' :
				$cadenaSql = 'INSERT INTO ';
				$cadenaSql .= 'persona.info_comercial ';
				$cadenaSql .= '( ';
				// $cadenaSql .= 'consecutivo,';
				$cadenaSql .= 'banco,';
				$cadenaSql .= 'tipo_cuenta,';
				$cadenaSql .= 'numero_cuenta,';
				$cadenaSql .= 'tipo_pago,';
				$cadenaSql .= 'estado,';
				$cadenaSql .= 'fecha_creacion,';
				$cadenaSql .= 'usuario_creo,';
				$cadenaSql .= 'soporte_rut';
				$cadenaSql .= ') ';
				$cadenaSql .= 'VALUES ';
				$cadenaSql .= '( ';
				// $cadenaSql .= $variable ['consecutivo']. ', ';
				$cadenaSql .= '\'' . $variable ['banco'] . '\'' . ', ';
				$cadenaSql .= '\'' . $variable ['tipoCuenta'] . '\'' . ', ';
				$cadenaSql .= $variable ['numeroCuenta'] . ', ';
				$cadenaSql .= '\'' . $variable ['tipoPago'] . '\'' . ', ';
				$cadenaSql .= '\'' . $variable ['estado'] . '\'' . ', ';
				$cadenaSql .= '\'' . $variable ['fecha'] . '\'' . ', ';
				$cadenaSql .= '\'' . $variable ['creador'] . '\'' . ', ';
				$cadenaSql .= '\'' . 'soporte RUT' . '\'';
				$cadenaSql .= ')';
				$cadenaSql .= "RETURNING  consecutivo; ";
				break;
			
			case 'insertarRegistroContacto' :
				$cadenaSql = 'INSERT INTO ';
				$cadenaSql .= 'persona.contacto ';
				$cadenaSql .= '( ';
				// $cadenaSql .= 'consecutivo,';
				$cadenaSql .= 'tipo,';
				$cadenaSql .= 'descripcion,';
				$cadenaSql .= 'estado,';
				$cadenaSql .= 'observacion,';
				$cadenaSql .= 'fecha_creacion,';
				$cadenaSql .= 'usuario_creo,';
				$cadenaSql .= 'id_ubicacion';
				$cadenaSql .= ') ';
				$cadenaSql .= 'VALUES ';
				$cadenaSql .= '( ';
				// $cadenaSql .= $variable ['consecutivo']. ', ';
				$cadenaSql .= '\'' . $variable ['tipo'] . '\'' . ', ';
				$cadenaSql .= '\'' . $variable ['descripcion'] . '\'' . ', ';
				$cadenaSql .= '\'' . $variable ['estado'] . '\'' . ', ';
				$cadenaSql .= '\'' . $variable ['observacion'] . '\'' . ', ';
				$cadenaSql .= '\'' . $variable ['fecha'] . '\'' . ', ';
				$cadenaSql .= '\'' . $variable ['creador'] . '\'' . ', ';
				$cadenaSql .= $variable ['fk_ubicacion'];
				$cadenaSql .= ')';
				$cadenaSql .= "RETURNING  consecutivo; ";
				break;
			
			case 'insertarUbicacion' :
				$cadenaSql = 'INSERT INTO ';
				$cadenaSql .= 'otro.ubicacion ';
				$cadenaSql .= '( ';
				$cadenaSql .= 'id_pais,';
				$cadenaSql .= 'id_departamento,';
				$cadenaSql .= 'id_ciudad';
				$cadenaSql .= ') ';
				$cadenaSql .= 'VALUES ';
				$cadenaSql .= '( ';
				$cadenaSql .= $variable ['pais'] . ', ';
				$cadenaSql .= $variable ['departamento'] . ', ';
				$cadenaSql .= $variable ['ciudad'] . ' ';
				$cadenaSql .= ') ';
				$cadenaSql .= "RETURNING  id_ubicacion; ";
				break;
			
			case 'insertarUbicacionContacto' :
				$cadenaSql = 'INSERT INTO ';
				$cadenaSql .= 'otro.ubicacion ';
				$cadenaSql .= '( ';
				$cadenaSql .= 'id_pais,';
				$cadenaSql .= 'id_departamento,';
				$cadenaSql .= 'id_ciudad';
				$cadenaSql .= ') ';
				$cadenaSql .= 'VALUES ';
				$cadenaSql .= '( ';
				$cadenaSql .= $variable ['pais'] . ', ';
				$cadenaSql .= $variable ['departamento'] . ', ';
				$cadenaSql .= $variable ['ciudad'] . ' ';
				$cadenaSql .= ') ';
				$cadenaSql .= "RETURNING  id_ubicacion; ";
				break;
			
			case 'insertarPersonaComercial' :
				$cadenaSql = 'INSERT INTO ';
				$cadenaSql .= 'persona.personaxcomercial ';
				$cadenaSql .= '( ';
				$cadenaSql .= 'documento,';
				$cadenaSql .= 'consecutivo';
				$cadenaSql .= ') ';
				$cadenaSql .= 'VALUES ';
				$cadenaSql .= '( ';
				$cadenaSql .= $variable ['documento'] . ', ';
				$cadenaSql .= $variable ['consecutivo'] . ' ';
				$cadenaSql .= ') ';
				break;
			
			case 'insertarPersonaContacto' :
				$cadenaSql = 'INSERT INTO ';
				$cadenaSql .= 'persona.contactoxpernatural ';
				$cadenaSql .= '( ';
				$cadenaSql .= 'documento,';
				$cadenaSql .= 'consecutivo';
				$cadenaSql .= ') ';
				$cadenaSql .= 'VALUES ';
				$cadenaSql .= '( ';
				$cadenaSql .= $variable ['documento'] . ', ';
				$cadenaSql .= $variable ['consecutivo'] . ' ';
				$cadenaSql .= ') ';
				break;
			
			case 'buscarRegistroxActivo' :
				
				$cadenaSql = 'SELECT ';
				$cadenaSql .= 'nombre as NOMBRE, ';
				$cadenaSql .= 'descripcion as DESCRIPCION, ';
				$cadenaSql .= 'ley as LEY, ';
				$cadenaSql .= 'estado as ESTADO ';
				$cadenaSql .= 'FROM ';
				$cadenaSql .= 'liquidacion.categorias_conceptos ';
				$cadenaSql .= 'WHERE ';
				$cadenaSql .= 'ESTADO=\'' . 'Activo' . '\'';
				// $cadenaSql .= 'ESTADO=\'' . 'rechazada' . '\' ';
				
				break;
			
			case 'infoComercialxConsecutivo' :
				
				$cadenaSql = 'SELECT ';
				$cadenaSql .= 'consecutivo as CONSECUTIVO, ';
				$cadenaSql .= 'banco as BANCO, ';
				$cadenaSql .= 'tipo_cuenta as TIPO_CUENTA, ';
				$cadenaSql .= 'numero_cuenta as NUMERO_CUENTA, ';
				$cadenaSql .= 'tipo_pago as TIPO_PAGO, ';
				$cadenaSql .= 'estado as ESTADO, ';
				$cadenaSql .= 'fecha_creacion as FECHA_CREACION, ';
				$cadenaSql .= 'usuario_creo as USUARIO_CREO ';
				$cadenaSql .= 'FROM ';
				$cadenaSql .= 'persona.info_comercial ';
				$cadenaSql .= 'WHERE ';
				$cadenaSql .= 'consecutivo = ';
				$cadenaSql .= '\'' . $variable ['consecutivo'] . '\'';
				break;
			
			case 'infoContactoxConsecutivo' :
				
				$cadenaSql = 'SELECT ';
				$cadenaSql .= 'consecutivo as CONSECUTIVO, ';
				$cadenaSql .= 'tipo as TIPO, ';
				$cadenaSql .= 'descripcion as DESCRIPCION, ';
				$cadenaSql .= 'estado as ESTADO, ';
				$cadenaSql .= 'observacion as OBSERVACION, ';
				$cadenaSql .= 'fecha_creacion as FECHA_CREACION, ';
				$cadenaSql .= 'usuario_creo as USUARIO_CREO ';
				$cadenaSql .= 'FROM ';
				$cadenaSql .= 'persona.contacto ';
				$cadenaSql .= 'WHERE ';
				$cadenaSql .= 'consecutivo = ';
				$cadenaSql .= '\'' . $variable ['consecutivo'] . '\'';
				break;
			
			case 'buscarVerdetallexCategoria' :
				
				$cadenaSql = 'SELECT ';
				$cadenaSql .= 'id as ID, ';
				$cadenaSql .= 'nombre as NOMBRE, ';
				$cadenaSql .= 'descripcion as DESCRIPCION, ';
				$cadenaSql .= 'ley as LEY ';
				$cadenaSql .= 'FROM ';
				$cadenaSql .= 'liquidacion.categorias_conceptos';
				break;
			
			case 'buscarConsecutivoCom' :
				
				$cadenaSql = 'SELECT ';
				$cadenaSql .= 'consecutivo as CONSECUTIVO ';
				$cadenaSql .= 'FROM ';
				$cadenaSql .= 'persona.personaxcomercial ';
				$cadenaSql .= 'WHERE ';
				$cadenaSql .= 'documento = ';
				$cadenaSql .= '\'' . $variable ['documento'] . '\'';
				break;
			
			case 'buscarConsecutivoCon' :
				
				$cadenaSql = 'SELECT ';
				$cadenaSql .= 'consecutivo as CONSECUTIVO ';
				$cadenaSql .= 'FROM ';
				$cadenaSql .= 'persona.contactoxpernatural ';
				$cadenaSql .= 'WHERE ';
				$cadenaSql .= 'documento = ';
				$cadenaSql .= '\'' . $variable ['documento'] . '\'';
				break;
			
			case 'buscarModificarxPersona' :
				
				$cadenaSql = 'SELECT ';
				$cadenaSql .= 'documento as DOCUMENTO, ';
				$cadenaSql .= 'primer_nombre as PRIMER_NOMBRE, ';
				$cadenaSql .= 'segundo_nombre as SEGUNDO_NOMBRE,';
				$cadenaSql .= 'primer_apellido as PRIMER_APELLIDO,';
				$cadenaSql .= 'segundo_apellido as SEGUNDO_APELLIDO,';
				$cadenaSql .= 'regimen_tributario as REGIMEN_TRIBUTARIO, ';
				$cadenaSql .= 'estado_solicitud as ESTADO ';
				$cadenaSql .= 'FROM ';
				$cadenaSql .= 'persona.persona_natural';
				
				break;
			
			case 'buscarVerdetallexCargo' :
				
				$cadenaSql = 'SELECT ';
				$cadenaSql .= 'id as ID, ';
				$cadenaSql .= 'nombre as NOMBRE, ';
				$cadenaSql .= 'descripcion as DESCRIPCION, ';
				$cadenaSql .= 'ley as LEY, ';
				$cadenaSql .= 'estado as ESTADO ';
				$cadenaSql .= 'FROM ';
				$cadenaSql .= 'liquidacion.categorias_conceptos';
				
				break;
			
			case 'inactivarRegistro' :
				$cadenaSql = 'UPDATE ';
				$cadenaSql .= 'liquidacion.categorias_conceptos ';
				$cadenaSql .= 'SET ';
				$cadenaSql .= 'estado = ';
				$cadenaSql .= '\'' . $variable ['estadoRegistro'] . '\' ';
				$cadenaSql .= 'WHERE ';
				$cadenaSql .= 'id = ';
				$cadenaSql .= '\'' . $variable ['codigoRegistro'] . '\'';
				break;
			
			case 'modificarRegistroBasico' :
				$cadenaSql = 'UPDATE ';
				$cadenaSql .= 'persona.persona_natural ';
				$cadenaSql .= 'SET ';
				// $cadenaSql .= 'documento,';
				// $cadenaSql .= 'tipo_documento,';
				// $cadenaSql .= 'consecutivo,';
				$cadenaSql .= 'primer_nombre = ';
				$cadenaSql .= '\'' . $variable ['primerNombre'] . '\', ';
				$cadenaSql .= 'segundo_nombre = ';
				$cadenaSql .= '\'' . $variable ['segundoNombre'] . '\', ';
				$cadenaSql .= 'primer_apellido = ';
				$cadenaSql .= '\'' . $variable ['primerApellido'] . '\', ';
				$cadenaSql .= 'segundo_apellido = ';
				$cadenaSql .= '\'' . $variable ['segundoApellido'] . '\', ';
				$cadenaSql .= 'gran_contribuyente = ';
				$cadenaSql .= '\'' . $variable ['contribuyente'] . '\', ';
				$cadenaSql .= 'autorretenedor = ';
				$cadenaSql .= '\'' . $variable ['autorretenedor'] . '\', ';
				$cadenaSql .= 'regimen_tributario = ';
				$cadenaSql .= '\'' . $variable ['regimen'] . '\' ';
				$cadenaSql .= 'WHERE ';
				$cadenaSql .= 'documento = ';
				$cadenaSql .= '\'' . $variable ['numeroDocumento'] . '\'';
				break;
			
			case 'modificarCategoria' :
				$cadenaSql = 'UPDATE ';
				$cadenaSql .= 'liquidacion.categorias_conceptos ';
				$cadenaSql .= 'SET ';
				$cadenaSql .= 'nombre = ';
				$cadenaSql .= '\'' . $variable ['nombre'] . '\', ';
				$cadenaSql .= 'descripcion = ';
				$cadenaSql .= '\'' . $variable ['descripcion'] . '\', ';
				$cadenaSql .= 'ley = ';
				$cadenaSql .=  $variable ['ley']. ' ';
				$cadenaSql .= 'WHERE ';
				$cadenaSql .= 'id = ';
				$cadenaSql .= '\'' . $variable ['id'] . '\'';
				break;
			
			case 'modificarRegistroContacto' :
				$cadenaSql = 'UPDATE ';
				$cadenaSql .= 'persona.contacto ';
				$cadenaSql .= 'SET ';
				$cadenaSql .= 'estado = ';
				$cadenaSql .= '\'' . $variable ['estado'] . '\' ';
				$cadenaSql .= 'WHERE ';
				$cadenaSql .= 'consecutivo = ';
				$cadenaSql .= '\'' . $variable ['consecutivo'] . '\'';
				break;
			
			case 'buscarPais' :
				
				$cadenaSql = 'SELECT ';
				$cadenaSql .= 'id_pais as ID_PAIS, ';
				$cadenaSql .= 'nombre_pais as NOMBRE ';
				$cadenaSql .= 'FROM ';
				$cadenaSql .= 'otro.pais';
				break;
			
			case 'buscarDepartamento' : // Provisionalmente solo Departamentos de Colombia
				
				$cadenaSql = 'SELECT ';
				$cadenaSql .= 'id_departamento as ID_DEPARTAMENTO, ';
				$cadenaSql .= 'nombre as NOMBRE ';
				$cadenaSql .= 'FROM ';
				$cadenaSql .= 'otro.departamento ';
				$cadenaSql .= 'WHERE ';
				$cadenaSql .= 'id_pais = 112;';
				break;
			
			case 'buscarDepartamentoAjax' :
				
				$cadenaSql = 'SELECT ';
				$cadenaSql .= 'id_departamento as ID_DEPARTAMENTO, ';
				$cadenaSql .= 'nombre as NOMBRE ';
				$cadenaSql .= 'FROM ';
				$cadenaSql .= 'otro.departamento ';
				$cadenaSql .= 'WHERE ';
				$cadenaSql .= 'id_pais = ' . $variable . ';';
				break;
			
			case 'buscarCiudad' : // Provisionalmente Solo Ciudades de Colombia sin Agrupar
				
				$cadenaSql = 'SELECT ';
				$cadenaSql .= 'id_ciudad as ID_CIUDAD, ';
				$cadenaSql .= 'nombre as NOMBRE ';
				$cadenaSql .= 'FROM ';
				$cadenaSql .= 'otro.ciudad ';
				$cadenaSql .= 'WHERE ';
				$cadenaSql .= 'ab_pais = \'CO\';';
				break;
			
			case 'buscarCiudadAjax' :
				
				$cadenaSql = 'SELECT ';
				$cadenaSql .= 'id_ciudad as ID_CIUDAD, ';
				$cadenaSql .= 'nombre as NOMBRECIUDAD ';
				$cadenaSql .= 'FROM ';
				$cadenaSql .= 'otro.ciudad ';
				$cadenaSql .= 'WHERE ';
				$cadenaSql .= 'id_departamento = ' . $variable . ';';
				break;
		}
		
		return $cadenaSql;
	}
}
?>
