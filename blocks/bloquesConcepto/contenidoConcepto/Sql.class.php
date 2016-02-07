<?php

namespace bloquesConcepto\contenidoConcepto;

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
            case 'insertarConcepto' :
                $cadenaSql = 'INSERT INTO ';
                $cadenaSql .= 'concepto.concepto ';
                $cadenaSql .= '( ';
                $cadenaSql .= 'nombre,';
                $cadenaSql .= 'simbolo,';
                $cadenaSql .= 'estado,';
                $cadenaSql .= 'id,';
                $cadenaSql .= 'naturaleza,';
                $cadenaSql .= 'descripcion,';
                $cadenaSql .= 'formula';
                $cadenaSql .= ') ';
                $cadenaSql .= 'VALUES ';
                $cadenaSql .= '( ';
                $cadenaSql .= '\'' . $variable ['nombre']  . '\', ';
                $cadenaSql .= '\'' . $variable ['simbolo']  . '\', ';
                $cadenaSql .= '\'Activo\', ';
                $cadenaSql .= $variable ['categoria'] . ', ';
                $cadenaSql .= '\'' . $variable ['naturaleza'] . '\', ';
                $cadenaSql .= '\'' . $variable ['descripcion'] . '\', ';
                $cadenaSql .= '\'' . $variable ['formula'] . '\' ';
                $cadenaSql .= ') ';
                $cadenaSql .= "RETURNING  codigo; ";
                break;
                
			case 'insertarLeyesConcepto' :
				$cadenaSql = 'INSERT INTO ';
				$cadenaSql .= 'concepto.ldnxconcepto ';
				$cadenaSql .= '( ';
				$cadenaSql .= 'id_ldn,';
				$cadenaSql .= 'codigo';
				$cadenaSql .= ') ';
				$cadenaSql .= 'VALUES ';
				$cadenaSql .= '( ';
				$cadenaSql .= $variable ['fk_id_ley'] . ', ';
				$cadenaSql .= $variable ['fk_concepto'];
				$cadenaSql .= '); ';
				break;
				
			case 'insertarCondicion' :
				$cadenaSql = 'INSERT INTO ';
				$cadenaSql .= 'concepto.condicion ';
				$cadenaSql .= '( ';
				$cadenaSql .= 'codigo,';
				$cadenaSql .= 'cadena';
				$cadenaSql .= ') ';
				$cadenaSql .= 'VALUES ';
				$cadenaSql .= '( ';
				$cadenaSql .= $variable ['fk_concepto'] . ', ';
				$cadenaSql .= '\'' . $variable ['cadena']  . '\' ';
				$cadenaSql .= '); ';
				break;
                
            case 'buscarRegistroxParametro' :      
                $cadenaSql = 'SELECT ';
                $cadenaSql .= 'id as ID, ';
                $cadenaSql .= 'simbolo as SIMBOLO ';
                $cadenaSql .= 'FROM ';
                $cadenaSql .= 'parametro.parametro_liquidacion';        
                break;
                
			case 'buscarRegistroxConcepto' :
				$cadenaSql = 'SELECT ';
				$cadenaSql .= 'codigo as ID, ';
				$cadenaSql .= 'simbolo as SIMBOLO ';
				$cadenaSql .= 'FROM ';
				$cadenaSql .= 'concepto.concepto';
				break;
				
			case 'buscarLey' :
				$cadenaSql = 'SELECT ';
				$cadenaSql .= 'id_ldn as ID, ';
				$cadenaSql .= 'nombre as NOMBRE ';
				$cadenaSql .= 'FROM ';
				$cadenaSql .= 'parametro.ley_decreto_norma ';
				break;
				
			case 'buscarParametroAjax' :
				$cadenaSql = 'SELECT ';
				$cadenaSql .= 'id as ID_CATEGORIA, ';
				$cadenaSql .= 'simbolo as SIMBOLO ';
				$cadenaSql .= 'FROM ';
				$cadenaSql .= 'parametro.parametro_liquidacion ';
				$cadenaSql .= 'WHERE ';
				$cadenaSql .= 'id_categoria = ' . $variable . ';';
				break;
				
			case 'buscarConceptoAjax' :
				$cadenaSql = 'SELECT ';
				$cadenaSql .= 'codigo as ID, ';
				$cadenaSql .= 'simbolo as SIMBOLO ';
				$cadenaSql .= 'FROM ';
				$cadenaSql .= 'concepto.concepto ';
				$cadenaSql .= 'WHERE ';
				$cadenaSql .= 'id = ' . $variable . ';';
				break;
        }
                
        
        return $cadenaSql;
    
    }
}
?>
