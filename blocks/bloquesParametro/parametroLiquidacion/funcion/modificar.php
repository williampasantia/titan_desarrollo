<?php

namespace bloquesParametro\parametroLiquidacion\funcion;
    
include_once('Redireccionador.php');
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
        //Aquí va la lógica de procesamiento
        
        
       $conexion = 'estructura';
        $primerRecursoDB = $this->miConfigurador->fabricaConexiones->getRecursoDB($conexion);
        
          if($_REQUEST ['ley']){
              
              $datos = array(
            'id' => $_REQUEST ['id'],
            'nombre' => $_REQUEST ['nombre'],
            'descripcion' => $_REQUEST ['descripcion'],
            'ley' => $_REQUEST ['ley'],
            'valor' => $_REQUEST ['valor'],
            
            
        );
             
          
       }else 
       {
        $datos = array(
            'id' => $_REQUEST ['id'],
            'nombre' => $_REQUEST ['nombre'],
            'descripcion' => $_REQUEST ['descripcion'],
              'ley' => '',
            'valor' => $_REQUEST ['valor'],
            
        );
//       
       }
                 if(isset ( $_REQUEST ['regresar'] ) && $_REQUEST ['regresar'] == "true"){
                    
                     Redireccionador::redireccionar('form'); 
                     exit;
                }
      
        $atributos ['cadena_sql'] = $this->miSql->getCadenaSql("modificarRegistro",$datos);
       
                
  
        
        
        $resultado=$primerRecursoDB->ejecutarAcceso($atributos['cadena_sql'], "acceso");
        //Al final se ejecuta la redirección la cual pasará el control a otra página
    
      
   if (!empty($resultado)) {
      

            Redireccionador::redireccionar('modifico');
            
            exit();
        } else {
       
        
           Redireccionador::redireccionar('nomodifico');
            exit();
        }
        
    	        
    }
    
    function resetForm(){
        foreach($_REQUEST as $clave=>$valor){
             
            if($clave !='pagina' && $clave!='development' && $clave !='jquery' &&$clave !='tiempo'){
                unset($_REQUEST[$clave]);
            }
        }
    }
    
}
$miProcesador = new FormProcessor ( $this->lenguaje, $this->sql );
$resultado= $miProcesador->procesarFormulario ();