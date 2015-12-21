<?php

namespace bloquesNovedad\bloqueHojadeVida\bloqueFuncionario;

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
        
        switch ($tipo) {
        	

            /**
             * Clausulas específicas
             */
            case 'insertarUbicacionExpedicion' :
                $cadenaSql = 'INSERT INTO ';
                $cadenaSql .= 'otro.ubicacion ';
                $cadenaSql .= '( ';
                $cadenaSql .= 'id_pais,';
                $cadenaSql .= 'id_departamento,';
                $cadenaSql .= 'id_ciudad';
                $cadenaSql .= ') ';
                $cadenaSql .= 'VALUES ';
                $cadenaSql .= '( ';
                $cadenaSql .=  $variable ['paisExpedicion'] . ', ';
                $cadenaSql .=  $variable ['departamentoExpedicion'] . ', ';
                $cadenaSql .=  $variable ['ciudadExpedicion'] . ' ';
                $cadenaSql .= ') ';
                $cadenaSql .= "RETURNING  id_ubicacion; ";
                break;
                
            case 'insertarIdentificacionDocumento' :
				$cadenaSql = 'INSERT INTO ';
				$cadenaSql .= 'novedad.identificacion_expedicion ';
				$cadenaSql .= '( ';
				$cadenaSql .= 'id_ubicacion,';
				$cadenaSql .= 'documento,';
				$cadenaSql .= 'fecha_expe_documento,';
				$cadenaSql .= 'soporte_identificacion';
				$cadenaSql .= ') ';
				$cadenaSql .= 'VALUES ';
				$cadenaSql .= '( ';
				$cadenaSql .=  $variable ['fk_ubicacion_expedicion'] . ', ';
				$cadenaSql .=  /*$variable ['numeroDocumento']*/25687412 . ', ';
				$cadenaSql .= '\'' . $variable ['fechaExpedicionDocumento'] . '\', ';
				$cadenaSql .= '\'' . $variable ['soporteDocumento'] . '\' ';
				$cadenaSql .= ') ';
				$cadenaSql .= "RETURNING  id_datos_identificacion; ";
				break;
                
                
            case 'insertarUbicacionNacimiento' :
				$cadenaSql = 'INSERT INTO ';
				$cadenaSql .= 'otro.ubicacion ';
				$cadenaSql .= '( ';
				$cadenaSql .= 'id_pais,';
				$cadenaSql .= 'id_departamento,';
				$cadenaSql .= 'id_ciudad';
				$cadenaSql .= ') ';
				$cadenaSql .= 'VALUES ';
				$cadenaSql .= '( ';
				$cadenaSql .=  $variable ['paisNacimiento'] . ', ';
				$cadenaSql .=  $variable ['departamentoNacimiento'] . ', ';
				$cadenaSql .=  $variable ['ciudadNacimiento'] . ' ';
				$cadenaSql .= ') ';
				$cadenaSql .= "RETURNING  id_ubicacion; ";
				break;
                
			case 'insertarInformacionPersonalBasica' :
				$cadenaSql = 'INSERT INTO ';
				$cadenaSql .= 'novedad.informacion_personal_basica ';
				$cadenaSql .= '( ';
				$cadenaSql .= 'fecha_nacimiento,';
				$cadenaSql .= 'id_ubicacion,';
				$cadenaSql .= 'genero,';
				$cadenaSql .= 'estado_civil,';
				$cadenaSql .= 'edad,';
				$cadenaSql .= 'tipo_sangre,';
				$cadenaSql .= 'rh_sangre,';
				$cadenaSql .= 'tipo_libreta_militar,';
				$cadenaSql .= 'numero_libreta,';
				$cadenaSql .= 'numero_distrito_militar,';
				$cadenaSql .= 'soporte_libreta,';
				$cadenaSql .= 'grupo_etnico,';
				$cadenaSql .= 'comunidad_lgbt,';
				$cadenaSql .= 'cabeza_familia,';
				$cadenaSql .= 'personas_a_cargo,';
				$cadenaSql .= 'soporte_caracterizacion';
				$cadenaSql .= ') ';
				$cadenaSql .= 'VALUES ';
				$cadenaSql .= '( ';
				$cadenaSql .= '\'' . $variable ['fechaNacimiento'] . '\', ';
				$cadenaSql .=  $variable ['fk_ubicacion'] . ', ';
				$cadenaSql .= '\'' . $_REQUEST ['funcionarioGenero'] . '\', ';
				$cadenaSql .= '\'' . $_REQUEST ['funcionarioEstadoCivil'] . '\', ';
				$cadenaSql .=  $variable ['edadNacimiento'] . ', ';
				if($_REQUEST ['funcionarioTipoSangre'] != 'NULL'){
					$cadenaSql .= '\'' . $_REQUEST ['funcionarioTipoSangre'] . '\', ';
				}else{
					$cadenaSql .= $_REQUEST ['funcionarioTipoSangre'] . ', ';
				}
				if($_REQUEST ['funcionarioSangreRH'] != 'NULL'){
					$cadenaSql .= '\'' . $_REQUEST ['funcionarioSangreRH'] . '\', ';
				}else{
					$cadenaSql .= $_REQUEST ['funcionarioSangreRH'] . ', ';
				}
				if($_REQUEST ['funcionarioTipoLibreta'] != 'NULL'){
					$cadenaSql .= '\'' . $_REQUEST ['funcionarioTipoLibreta'] . '\', ';
				}else{
					$cadenaSql .= $_REQUEST ['funcionarioTipoLibreta'] . ', ';
				}
				if($variable ['numeroLibreta'] > 0){
					$cadenaSql .=  $variable ['numeroLibreta'] . ', ';
				}else{
					$cadenaSql .= 'NULL, ';
				}
				if($variable ['numeroDistritoLibreta'] > 0){
					$cadenaSql .=  $variable ['numeroDistritoLibreta'] . ', ';
				}else{
					$cadenaSql .= 'NULL, ';
				}
				if($variable ['soporteLibreta'] != NULL){
					$cadenaSql .= '\'' . $variable ['soporteLibreta'] . '\', ';
				}else{
					$cadenaSql .= '\'\', ';
				}
				
				if($_REQUEST ['funcionarioGrupoEtnico'] != 'NULL'){
					$cadenaSql .= '\'' . $_REQUEST ['funcionarioGrupoEtnico'] . '\', ';
				}else{
					$cadenaSql .= $_REQUEST ['funcionarioGrupoEtnico'] . ', ';
				}
				$cadenaSql .=  $_REQUEST ['funcionarioGrupoLGBT'] . ', ';
				$cadenaSql .=  $_REQUEST ['funcionarioCabezaFamilia'] . ', ';
				$cadenaSql .=  $_REQUEST ['funcionarioPersonasCargo'] . ', ';
				$cadenaSql .= '\'' . $variable ['soporteCaracterizacion'] . '\' ';
				$cadenaSql .= ') ';
				$cadenaSql .= "RETURNING  id_informacion_personal_basica; ";
				break;
                
                
            case 'actualizarRegistro' :
                $cadenaSql = 'INSERT INTO ';
                $cadenaSql .= $prefijo . 'pagina ';
                $cadenaSql .= '( ';
                $cadenaSql .= 'nombre,';
                $cadenaSql .= 'descripcion,';
                $cadenaSql .= 'modulo,';
                $cadenaSql .= 'nivel,';
                $cadenaSql .= 'parametro';
                $cadenaSql .= ') ';
                $cadenaSql .= 'VALUES ';
                $cadenaSql .= '( ';
                $cadenaSql .= '\'' . $_REQUEST ['nombrePagina'] . '\', ';
                $cadenaSql .= '\'' . $_REQUEST ['descripcionPagina'] . '\', ';
                $cadenaSql .= '\'' . $_REQUEST ['moduloPagina'] . '\', ';
                $cadenaSql .= $_REQUEST ['nivelPagina'] . ', ';
                $cadenaSql .= '\'' . $_REQUEST ['parametroPagina'] . '\'';
                $cadenaSql .= ') ';
                break;
            
            case 'buscarRegistro' :
                
                $cadenaSql = 'SELECT ';
                $cadenaSql .= 'id_pagina as PAGINA, ';
                $cadenaSql .= 'nombre as NOMBRE ';
                //$cadenaSql .= 'descripcion as DESCRIPCION,';
                //$cadenaSql .= 'modulo as MODULO,';
                //$cadenaSql .= 'nivel as NIVEL,';
                //$cadenaSql .= 'parametro as PARAMETRO ';
                $cadenaSql .= 'FROM ';
                $cadenaSql .= $prefijo . 'pagina ';
                //$cadenaSql .= 'WHERE ';
                //$cadenaSql .= 'nombre=\'' . $_REQUEST ['nombrePagina'] . '\' ';
                break;
                
             case 'buscarPais' :
                
               	$cadenaSql = 'SELECT ';
                	$cadenaSql .= 'id_pais as ID_PAIS, ';
                	$cadenaSql .= 'nombre_pais as NOMBRE ';
                	$cadenaSql .= 'FROM ';
                	$cadenaSql .= 'otro.pais';
                	break;
             
              case 'buscarDepartamento' :
                	
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
               		$cadenaSql .= 'id_pais = '.$variable.';';
               		break;
             
               	case 'buscarCiudad' :
               		 
            		$cadenaSql = 'SELECT ';
               		$cadenaSql .= 'id_ciudad as ID_CIUDAD, ';
               		$cadenaSql .= 'nombre as NOMBRE ';
               		$cadenaSql .= 'FROM ';
               		$cadenaSql .= 'otro.ciudad ';
               		$cadenaSql .= 'WHERE ';
               		$cadenaSql .= 'ab_pais = \'CO\';';
               		break;
               			 
                	
             case 'buscarRegistroUsuario' :
                
                	$cadenaSql = 'SELECT ';
                	$cadenaSql .= 'cedula as USUARIO, ';
                	$cadenaSql .= 'nombre as NOMBRE, ';
                	$cadenaSql .= 'apellido as APELLIDO, ';
                	$cadenaSql .= 'fecha_reg as FECHA_REG, ';
                	$cadenaSql .= 'edad as EDAD, ';
                	$cadenaSql .= 'telefono as TELEFONO, ';
                	$cadenaSql .= 'direccion as DIRECCION, ';
                	$cadenaSql .= 'ciudad as CIUDAD, ';
                	$cadenaSql .= 'estado as ESTADO ';
                	//$cadenaSql .= 'descripcion as DESCRIPCION,';
                	//$cadenaSql .= 'modulo as MODULO,';
                	//$cadenaSql .= 'nivel as NIVEL,';
                	//$cadenaSql .= 'parametro as PARAMETRO ';
                	$cadenaSql .= 'FROM ';
                	$cadenaSql .= "nomina." .$prefijo . 'usuarios';
                	//$cadenaSql .= 'WHERE ';
                	//$cadenaSql .= 'nombre=\'' . $_REQUEST ['nombrePagina'] . '\' ';
                	break;
                	
                case 'buscarRegistroUsuarioWhere' :
                		$cadenaSql = 'SELECT ';
                		$cadenaSql .= 'id_usuario as USUARIO, ';
                		$cadenaSql .= 'nombre as NOMBRE, ';
                		$cadenaSql .= 'apellido as APELLIDO, ';
                		$cadenaSql .= 'fecha_reg as FECHA_REG, ';
                		$cadenaSql .= 'edad as EDAD, ';
                		$cadenaSql .= 'telefono as TELEFONO, ';
                		$cadenaSql .= 'direccion as DIRECCION, ';
                		$cadenaSql .= 'ciudad as CIUDAD, ';
                		$cadenaSql .= 'estado as ESTADO ';
                		//$cadenaSql .= 'descripcion as DESCRIPCION,';
                		//$cadenaSql .= 'modulo as MODULO,';
                		//$cadenaSql .= 'nivel as NIVEL,';
                		//$cadenaSql .= 'parametro as PARAMETRO ';
                		$cadenaSql .= 'FROM ';
                		$cadenaSql .= "nomina." .$prefijo . 'usuarios ';
                		$cadenaSql .= 'WHERE ';
                		$cadenaSql .= 'fecha_reg <=\'' . $_REQUEST ['funcionarioFechaExpDoc'] . '\' ';
                break;

            case 'borrarRegistro' :
                $cadenaSql = 'INSERT INTO ';
                $cadenaSql .= $prefijo . 'pagina ';
                $cadenaSql .= '( ';
                $cadenaSql .= 'nombre,';
                $cadenaSql .= 'descripcion,';
                $cadenaSql .= 'modulo,';
                $cadenaSql .= 'nivel,';
                $cadenaSql .= 'parametro';
                $cadenaSql .= ') ';
                $cadenaSql .= 'VALUES ';
                $cadenaSql .= '( ';
                $cadenaSql .= '\'' . $_REQUEST ['nombrePagina'] . '\', ';
                $cadenaSql .= '\'' . $_REQUEST ['descripcionPagina'] . '\', ';
                $cadenaSql .= '\'' . $_REQUEST ['moduloPagina'] . '\', ';
                $cadenaSql .= $_REQUEST ['nivelPagina'] . ', ';
                $cadenaSql .= '\'' . $_REQUEST ['parametroPagina'] . '\'';
                $cadenaSql .= ') ';
                break;
        
        }
        return $cadenaSql;
    
    }
}
?>
