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
        
        $conexion = 'estructura';
        $primerRecursoDB = $this->miConfigurador->fabricaConexiones->getRecursoDB($conexion);
       
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
                		'tipoDocumento' => $_REQUEST['personaNaturalIdentificacion'],
                		'numeroDocumento' => $_REQUEST['personaNaturalDocumento'],
                		'primerNombre' => $_REQUEST['personaNaturalPrimerNombre'],
                		'segundoNombre' => $_REQUEST['personaNaturalSegundoNombre'],
                		'primerApellido' => $_REQUEST['personaNaturalPrimerApellido'],
                		'segundoApellido' => $_REQUEST['personaNaturalSegundoApellido'],
                		'contribuyente' => $_REQUEST['personaNaturalContribuyente'],
                		'autorretenedor' => $_REQUEST['personaNaturalAutorretenedor'],
                		'regimen' => $_REQUEST['personaNaturalRegimen'],
                );
         
          
        $atributos ['cadena_sql'] = $this->miSql->getCadenaSql("insertarRegistroBasico",$datos);
        $primerRecursoDB->ejecutarAcceso($atributos['cadena_sql'], "acceso");
        
        $atributos ['cadena_sql'] = $this->miSql->getCadenaSql("insertarRegistroComercial",$datos);
        $primerRecursoDB->ejecutarAcceso($atributos['cadena_sql'], "acceso");
        //Al final se ejecuta la redirección la cual pasará el control a otra página
        
        Redireccionador::redireccionar('form');
    	        
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

