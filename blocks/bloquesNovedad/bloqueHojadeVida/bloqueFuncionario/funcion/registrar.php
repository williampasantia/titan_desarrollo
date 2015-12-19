<?php

namespace bloquesNovedad\bloqueHojadeVida\bloqueFuncionario\funcion;

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
    	
    	//var_dump($_REQUEST);
    	//exit;
    	
        //Aquí va la lógica de procesamiento
        
        $conexion = 'estructura';
        $primerRecursoDB = $this->miConfigurador->fabricaConexiones->getRecursoDB($conexion);
       
        if(isset($_REQUEST['funcionarioIdentificacion'])){
        	switch($_REQUEST ['funcionarioIdentificacion']){
        		case 1 :
        			$_REQUEST ['funcionarioIdentificacion']='Cédula de Ciudadanía';
        			break;
        		case 2:
        			$_REQUEST ['funcionarioIdentificacion']='Tarjeta de Identidad';
        			break;
        		case 3 :
        			$_REQUEST ['funcionarioIdentificacion']='Cédula de extranjería';
        			break;
        		case 4 :
        			$_REQUEST ['codTipoCargoRegistro']='Pasaporte';
        			break;
        	}
        }
        
        
        
        $datosIdentificacionBasicos = array(
        		'numeroDocumento' => $_REQUEST ['funcionarioDocumento'],
        		'soporteDocumento' => $_REQUEST ['funcionarioSoporteIden'],
        		'fechaExpedicionDocumento' => $_REQUEST ['funcionarioFechaExpDoc'],
        		'paisExpedicion' => $_REQUEST['funcionarioPais'],
        		'departamentoExpedicion' => $_REQUEST['funcionarioDepartamento'],
        		'ciudadExpedicion' => $_REQUEST['funcionarioCiudad'],
        		'primerNombre' => $_REQUEST['funcionarioPrimerNombre'],
        		'segundoNombre' => $_REQUEST['funcionarioSegundoNombre'],
        		'primerApellido' => $_REQUEST['funcionarioPrimerApellido'],
        		'segundoApellido' => $_REQUEST['funcionarioSegundoApellido'],
        		'otrosNombres' => $_REQUEST['funcionarioOtrosNombres']
        );
      
        
                
        $atributos ['cadena_sql'] = $this->miSql->getCadenaSql("insertarIdentificacion",$datosIdentificacionBasicos);
        $primerRecursoDB->ejecutarAcceso($atributos['cadena_sql'], "acceso");
        
        //Manejo de Ubicacion Preliminar --------------------------------------------------------
        
        if(isset($_REQUEST['funcionarioPaisNacimiento'])){
        	switch($_REQUEST ['funcionarioPaisNacimiento']){
        		case 1 :
        			$_REQUEST ['funcionarioPaisNacimiento']='Argentina';
        			break;
        		case 2:
        			$_REQUEST ['funcionarioPaisNacimiento']='Peru';
        			break;
        		case 3 :
        			$_REQUEST ['funcionarioPaisNacimiento']='Chile';
        			break;
        		case 4 :
        			$_REQUEST ['funcionarioPaisNacimiento']='Colombia';
        			break;
        	}
        }
        
        if(isset($_REQUEST['funcionarioDepartamentoNacimiento'])){
        	switch($_REQUEST ['funcionarioDepartamentoNacimiento']){
        		case 1 :
        			$_REQUEST ['funcionarioDepartamentoNacimiento']='Cundinamarca';
        			break;
        		case 2 :
        			$_REQUEST ['funcionarioDepartamentoNacimiento']='Antioquia';
        			break;
        		case 3 :
        			$_REQUEST ['funcionarioDepartamentoNacimiento']='Santander';
        			break;
        		case 4 :
        			$_REQUEST ['funcionarioDepartamentoNacimiento']='Bolivar';
        			break;
        		case 5 :
        			$_REQUEST ['funcionarioDepartamentoNacimiento']='Bogotá D.C.';
        			break;
        	}
        }
        
        if(isset($_REQUEST['funcionarioCiudadNacimiento'])){
        	switch($_REQUEST ['funcionarioCiudadNacimiento']){
        		case 1 :
        			$_REQUEST ['funcionarioCiudadNacimiento']='Bogota D.C.';
        			break;
        		case 2 :
        			$_REQUEST ['funcionarioCiudadNacimiento']='Medellin';
        			break;
        		case 3 :
        			$_REQUEST ['funcionarioCiudadNacimiento']='Barranquilla';
        			break;
        		case 4 :
        			$_REQUEST ['funcionarioCiudadNacimiento']='Cali';
        			break;
        		case 5 :
        			$_REQUEST ['funcionarioCiudadNacimiento']='Cucuta';
        			break;
        		case 6 :
        			$_REQUEST ['funcionarioCiudadNacimiento']='Bucaramanga';
        			break;
        	}
        }
        //------------------------------- Preliminar Ubicación ----------------------------------
        
        if(isset($_REQUEST['funcionarioGenero'])){
        	switch($_REQUEST ['funcionarioGenero']){
        		case 1 :
        			$_REQUEST ['funcionarioGenero']='Masculino';
        			break;
        		case 2 :
        			$_REQUEST ['funcionarioGenero']='Femenino';
        			break;
        	}
        }
        
        if(isset($_REQUEST['funcionarioEstadoCivil'])){
        	switch($_REQUEST ['funcionarioEstadoCivil']){
        		case 1 :
        			$_REQUEST ['funcionarioEstadoCivil']='Soltero';
        			break;
        		case 2 :
        			$_REQUEST ['funcionarioEstadoCivil']='Casado';
        			break;
        		case 3 :
        			$_REQUEST ['funcionarioEstadoCivil']='Unión Libre';
        			break;
        		case 4 :
        			$_REQUEST ['funcionarioEstadoCivil']='Viudo';
        			break;
        		case 5 :
        			$_REQUEST ['funcionarioEstadoCivil']='Divorciado';
        			break;
        	}
        }
        
        if(isset($_REQUEST['funcionarioTipoSangre'])){
        	switch($_REQUEST ['funcionarioTipoSangre']){
        		case 1 :
        			$_REQUEST ['funcionarioTipoSangre']='A';
        			break;
        		case 2:
        			$_REQUEST ['funcionarioTipoSangre']='B';
        			break;
        		case 3 :
        			$_REQUEST ['funcionarioTipoSangre']='O';
        			break;
        		case 4 :
        			$_REQUEST ['funcionarioTipoSangre']='AB';
        			break;
        	}
        }
        
        $datosPersonalesBasicos = array(
        		'fechaNacimiento' => $_REQUEST['funcionarioFechaNacimiento'],
        		'edadNacimiento' => $_REQUEST['funcionarioEdad']
        );
        
        
        
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
$resultado = $miProcesador->procesarFormulario ();

?>