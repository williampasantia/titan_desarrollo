<?php

namespace bloquesConcepto\asociacionConcepto;

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
            
            case 'buscarArl':
                $cadenaSql = 'SELECT ';
                $cadenaSql .= 'nit as NIT, ';
                $cadenaSql .= 'nombre as NOMBRE, ';
                $cadenaSql .= 'direccion as DIRECCION, ';
                $cadenaSql .= 'telefono as TELEFONO, ';
                $cadenaSql .= 'extencion_telefono as EXTENCION_TELEFONO, ';
                $cadenaSql .= 'estado as ESTADO ';
                $cadenaSql .= 'FROM ';
                $cadenaSql .= 'parametro.arl';
                break;
         case 'buscarArl1':
                $cadenaSql = 'SELECT ';
                $cadenaSql .= 'nit as NIT, ';
                $cadenaSql .= 'nombre as NOMBRE, ';
                $cadenaSql .= 'direccion as DIRECCION, ';
                $cadenaSql .= 'telefono as TELEFONO, ';
                $cadenaSql .= 'extencion_telefono as EXTENCION_TELEFONO, ';
                $cadenaSql .= 'fax as FAX, ';
                $cadenaSql .= 'extencion_fax as EXTENCION_FAX, ';
                $cadenaSql .= 'lugar as LUGAR,';
                $cadenaSql .= 'nombre_representante_legal as NOMBRE_REPRESENTANTE_LEGAL, ';
                $cadenaSql .= 'email as EMAIL, ';
                $cadenaSql .= 'estado as ESTADO ';
                $cadenaSql .= 'FROM ';
                $cadenaSql .= 'parametro.arl';
                break;
            
              case 'modificarRegistro' :
                $cadenaSql = 'UPDATE ';
                $cadenaSql .= 'parametro.arl ';
                $cadenaSql .= 'SET ';
                $cadenaSql .= 'nombre = ';
                $cadenaSql .= "'".$variable ['nombre'] . "',";
                $cadenaSql .= 'direccion = ';
                $cadenaSql .= "'".$variable ['direccion']  . "',";
                $cadenaSql .= 'telefono = ';
                $cadenaSql .= $variable ['telefono']  . ', ';
                if($variable ['extencionTelefono']!='')
                {
                 $cadenaSql .= 'extencion_telefono= '; 
                 $cadenaSql .= $variable ['extencionTelefono'] . ', ';   
                 
                }
                 if($variable ['fax']!='')
                {
                   $cadenaSql .= 'fax= '; 
                   $cadenaSql .= $variable ['fax'] . ', ';
                }
                 if($variable ['extencionFax']!='')
                {
                   $cadenaSql .= 'extencion_fax=';
                   $cadenaSql .= $variable ['extencionFax'] . ', ';
                }
               
                if($variable ['lugar']!='')
                {
                     $cadenaSql .= 'lugar = ';
                     $cadenaSql .= $variable ['lugar']  . ",";
                }
               if($variable ['lugar']!='')
                {
                $cadenaSql .= 'nombre_representante_legal = ';
                $cadenaSql .= "'".$variable ['nombreRepresentante']  . "',";
                }
                $cadenaSql .= 'email = ';
                $cadenaSql .= "'".$variable ['email']."'";
                $cadenaSql .= ' WHERE ';
                $cadenaSql .= 'nit = ';
                $cadenaSql .= $variable ['nit']  .';';
                break;
                
            case 'inactivarRegistro' :
                $cadenaSql = 'UPDATE ';
                $cadenaSql .= 'concepto.asociacion_concepto ';
                $cadenaSql .= 'SET ';
                $cadenaSql .= 'estado = ';
                $cadenaSql .= "'". $variable ['estadoRegistro']  ."' ";
                $cadenaSql .= 'WHERE ';
                $cadenaSql .= 'id = ';
                $cadenaSql .= $variable ['codigoRegistro'].";";
                break;
        
        
             case "registrarAsociacion" :
		$cadenaSql = 'INSERT INTO ';
                $cadenaSql .= 'concepto.asociacion_concepto';
                $cadenaSql .= '( ';
                              
             
                $cadenaSql .= 'codigo_concepto,';
                $cadenaSql .= 'tipo_vinculacion,';
                $cadenaSql .= 'tipo_nomina,';
                $cadenaSql .= 'estado';
                $cadenaSql .= ') ';
                $cadenaSql .= 'VALUES ';
                $cadenaSql .= '( ';
                $cadenaSql .= $variable ['codigo_concepto'] . ', ';
                
                $cadenaSql .= $variable ['tipo_vinculacion']  . ', ' ;
               
                $cadenaSql .= $variable ['tipo_nomina'] . ', ';
                $cadenaSql .= '\'' . 'Activo' . '\' ';
                $cadenaSql .= ') ';
		
				break;  
            
            case 'insertarRegistro' :
                $cadenaSql = 'INSERT INTO ';
                $cadenaSql .= 'parametro.cargo ';
                $cadenaSql .= '( ';
                $cadenaSql .= 'nivel,';
                $cadenaSql .= 'codigo_alternativo,';
                $cadenaSql .= 'grado,';
                $cadenaSql .= 'nombre,';
                $cadenaSql .= 'cod_tipo_cargo,';
                $cadenaSql .= 'sueldo,';
                $cadenaSql .= 'tipo_sueldo,';
                $cadenaSql .= 'estado';
                $cadenaSql .= ') ';
                $cadenaSql .= 'VALUES ';
                $cadenaSql .= '( ';
                $cadenaSql .= $_REQUEST ['nivelRegistro'] . ', ';
                $cadenaSql .= $_REQUEST ['codAlternativoRegistro'] . ', ';
                $cadenaSql .= $_REQUEST ['gradoRegistro'] . ', ';
                $cadenaSql .= '\'' . $_REQUEST ['nombreRegistro']  . '\', ';
                $cadenaSql .= '\'' . $_REQUEST ['codTipoCargoRegistro'] . '\', ';
                $cadenaSql .= $_REQUEST ['sueldoRegistro'] . ', ';
                $cadenaSql .= '\'' . $_REQUEST ['tipoSueldoRegistro'] . '\', ';
                $cadenaSql .= '\'' . 'Activo' . '\' ';
                $cadenaSql .= ') ';
                echo $cadenaSql;
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
                
             case 'buscarRegistroxCargo' :
                
                	$cadenaSql = 'SELECT ';
                        $cadenaSql .= 'codigo_cargo as COD_CARGO, ';
                        $cadenaSql .= 'nivel as NIVEL, ';
                        $cadenaSql .= 'codigo_alternativo as COD_ALTERNATIVO,';
                        $cadenaSql .= 'grado as GRADO,';
                        $cadenaSql .= 'nombre as NOMBRE,';
                        $cadenaSql .= 'cod_tipo_cargo as COD_TIPO, ';
                        $cadenaSql .= 'estado as ESTADO ';
                        $cadenaSql .= 'FROM ';
                        $cadenaSql .= 'parametro.cargo';
