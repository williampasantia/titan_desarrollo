<?php

namespace bloquesParametro\contenidoActividadEconomica\funcion;


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
       
        
                
                if(isset($_REQUEST['estadoRegistro'])){
                    switch($_REQUEST ['estadoRegistro']){
                           case 1 :
					$_REQUEST ['estadoRegistro']='Activo';
			   break;
                       
                           case 2 :
					$_REQUEST ['estadoRegistro']='Inactivo';
			   break;
                    }
                }
        
        $datos = array(
            'codigo' => $_REQUEST ['codigo'],
            'nombreRegistro' => $_REQUEST ['nombreRegistro'],
            'estadoRegistro' => $_REQUEST ['estadoRegistro'] 
        );
//       
        
                
        $atributos ['cadena_sql'] = $this->miSql->getCadenaSql("insertarRegistro",$datos);
        $primerRecursoDB->ejecutarAcceso($atributos['cadena_sql'], "acceso");
        //Al final se ejecuta la redirección la cual pasará el control a otra página
        
        Redireccionador::redireccionar('inserto',$datos);
    	        
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

