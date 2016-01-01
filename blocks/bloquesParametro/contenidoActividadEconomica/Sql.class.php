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
                $cadenaSql .= 'parametro.actividad_economica ';
                $cadenaSql .= '( ';
                $cadenaSql .= 'codigo,';
                $cadenaSql .= 'nombre,';
                $cadenaSql .= 'estado';
                $cadenaSql .= ') ';
                $cadenaSql .= 'VALUES ';
                $cadenaSql .= '( ';
                $cadenaSql .= $variable ['codigo'] . ', ';
                $cadenaSql .= '\'' . $variable ['nombreRegistro']  . '\', ';
                $cadenaSql .= '\'' . $variable['estadoRegistro'] . '\' ';
                $cadenaSql .= ') ';
                break;
            
            
            
          
                
             case 'buscarRegistroxAE' :
                
                	$cadenaSql = 'SELECT ';
                        $cadenaSql .= 'codigo as CODIGO, ';
                        $cadenaSql .= 'nombre as NOMBRE,';
                        $cadenaSql .= 'estado as ESTADO ';
                        $cadenaSql .= 'FROM ';
                        $cadenaSql .= 'parametro.actividad_economica';
//                        $cadenaSql .= 'WHERE ';
//                        $cadenaSql .= 'nombre=\'' . $_REQUEST ['usuario']  . '\' AND ';
//                        $cadenaSql .= 'clave=\'' . $claveEncriptada . '\' ';
                        
                break;
                	
                case 'buscarModificarxAE' :
                
                	$cadenaSql = 'SELECT ';
                        $cadenaSql .= 'codigo as CODIGO, ';
                        $cadenaSql .= 'nombre as NOMBRE,';
                        $cadenaSql .= 'estado as ESTADO ';
                        $cadenaSql .= 'FROM ';
                        $cadenaSql .= 'parametro.actividad_economica';
                        
                break;
            
            
            case 'buscarVerdetallexAE' :
                
                	$cadenaSql = 'SELECT ';
                        $cadenaSql .= 'codigo as CODIGO, ';
                        $cadenaSql .= 'nombre as NOMBRE, ';
                        $cadenaSql .= 'estado as ESTADO ';
                        $cadenaSql .= 'FROM ';
                        $cadenaSql .= 'parametro.actividad_economica';
                        
                break;

            case 'modificarRegistro' :
                $cadenaSql = 'UPDATE ';
                $cadenaSql .= 'parametro.actividad_economica ';
                $cadenaSql .= 'SET ';
                $cadenaSql .= 'nombre = ';
                $cadenaSql .= '\'' . $variable ['nombreRegistro']  . '\' ';
                $cadenaSql .= 'WHERE ';
                $cadenaSql .= 'codigo = ';
                $cadenaSql .= '\'' . $variable ['codigo']  . '\'';
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
