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
       
        if(isset($_REQUEST['codTipoCargoRegistro'])){
                    switch($_REQUEST ['codTipoCargoRegistro']){
                           case 1 :
					$_REQUEST ['codTipoCargoRegistro']='DI';
			   break;
                       
                           case 2 :
					$_REQUEST ['codTipoCargoRegistro']='AS';
			   break;
                       
                           case 3 :
					$_REQUEST ['codTipoCargoRegistro']='EJ';
			   break;
                       
                           case 4 :
					$_REQUEST ['codTipoCargoRegistro']='TE';
			   break;
			   
                           case 5 :
					$_REQUEST ['codTipoCargoRegistro']='AI';
			   break;
                       
                           case 6 :
					$_REQUEST ['codTipoCargoRegistro']='TO';
			   break;
		           		
                           case 7 :
					$_REQUEST ['codTipoCargoRegistro']='DC';
			   break;
                           
                           case 8 :
					$_REQUEST ['codTipoCargoRegistro']='DP';
			   break;
                    
                    
                    }
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
            'nivelRegistro' => $_REQUEST ['nivelRegistro'],
            'codAlternativoRegistro' => $_REQUEST ['codAlternativoRegistro'],
            'gradoRegistro' => $_REQUEST ['gradoRegistro'],
            'nombreRegistro' => $_REQUEST ['nombreRegistro'],
            'codTipoCargoRegistro' => $_REQUEST ['codTipoCargoRegistro'],
            'sueldoRegistro' => $_REQUEST ['sueldoRegistro'],
            'tipoSueldoRegistro' => $_REQUEST ['tipoSueldoRegistro'],
            'estadoRegistro' => $_REQUEST ['estadoRegistro'] 
        );
//       
        
                
        $atributos ['cadena_sql'] = $this->miSql->getCadenaSql("insertarRegistro",$datos);
        $resultado=$primerRecursoDB->ejecutarAcceso($atributos['cadena_sql'], "acceso");
        //Al final se ejecuta la redirección la cual pasará el control a otra página
        
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

