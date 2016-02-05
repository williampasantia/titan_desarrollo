<?php

namespace bloquesConcepto\contenidoConcepto\funcion;


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
        
        
        var_dump($_REQUEST);
        var_dump($_REQUEST['variablesRegistros']);
        var_dump($_REQUEST['condicionesRegistros']);
        exit;
       
        $datosConceptosInfoBasica = array (
        		'nombre' => $_REQUEST['nombreInfoConcepto'],
        		'simbolo' => $_REQUEST['simboloInfoConcepto'],
        		'categoria' => $_REQUEST['categoriaInfoConcepto'],
        		'leyes' => $_REQUEST['leyRegistrosInfoConcepto'],
        		'naturaleza' => $_REQUEST['naturalezaInfoConcepto'],
        		'descripcion' => $_REQUEST['descripcionInfoConcepto']
        );
        
        
         if (!empty($resultado)) {
               Redireccionador::redireccionar('inserto',$datos);
            exit();
        } else {
           Redireccionador::redireccionar('noInserto');
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

