<?php

namespace bloquesPersona\personaNatural;

if (! isset ( $GLOBALS ["autorizado"] )) {
    include ("../index.php");
    exit ();
}

include_once ("core/manager/Configurador.class.php");
include_once ("core/connection/Sql.class.php");

/**
 * IMPORTANTE: Se recomienda que no se borren registros. Utilizar mecanismos para - independiente del motor de bases de datos,
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
        $cadenaSql='';
        switch ($tipo) {
            
            /**
             * Clausulas específicas
             */
            case 'insertarRegistroBasico' :
                $cadenaSql = 'INSERT INTO ';
                $cadenaSql .= 'persona.persona_natural ';
                $cadenaSql .= '( ';
                $cadenaSql .= 'documento,';
                $cadenaSql .= 'tipo_documento,';
                $cadenaSql .= 'consecutivo,';
                $cadenaSql .= 'primer_nombre,';
                $cadenaSql .= 'segundo_nombre,';
                $cadenaSql .= 'primer_apellido,';
                $cadenaSql .= 'segundo_apellido,';
                $cadenaSql .= 'gran_contribuyente,';
                $cadenaSql .= 'autorretenedor,';
                $cadenaSql .= 'regimen_tributario,';
                $cadenaSql .= 'estado_solicitud,';
                $cadenaSql .= 'soporte_documento';
            	$cadenaSql .= ') ';
            	$cadenaSql .= 'VALUES ';
                $cadenaSql .= '( ';
            	$cadenaSql .= $variable ['numeroDocumento']. ', ';
            	$cadenaSql .= $variable ['tipoDocumento'] . ', ';
            	$cadenaSql .= '2' . ', ';
            	$cadenaSql .= '\'' .$variable ['primerNombre'] . '\''.', ';
            	$cadenaSql .= '\'' .$variable ['segundoNombre'].'\''. ', ';
            	$cadenaSql .= '\'' .$variable ['primerApellido'] . '\''. ', ';
            	$cadenaSql .= '\'' .$variable ['segundoApellido'] .'\''. ', ';
            	$cadenaSql .= '\'' .$variable ['contribuyente'] .'\''.', ';
            	$cadenaSql .= '\'' .$variable ['autorretenedor'] .'\''.', ';
            	$cadenaSql .= '\'' .$variable ['regimen'] .'\''. ', ';
            	$cadenaSql .= '\'' . 'Modificable' . '\' '.',';
            	$cadenaSql .= '\'' .'no funciona '.'\'';
            	$cadenaSql .= ') ';
                break;
            
          case 'insertarRegistroComercial' :
          	       	$cadenaSql = 'INSERT INTO ';
                	$cadenaSql .= 'persona.info_comercial ';
                	$cadenaSql .= '( ';
