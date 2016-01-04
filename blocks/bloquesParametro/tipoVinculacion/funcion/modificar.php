<?php

namespace bloquesParametro\tipoVinculacion\funcion;
    
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
                if (isset($_REQUEST ['naturaleza']))
                {
                    if($_REQUEST ['naturaleza']==1){
                        $_REQUEST ['naturaleza']='Temporal';
                        
                    }else{
                        
                         $_REQUEST ['naturaleza']='Indefinido';
                    }
                   
                   
                    $datos = array(
            'id' => $_REQUEST ['id'],
            'nombre' => $_REQUEST ['nombre'],
            'descripcion' => $_REQUEST ['descripcion'],
            'naturaleza' => $_REQUEST ['naturaleza'],
            'reglamentacion' => $_REQUEST ['reglamentacion'],
           
            
        );
                    
                }else
                {
                      $datos = array(
            'id' => $_REQUEST ['id'],
            'nombre' => $_REQUEST ['nombre'],
            'descripcion' => $_REQUEST ['descripcion'],
            
            'reglamentacion' => $_REQUEST ['reglamentacion'],
           
            
        );
                    
                }
             
               
        
        
//       
        
             
        $atributos ['cadena_sql'] = $this->miSql->getCadenaSql("modificarRegistro",$datos);
             
        
        
     $resultado =   $primerRecursoDB->ejecutarAcceso($atributos['cadena_sql'], "acceso");
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