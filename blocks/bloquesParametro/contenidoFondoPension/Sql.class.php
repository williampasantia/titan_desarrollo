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
        
        switch ($tipo) {
            
            /**
             * Clausulas específicas
             */
           case 'insertarRegistro' :
                $cadenaSql = 'INSERT INTO ';
                $cadenaSql .= 'parametro.fondo_pensiones ';
                $cadenaSql .= '( ';
                $cadenaSql .= 'nit,';                
                $cadenaSql .= 'id_ubicacion,';
                $cadenaSql .= 'nombre,';
                $cadenaSql .= 'direccion,';
                $cadenaSql .= 'telefono,';
                $cadenaSql .= 'ext_telefono,';
                $cadenaSql .= 'fax,';
                $cadenaSql .= 'ext_fax,';
                $cadenaSql .= 'nom_representante,';
                $cadenaSql .= 'email,';
                $cadenaSql .= 'estado';
                $cadenaSql .= ') ';
                $cadenaSql .= 'VALUES ';
                $cadenaSql .= '( ';
                $cadenaSql .= $variable ['nitRegistro'] . ', ';
                $cadenaSql .= $variable ['lugarRegistro'] . ', ';
                $cadenaSql .= '\'' . $variable ['nombreRegistro']  . '\', ';
                $cadenaSql .= '\'' . $variable ['direccionRegistro']  . '\', ';
                $cadenaSql .= $variable ['telefonoRegistro'] . ', ';
                $cadenaSql .= $variable ['extTelefonoRegistro'] . ', ';
                $cadenaSql .= $variable ['faxRegistro'] . ', ';
                $cadenaSql .= $variable ['extFaxRegistro'] . ', ';
                $cadenaSql .= '\'' . $variable ['nomRepreRegistro'] . '\', ';
                $cadenaSql .= '\'' . $variable ['emailRegistro'] . '\', ';
                $cadenaSql .= '\'' . 'Activo' . '\' ';
                $cadenaSql .= ') ';
                break;
            
                
             case 'buscarRegistroxFP' :
                
                	$cadenaSql = 'SELECT ';
                        $cadenaSql .= 'nit as NIT, ';
                        $cadenaSql .= 'nombre as NOMBRE, ';
                        $cadenaSql .= 'estado as ESTADO ';
                        $cadenaSql .= 'FROM ';
                        $cadenaSql .= 'parametro.fondo_pensiones ';
//                        $cadenaSql .= 'WHERE ';
//                        $cadenaSql .= 'nombre=\'' . $_REQUEST ['usuario']  . '\' AND ';
//                        $cadenaSql .= 'clave=\'' . $claveEncriptada . '\' ';
                break;
             
                case 'buscarModificarxFP' :
                
                	$cadenaSql = 'SELECT ';
                        $cadenaSql .= 'nit as NIT, ';
                        $cadenaSql .= 'id_ubicacion as ID_UBICACION, ';
                        $cadenaSql .= 'nombre as NOMBRE,';
                        $cadenaSql .= 'direccion as DIRECCION,';
                        $cadenaSql .= 'telefono as TELEFONO,';
                        $cadenaSql .= 'ext_telefono as EXT_TELEFONO, ';
                        $cadenaSql .= 'fax as FAX, ';
                        $cadenaSql .= 'ext_fax as EXT_FAX, ';
                        $cadenaSql .= 'nom_representante as NOM_REPRESENTANTE, ';
                        $cadenaSql .= 'email as EMAIL ';
                        $cadenaSql .= 'FROM ';
                        $cadenaSql .= 'parametro.fondo_pensiones';
                        
                break;       
            
             case 'buscarVerdetallexFP' :
                
                	$cadenaSql = 'SELECT ';
                        $cadenaSql .= 'nit as NIT, ';
                        $cadenaSql .= 'id_ubicacion as ID_UBICACION, ';
                        $cadenaSql .= 'nombre as NOMBRE,';
                        $cadenaSql .= 'direccion as DIRECCION,';
                        $cadenaSql .= 'telefono as TELEFONO,';
                        $cadenaSql .= 'ext_telefono as EXT_TELEFONO, ';
                        $cadenaSql .= 'fax as FAX, ';
                        $cadenaSql .= 'ext_fax as EXT_FAX, ';
                        $cadenaSql .= 'nom_representante as NOM_REPRESENTANTE, ';
                        $cadenaSql .= 'email as EMAIL, ';
                        $cadenaSql .= 'estado as ESTADO ';
                        $cadenaSql .= 'FROM ';
                        $cadenaSql .= 'parametro.fondo_pensiones';
                        
                break;
                
            case 'modificarRegistro' :
                $cadenaSql = 'UPDATE ';
                $cadenaSql .= 'parametro.fondo_pensiones ';
                $cadenaSql .= 'SET ';
                $cadenaSql .= 'id_ubicacion = ';
                $cadenaSql .= $variable ['lugarRegistro'] . ', ';
                $cadenaSql .= 'nombre = ';
                $cadenaSql .= '\'' . $variable ['nombreRegistro']  . '\', ';
                $cadenaSql .= 'direccion = ';
                $cadenaSql .= '\'' . $variable ['direccionRegistro']  . '\', ';
                $cadenaSql .= 'telefono = ';
                $cadenaSql .= $variable ['telefonoRegistro'] . ', ';
                $cadenaSql .= 'ext_telefono = ';
                $cadenaSql .= $variable ['extTelefonoRegistro'] . ', ';
                $cadenaSql .= 'fax = ';
                $cadenaSql .= $variable ['faxRegistro'] . ', ';
                $cadenaSql .= 'ext_fax = ';
                $cadenaSql .= $variable ['extFaxRegistro'] . ', ';
                $cadenaSql .= 'nom_representante = ';
                $cadenaSql .= '\'' . $variable ['nomRepreRegistro'] . '\', ';
                $cadenaSql .= 'email = ';
                $cadenaSql .= '\'' . $variable ['emailRegistro'] . '\' ';
                $cadenaSql .= 'WHERE ';
                $cadenaSql .= 'nit = ';
                $cadenaSql .= $variable ['nitRegistro'] . ' ';
                break;
               
              case 'inactivarRegistro' :
                $cadenaSql = 'UPDATE ';
                $cadenaSql .= 'parametro.fondo_pensiones ';
                $cadenaSql .= 'SET ';
                $cadenaSql .= 'estado = ';
                $cadenaSql .= '\'' . $variable ['estadoRegistro']  . '\' ';
                $cadenaSql .= 'WHERE ';
                $cadenaSql .= 'nit = ';
                $cadenaSql .= '\'' . $variable ['nitRegistro']  . '\'';
              break;
        
        }
        
        return $cadenaSql;
    
    }
}
?>
