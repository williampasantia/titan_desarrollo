<?php

namespace bloquesPersona\personaNatural\funcion;


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
       
        if(isset($_REQUEST['personaNaturalRegimen'])){
        	switch($_REQUEST ['personaNaturalRegimen']){
        		case 1 :
        			$_REQUEST ['personaNaturalRegimen']='Común';
        			break;
        		case 2 :
        			$_REQUEST ['personaNaturalRegimen']='simplificado';
        			break;
        		case 3 :
        			$_REQUEST ['personaNaturalRegimen']='No Aplica';
        			break;
        	}
        }
        
        if(isset($_REQUEST['personaNaturalAutorretenedor'])){
        	switch($_REQUEST ['personaNaturalAutorretenedor']){
        		case 1 :
        			$_REQUEST ['personaNaturalAutorretenedor']='SI';
        			break;
        		case 2 :
        			$_REQUEST ['personaNaturalAutorretenedor']='NO';
        			break;
        	}
        }
        
        if(isset($_REQUEST['personaNaturalContribuyente'])){
        	switch($_REQUEST ['personaNaturalContribuyente']){
        		case 1 :
        			$_REQUEST ['personaNaturalContribuyente']='SI';
        			break;
        		case 2 :
        			$_REQUEST ['personaNaturalContribuyente']='NO';
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
                		'soporteDocumento' => $_REQUEST['personaNaturalSoporteIden']
                );
         
          
        $atributos ['cadena_sql'] = $this->miSql->getCadenaSql("insertarRegistroBasico",$datos);
        $primerRecursoDB->ejecutarAcceso($atributos['cadena_sql'], "acceso");
        
        $datosCom = array(
        		'cnsecutivo' => $_REQUEST['personaNaturalConsecutivo'],
        		'banco' => $_REQUEST['personaNaturalBanco'],
        		'tipoCuenta' => $_REQUEST['personaNaturalTipoCuenta'],
        		'numeroCuenta' => $_REQUEST['personaNaturalNumeroCuenta'],
        		'tipoPago' => $_REQUEST['personaNaturaltipoPago'],
        		'estado' => $_REQUEST['personaNaturalEstado'],
        		'fecha' => $_REQUEST['personaNaturalContribuyente'],
        		'autorretenedor' => $_REQUEST['personaNaturalAutorretenedor'],
        		'regimen' => $_REQUEST['personaNaturalRegimen'],
        		'soporteDocumento' => $_REQUEST['personaNaturalSoporteIden']
        );
        
        
        $atributos ['cadena_sql'] = $this->miSql->getCadenaSql("insertarRegistroComercial",$datosCom);
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

