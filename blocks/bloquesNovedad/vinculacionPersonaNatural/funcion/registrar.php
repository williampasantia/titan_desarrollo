<?php

namespace bloquesNovedad\vinculacionPersonaNatural\funcion;


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
        $primerRecursoDB = $this->miConfigurador->fabricaConexiones->getRecursoDB ($conexion );
      $atributos ['cadena_sql'] = $this->miSql->getCadenaSql("buscarPersonaFuncionario");
      $resultado=  $primerRecursoDB->ejecutarAcceso($atributos['cadena_sql'], "acceso");

          $datos = array(
            'fechaInicio' => $_REQUEST ['fechaInicio'],
            'fechaFin' => $_REQUEST ['fechaFin'],
            'tipoVinculacion' => $_REQUEST ['tipoVinculacion'],
            'sede' => $_REQUEST ['sede'],
            'dependencia' => $_REQUEST ['dependencia'],
            'ubicacion' => $_REQUEST ['ubicacion'],
              'cedula'=>$_REQUEST ['cedula']
                   );
                   
                   
        $atributos ['cadena_sql'] = $this->miSql->getCadenaSql("insertarVinculacion",$datos);
       
    $resultado=  $primerRecursoDB->ejecutarAcceso($atributos['cadena_sql'], "acceso");
        
 
   if (!empty($resultado)) {
            Redireccionador::redireccionar('inserto');
            exit();
        } else {
           Redireccionador::redireccionar('noInserto');
            exit();
        }
        
        //Al final se ejecuta la redirección la cual pasará el control a otra página
        
       // Redireccionador::redireccionar('opcion1');
      
    	        
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