//                 	$cadenaSql .= 'consecutivo,';
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
//                 	$cadenaSql .= $variable ['consecutivo']. ', ';
                	$cadenaSql .= '\'' .$variable ['banco'] . '\''. ', ';
                	$cadenaSql .= '\'' .$variable ['tipoCuenta'] .'\''. ', ';
                	$cadenaSql .=  $variable ['numeroCuenta'] . ', ';
                	$cadenaSql .= '\'' .$variable ['tipoPago'] . '\''. ', ';
                	$cadenaSql .= '\'' .$variable ['estado'] . '\''.', ';
                	$cadenaSql .= '\'' .$variable ['fecha'].'\''. ', ';
                	$cadenaSql .= '\'' .$variable ['creador'] . '\''. ', ';
                	$cadenaSql .= '\'' .'soporte RUT'.'\'';
                	$cadenaSql .= ')';
                	break;
          
           case 'insertarRegistroContacto' :
                		$cadenaSql = 'INSERT INTO ';
                		$cadenaSql .= 'persona.contacto ';
                		$cadenaSql .= '( ';
                		//                 	$cadenaSql .= 'consecutivo,';
                		$cadenaSql .= 'tipo,';
                		$cadenaSql .= 'descripcion,';
                		$cadenaSql .= 'estado,';
                		$cadenaSql .= 'observacion,';
                		$cadenaSql .= 'fecha_creacion,';
                		$cadenaSql .= 'usuario_creo';
                		$cadenaSql .= ') ';
                		$cadenaSql .= 'VALUES ';
                		$cadenaSql .= '( ';
                		//                 	$cadenaSql .= $variable ['consecutivo']. ', ';
                		$cadenaSql .= '\'' .$variable ['tipo'] . '\''. ', ';
                		$cadenaSql .= '\'' .$variable ['descripcion'] .'\''. ', ';
                		$cadenaSql .= '\'' .$variable ['estado'] . '\''. ', ';
                		$cadenaSql .= '\'' .$variable ['observacion'] . '\''.', ';
                		$cadenaSql .= '\'' .$variable ['fecha'].'\''. ', ';
                		$cadenaSql .= '\'' .$variable ['creador'] . '\'';
                		$cadenaSql .= ')';
                		break;
          
                
             case 'buscarRegistroxCargo' :
                
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
//                        $cadenaSql .= 'WHERE ';
//                        $cadenaSql .= 'ESTADO=\'' .'modificabl'. '\' OR ';
//                        $cadenaSql .= 'ESTADO=\'' . 'rechazada' . '\' ';
                        
                break;
                
                case 'buscardetalleECOxCargo' :
                
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
                	$cadenaSql .= 'persona.info_comercial';
                	//                        $cadenaSql .= 'WHERE ';
                	//                        $cadenaSql .= 'ESTADO=\'' .'modificabl'. '\' OR ';
                	//                        $cadenaSql .= 'ESTADO=\'' . 'rechazada' . '\' ';
                
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
                $cadenaSql .= 'documento as	DOCUMENTO, ';
                $cadenaSql .= 'tipo_documento as TIPO_DOCUMENTO, ';
                $cadenaSql .= 'consecutivo as CONSECUTIVO, ';
                $cadenaSql .= 'primer_nombre as PRIMER_NOMBRE, ';
                $cadenaSql .= 'segundo_nombre as SEGUNDO_NOMBRE, ';
                $cadenaSql .= 'primer_apellido as PRIMER_APELLIDO, ';
                $cadenaSql .= 'segundo_apellido as SEGUNDO_APELLIDO, ';
                $cadenaSql .= 'gran_contribuyente as CONTRIBUYENTE, ';
                $cadenaSql .= 'autorretenedor as AUTORRETENEDOR, ';
                $cadenaSql .= 'regimen_tributario as REGIMEN, ';
                $cadenaSql .= 'estado_solicitud as ESTADO ';
                $cadenaSql .= 'FROM ';
                $cadenaSql .= 'persona.persona_natural';
                        
                break;

            case 'modificarRegistro' :
                $cadenaSql = 'UPDATE ';
                $cadenaSql .= 'persona.persona_natural ';
                $cadenaSql .= 'SET ';
                $cadenaSql .= 'nivel = ';
                $cadenaSql .= $variable ['nivelRegistro'] . ', ';
                $cadenaSql .= 'grado = ';
                $cadenaSql .= $variable ['gradoRegistro'] . ', ';
                $cadenaSql .= 'nombre = ';
                $cadenaSql .= '\'' . $variable ['nombreRegistro']  . '\', ';
                $cadenaSql .= 'sueldo = ';
                $cadenaSql .= $variable ['sueldoRegistro'] . ', ';
                $cadenaSql .= 'tipo_sueldo = ';
                $cadenaSql .= '\'' . $variable['tipoSueldoRegistro'] . '\' ';
                $cadenaSql .= 'WHERE ';
                $cadenaSql .= 'codigo_cargo = ';
                $cadenaSql .= '\'' . $variable ['codigoRegistro']  . '\'';
                break;
                
             case 'inactivarRegistro' :
                $cadenaSql = 'UPDATE ';
                $cadenaSql .= 'persona.persona_natural ';
                $cadenaSql .= 'SET ';
                $cadenaSql .= 'estado_solicitud = ';
                $cadenaSql .= '\'' . 'Aprobado'  . '\' ';
                $cadenaSql .= 'WHERE ';
                $cadenaSql .= 'documento = ';
                $cadenaSql .= '\'' . $variable ['codigoRegistro']  . '\'';
                break;
                
                case 'buscarPais' :
                
                	$cadenaSql = 'SELECT ';
                	$cadenaSql .= 'id_pais as ID_PAIS, ';
                	$cadenaSql .= 'nombre_pais as NOMBRE ';
                	$cadenaSql .= 'FROM ';
                	$cadenaSql .= 'otro.pais';
                	break;
                		
                case 'buscarDepartamento' ://Provisionalmente solo Departamentos de Colombia
                
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
                	 
                case 'buscarCiudad' : //Provisionalmente Solo Ciudades de Colombia sin Agrupar
                
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
