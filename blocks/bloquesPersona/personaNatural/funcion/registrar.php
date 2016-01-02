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
        
        if(isset($_REQUEST['personaNaturalBanco'])){
        	switch($_REQUEST ['personaNaturalBanco']){
        		case 1 :
        			$_REQUEST ['personaNaturalBanco']='Banco de Bogotá';
        			break;
        		case 2 :
        			$_REQUEST ['personaNaturalBanco']='Banco Popular';
        			break;
        		case 3 :
        			$_REQUEST ['personaNaturalBanco']='Bancolombia';
        			break;
        		case 4 :
        			$_REQUEST ['personaNaturalBanco']='CityBank Colombia';
        			break;
        		case 5 :
        			$_REQUEST ['personaNaturalBanco']='GNB Colombia S.A.';
        			break;
        		case 6 :
        			$_REQUEST ['personaNaturalBanco']='BBVA Colombia';
        			break;
        	}
        	
        	if(isset($_REQUEST['personaNaturalTipoCuenta'])){
        		switch($_REQUEST ['personaNaturalTipoCuenta']){
        			case 1 :
        				$_REQUEST ['personaNaturalTipoCuenta']='Ahorros';
        				break;
        			case 2 :
        				$_REQUEST ['personaNaturalTipoCuenta']='Corriente';
        				break;
        		}
        	}
        	
        	
        	if(isset($_REQUEST['personaNaturalTipoPago'])){
        		switch($_REQUEST ['personaNaturalTipoPago']){
        			case 1 :
        				$_REQUEST ['personaNaturalTipoPago']='Transferencia';
        				break;
        			case 2 :
        				$_REQUEST ['personaNaturalTipoCuenta']='SAP';
        				break;
        		}
        	}
        	
        	
        	if(isset($_REQUEST['personaNaturalEconomicoEstado'])){
        		switch($_REQUEST ['personaNaturalEconomicoEstado']){
        			case 1 :
        				$_REQUEST ['personaNaturalEconomicoEstado']='Activo';
        				break;
        			case 2 :
        				$_REQUEST ['personaNaturalEconomicoEstado']='Inactivo';
        				break;
        		}
        	}
        
        $datosCom = array(
        		'consecutivo' => $_REQUEST['personaNaturalConsecutivo'],
        		'banco' => $_REQUEST['personaNaturalBanco'],
        		'tipoCuenta' => $_REQUEST['personaNaturalTipoCuenta'],
        		'numeroCuenta' => $_REQUEST['personaNaturalNumeroCuenta'],
        		'tipoPago' => $_REQUEST['personaNaturalTipoPago'],
        		'estado' => $_REQUEST['personaNaturalEconomicoEstado'],
        		'fecha' => $_REQUEST['fechaCreacionConsulta1'],
        		'creador' => $_REQUEST['personaNaturalCreo'],
        		'soporteRUT' => $_REQUEST['personaNaturalSoporteRUT']
        );
 
        var_dump($atributos ['cadena_sql'] = $this->miSql->getCadenaSql("insertarRegistroComercial",$datosCom));exit;
        $primerRecursoDB->ejecutarAcceso($atributos['cadena_sql'], "acceso");
        //Al final se ejecuta la redirección la cual pasará el control a otra página
       
        if(isset($_REQUEST['personaNaturalContactoTipo'])){
        	switch($_REQUEST ['personaNaturalContactoTipo']){
        		case 1 :
        			$_REQUEST ['personaNaturalContactoTipo']='Dirección';
        			break;
        		case 2 :
        			$_REQUEST ['personaNaturalContactoTipo']='e-mail';
        			break;
        		case 3 :
        			$_REQUEST ['personaNaturalContactoTipo']='Teléfono fijo';
        			break;
        		case 4 :
        			$_REQUEST ['personaNaturalContactoTipo']='Teléfono Movil';
        			break;
        		case 5 :
        			$_REQUEST ['personaNaturalBanco']='Fax';
        			break;
        	}
        	 
        	
        
        $datosContacto = array(
        		'banco' => $_REQUEST['personaNaturalBanco'],
        		'tipoCuenta' => $_REQUEST['personaNaturalTipoCuenta'],
        		'numeroCuenta' => $_REQUEST['personaNaturalNumeroCuenta'],
        		'tipoPago' => $_REQUEST['personaNaturalTipoPago'],
        		'estado' => $_REQUEST['personaNaturalEconomicoEstado'],
        		'fecha' => $_REQUEST['fechaCreacionConsulta1'],
        		'creador' => $_REQUEST['personaNaturalCreo'],
        		'soporteRUT' => $_REQUEST['personaNaturalSoporteRUT']
        );
        
        Redireccionador::redireccionar('form');
    	        
    }
    
    function resetForm(){
        foreach($_REQUEST as $clave=>$valor){
             
            if($clave !='pagina' && $clave!='development' && $clave !='jquery' &&$clave !='tiempo'){
                unset($_REQUEST[$clave]);
            }
        }
    }
    
        }}
    }
$miProcesador = new FormProcessor ( $this->lenguaje, $this->sql );

$resultado= $miProcesador->procesarFormulario ();