//                        $cadenaSql .= 'WHERE ';
//                        $cadenaSql .= 'nombre=\'' . $_REQUEST ['usuario']  . '\' AND ';
//                        $cadenaSql .= 'clave=\'' . $claveEncriptada . '\' ';
                        
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
                		$cadenaSql .= "parametro." .$prefijo . 'usuarios ';
//                		$cadenaSql .= 'WHERE ';
//                		$cadenaSql .= 'fecha_reg <=\'' . $_REQUEST ['fechaRegistroConsulta'] . '\' ';
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
         case 'buscarConcepto' :
				
				$cadenaSql = 'SELECT ';
				$cadenaSql .= 'codigo as ID, ';
				$cadenaSql .= 'nombre as NOMBRE ';
				$cadenaSql .= 'FROM ';
				$cadenaSql .= 'concepto.concepto ';
				
				break;
                            case 'buscarConceptoAso' :
				
				$cadenaSql = 'SELECT ';
				$cadenaSql .= 'd.nombre as CONCEPTO, ';
                                $cadenaSql .= 'a.nombre as TIPO_VINCULACION, ';
                                $cadenaSql .= 'c.nombre as TIPO_NOMINA, ';
				$cadenaSql .= 'b.estado as ESTADO, ';
                                $cadenaSql .= 'b.id as ID ';
				$cadenaSql .= 'FROM ';
				$cadenaSql .= 'parametro.tipo_vinculacion a, ';
                                $cadenaSql .= 'concepto.asociacion_concepto b, ';
                                $cadenaSql .= 'liquidacion.nomina c, ';
                                $cadenaSql .= 'concepto.concepto d ';
                                $cadenaSql .= 'WHERE ';
				$cadenaSql .= 'a.id=b.tipo_vinculacion and  ';
                                $cadenaSql .= 'd.codigo=b.codigo_concepto and   ';
                                $cadenaSql .= 'b.tipo_nomina= c.codigo_nomina ;   ';
				
				break;
         case 'buscarTipoVinculacion1' :
				
				$cadenaSql = 'SELECT ';
				$cadenaSql .= 'id as ID, ';
				$cadenaSql .= 'nombre as NOMBRE ';
				$cadenaSql .= 'FROM ';
				$cadenaSql .= 'parametro.tipo_vinculacion';
				
				break;                    
                            
                            
      case 'buscarTipoVinculacion':
                $cadenaSql = 'SELECT ';
                $cadenaSql .= 'id as ID, ';
                $cadenaSql .= 'nombre as NOMBRE ';
                $cadenaSql .= 'FROM ';
                $cadenaSql .= 'parametro.tipo_vinculacion';
                break;
            
            
          case 'buscarNomina':
                $cadenaSql = 'SELECT ';
                $cadenaSql .= 'codigo_nomina as CODIGO_NOMINA, ';
                $cadenaSql .= 'nombre as NOMBRE ';
               
                $cadenaSql .= 'FROM ';
                $cadenaSql .= 'liquidacion.nomina ';
               
           
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
                            case 'buscarDepartamentoEspecifico' ://Provisionalmente solo Departamentos de Colombia
				
				$cadenaSql = 'SELECT ';
				$cadenaSql .= 'nombre as NOMBRE ';
				$cadenaSql .= 'FROM ';
				$cadenaSql .= 'otro.departamento ';
				$cadenaSql .= 'WHERE ';
				$cadenaSql .= 'id_pais = 112 and ';
                                $cadenaSql .= 'id_departamento = '.$variable;
				break;
                            case 'buscarCiudadEspecifico' ://Provisionalmente solo Departamentos de Colombia
				
				$cadenaSql = 'SELECT ';
				$cadenaSql .= 'nombre as NOMBRE ';
				$cadenaSql .= 'FROM ';
				$cadenaSql .= 'otro.ciudad ';
				$cadenaSql .= 'WHERE ';
			        $cadenaSql .= 'id_ciudad = '.$variable;
				break;
                        case 'buscarIdUbicacion' :
				
				$cadenaSql = 'SELECT ';
				$cadenaSql .= 'id_ubicacion as ID_UBICACION ';
				$cadenaSql .= 'FROM ';
				$cadenaSql .= 'otro.ubicacion ';
				$cadenaSql .= 'WHERE ';
                                $cadenaSql .= 'id_pais = ';
                                $cadenaSql .=  112 . ' AND ';
                                $cadenaSql .= 'id_departamento = '; 
                                $cadenaSql .= $variable ['fdpDepartamento'] . ' AND ';
                                $cadenaSql .= 'id_ciudad = ';
                                $cadenaSql .= $variable ['fdpCiudad'] . ';';
				break;  
                       case 'buscarUbicacion' :
				
				$cadenaSql = 'SELECT ';
				$cadenaSql .= 'id_ciudad as ID_CIUDAD, ';
                                $cadenaSql .= 'id_departamento as ID_DEPARTAMENTO ';
				$cadenaSql .= 'FROM ';
				$cadenaSql .= 'otro.ubicacion ';
				$cadenaSql .= 'WHERE ';
                                $cadenaSql .= 'id_ubicacion = ';
                                $cadenaSql .= $variable .'';
		       break;   
                       case 'buscarCiudadUbicacion' :
				
				$cadenaSql = 'SELECT ';
				$cadenaSql .= 'nombre as NOMBRE, ';
                                $cadenaSql .= 'departamento as DEPARTAMENTO ';
				$cadenaSql .= 'FROM ';
				$cadenaSql .= 'otro.ciudad ';
				$cadenaSql .= 'WHERE ';
                                $cadenaSql .= 'id_ciudad = ';
                                $cadenaSql .= $variable .'';
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
                $cadenaSql .= 112 . ', ';
                $cadenaSql .= $variable ['fdpDepartamento'] . ', ';
                $cadenaSql .= $variable ['fdpCiudad'] . '';
                $cadenaSql .= ') ';
				break;  
        }
        
        return $cadenaSql;
    
    }
}
?>
