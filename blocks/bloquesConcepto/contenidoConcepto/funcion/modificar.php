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
       
        if(isset($_REQUEST['codTipoCargoRegistro'])){
                    
                }
                
                if(isset($_REQUEST['tipoSueldoRegistro'])){
                    switch($_REQUEST ['tipoSueldoRegistro']){
                           case 1 :
					$_REQUEST ['tipoSueldoRegistro']='M';
			   break;
                       
                           case 2 :
					$_REQUEST ['tipoSueldoRegistro']='H';
			   break;
                    }
                }
                
                
        
        $datos = array(
            'codigoRegistro' => $_REQUEST ['codigoRegistro'],
            'nivelRegistro' => $_REQUEST ['nivelRegistro'],
            'gradoRegistro' => $_REQUEST ['gradoRegistro'],
            'nombreRegistro' => $_REQUEST ['nombreRegistro'],
            'sueldoRegistro' => $_REQUEST ['sueldoRegistro'],
            'tipoSueldoRegistro' => $_REQUEST ['tipoSueldoRegistro']
        );
//       
        
                
        $atributos ['cadena_sql'] = $this->miSql->getCadenaSql("modificarRegistro",$datos);
        $resultado=$primerRecursoDB->ejecutarAcceso($atributos['cadena_sql'], "acceso");
        //Al final se ejecuta la redirección la cual pasará el control a otra página
         if (!empty($resultado)) {
               Redireccionador::redireccionar('modifico',$datos);
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

