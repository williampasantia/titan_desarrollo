<?php

namespace bloquesModelo\bloqueContenido\funcion;


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
//        $conexion = 'estructura';
//        $primerRecursoDB = $this->miConfigurador->fabricaConexiones->setRecursoDB ($conexion );
//        $atributos ['cadena_sql'] = $this->miSql->getCadenaSql("insertarRegistro");
//        $primerRecursoDB->ejecutarAcceso($atributos['cadena_sql'], "insertar");
//       
  
        
        //Al final se ejecuta la redirección la cual pasará el control a otra página
        $variable='cualquierDato';
        Redireccionador::redireccionar('opcion1',$variable);
    	        
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

