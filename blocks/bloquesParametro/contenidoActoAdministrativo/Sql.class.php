<?php

namespace bloquesModelo\bloqueContenido;

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
                $cadenaSql .= $variable ['nivelRegistro'] . ', ';
                $cadenaSql .= $variable ['codAlternativoRegistro'] . ', ';
                $cadenaSql .= $variable ['gradoRegistro'] . ', ';
                $cadenaSql .= '\'' . $variable ['nombreRegistro']  . '\', ';
                $cadenaSql .= '\'' . $variable ['codTipoCargoRegistro'] . '\', ';
                $cadenaSql .= $variable ['sueldoRegistro'] . ', ';
                $cadenaSql .= '\'' . $variable['tipoSueldoRegistro'] . '\', ';
                $cadenaSql .= '\'' . $variable['estadoRegistro'] . '\' ';
                $cadenaSql .= ') ';
                break;
            
            
            case 'buscarRegistroxtipoActo' :
                
                	$cadenaSql = 'SELECT ';
                        $cadenaSql .= 'nombre as NOMBRE ';
                        $cadenaSql .= 'FROM ';
                        $cadenaSql .= 'parametro.tipo_acto ';
                        $cadenaSql .= 'WHERE ';
                        $cadenaSql .= 'id_tipo_acto = ';
                        $cadenaSql .= '\'' . $variable  . '\'';
                        
                break;
          
                
             case 'buscarRegistroxAA' :
                
                	$cadenaSql = 'SELECT ';
                        $cadenaSql .= 'nit as NIT, ';
                        $cadenaSql .= 'id_tipo_acto as ID_TIPO_ACTO, ';
                        $cadenaSql .= 'estado as ESTADO ';
                        $cadenaSql .= 'FROM ';
                        $cadenaSql .= 'parametro.acto_administrativo';
//                        $cadenaSql .= 'WHERE ';
//                        $cadenaSql .= 'nombre=\'' . $_REQUEST ['usuario']  . '\' AND ';
//                        $cadenaSql .= 'clave=\'' . $claveEncriptada . '\' ';
                        
                break;
                	
                case 'buscarModificarxCargo' :
                
                	$cadenaSql = 'SELECT ';
                        $cadenaSql .= 'codigo_cargo as COD_CARGO, ';
                        $cadenaSql .= 'nivel as NIVEL, ';
                        $cadenaSql .= 'codigo_alternativo as COD_ALTERNATIVO,';
                        $cadenaSql .= 'grado as GRADO,';
                        $cadenaSql .= 'nombre as NOMBRE,';
                        $cadenaSql .= 'cod_tipo_cargo as COD_TIPO, ';
                        $cadenaSql .= 'sueldo as SUELDO, ';
                        $cadenaSql .= 'tipo_sueldo as TIPO_SUELDO ';
                        $cadenaSql .= 'FROM ';
                        $cadenaSql .= 'parametro.cargo';
                        
                break;
            
            
            case 'buscarVerdetallexCargo' :
                
                	$cadenaSql = 'SELECT ';
                        $cadenaSql .= 'codigo_cargo as COD_CARGO, ';
                        $cadenaSql .= 'nivel as NIVEL, ';
                        $cadenaSql .= 'codigo_alternativo as COD_ALTERNATIVO,';
                        $cadenaSql .= 'grado as GRADO,';
                        $cadenaSql .= 'nombre as NOMBRE,';
                        $cadenaSql .= 'cod_tipo_cargo as COD_TIPO, ';
                        $cadenaSql .= 'sueldo as SUELDO, ';
                        $cadenaSql .= 'tipo_sueldo as TIPO_SUELDO, ';
                        $cadenaSql .= 'estado as ESTADO ';
                        $cadenaSql .= 'FROM ';
                        $cadenaSql .= 'parametro.cargo';
                        
                break;

            case 'modificarRegistro' :
                $cadenaSql = 'UPDATE ';
                $cadenaSql .= 'parametro.cargo ';
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
                $cadenaSql .= 'parametro.cargo ';
                $cadenaSql .= 'SET ';
                $cadenaSql .= 'estado = ';
                $cadenaSql .= '\'' . $variable ['estadoRegistro']  . '\' ';
                $cadenaSql .= 'WHERE ';
                $cadenaSql .= 'codigo_cargo = ';
                $cadenaSql .= '\'' . $variable ['codigoRegistro']  . '\'';
                break;
        
        }
        
       
        
        return $cadenaSql;
    
    }
}
?>
