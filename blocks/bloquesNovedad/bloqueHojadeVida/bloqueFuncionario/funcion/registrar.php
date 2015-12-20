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
        $primerRecursoDB->ejecutarAcceso($atributos['cadena_sql'], "acceso");//********************************
        
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
        		default:
        			$_REQUEST ['funcionarioTipoSangre']=' ';
        			break;
        	}
        }
        
        if(isset($_REQUEST['funcionarioSangreRH'])){
        	switch($_REQUEST ['funcionarioSangreRH']){
        		case 1 :
        			$_REQUEST ['funcionarioSangreRH']='Positivo';
        			break;
        		case 2 :
        			$_REQUEST ['funcionarioSangreRH']='Negativo';
        			break;
        		default:
        			$_REQUEST ['funcionarioSangreRH']=' ';
        			break;
        	}
        }
        
        if(isset($_REQUEST['funcionarioTipoLibreta'])){
        	switch($_REQUEST ['funcionarioTipoLibreta']){
        		case 1 :
        			$_REQUEST ['funcionarioTipoLibreta']='Primera';
        			break;
        		case 2 :
        			$_REQUEST ['funcionarioTipoLibreta']='Segunda';
        			break;
        		default:
        			$_REQUEST ['funcionarioTipoLibreta']=' ';
        			break;
        	}
        }
        
        if(isset($_REQUEST['funcionarioGrupoEtnico'])){
        	switch($_REQUEST ['funcionarioGrupoEtnico']){
        		case 1 :
        			$_REQUEST ['funcionarioGrupoEtnico']='Afrodescendientes';
        			break;
        		case 2:
        			$_REQUEST ['funcionarioGrupoEtnico']='Indígenas';
        			break;
        		case 3 :
        			$_REQUEST ['funcionarioGrupoEtnico']='Raizales';
        			break;
        		case 4 :
        			$_REQUEST ['funcionarioGrupoEtnico']='Rom';
        			break;
        		default:
        			$_REQUEST ['funcionarioGrupoEtnico']=' ';
        			break;
        	}
        }
        
        if(isset($_REQUEST['funcionarioGrupoLGBT'])){
        	switch($_REQUEST ['funcionarioGrupoLGBT']){
        		case 1 :
        			$_REQUEST ['funcionarioGrupoLGBT']='Si';
        			break;
        		case 2 :
        			$_REQUEST ['funcionarioGrupoLGBT']='No';
        			break;
        		default:
        			$_REQUEST ['funcionarioGrupoLGBT']=' ';
        			break;
        	}
        }
        
        if(isset($_REQUEST['funcionarioCabezaFamilia'])){
        	switch($_REQUEST ['funcionarioCabezaFamilia']){
        		case 1 :
        			$_REQUEST ['funcionarioCabezaFamilia']='Si';
        			break;
        		case 2 :
        			$_REQUEST ['funcionarioCabezaFamilia']='No';
        			break;
        		default:
        			$_REQUEST ['funcionarioCabezaFamilia']=' ';
        			break;
        	}
        }
        
        if(isset($_REQUEST['funcionarioPersonasCargo'])){
        	switch($_REQUEST ['funcionarioPersonasCargo']){
        		case 1 :
        			$_REQUEST ['funcionarioPersonasCargo']='Si';
        			break;
        		case 2 :
        			$_REQUEST ['funcionarioPersonasCargo']='No';
        			break;
        		default:
        			$_REQUEST ['funcionarioPersonasCargo']=' ';
        			break;
        	}
        }
        
        $datosPersonalesBasicos = array(
        		'fechaNacimiento' => $_REQUEST['funcionarioFechaNacimiento'],
        		'edadNacimiento' => $_REQUEST['funcionarioEdad'],
        		'numeroLibreta' => $_REQUEST['funcionarioNumeroLibreta'],
        		'numeroDistritoLibreta' => $_REQUEST['funcionarioDistritoLibreta'],
        		'soporteLibreta' => $_REQUEST['funcionarioSoporteLibreta'],
        		'soporteCaracterizacion' => $_REQUEST['funcionarioSoporteCaracterizacion']
        );
        
        $atributos ['cadena_sql'] = $this->miSql->getCadenaSql("insertarDatosPersonales",$datosPersonalesBasicos);
        $primerRecursoDB->ejecutarAcceso($atributos['cadena_sql'], "acceso");//********************************
        
        
        //Manejo de Ubicacion Preliminar --------------------------------------------------------
        
        if(isset($_REQUEST['funcionarioContactoPais'])){
        	switch($_REQUEST ['funcionarioContactoPais']){
        		case 1 :
        			$_REQUEST ['funcionarioContactoPais']='Argentina';
        			break;
        		case 2:
        			$_REQUEST ['funcionarioContactoPais']='Peru';
        			break;
        		case 3 :
        			$_REQUEST ['funcionarioContactoPais']='Chile';
        			break;
        		case 4 :
        			$_REQUEST ['funcionarioContactoPais']='Colombia';
        			break;
        	}
        }
        
        if(isset($_REQUEST['funcionarioContactoDepartamento'])){
        	switch($_REQUEST ['funcionarioContactoDepartamento']){
        		case 1 :
        			$_REQUEST ['funcionarioContactoDepartamento']='Cundinamarca';
        			break;
        		case 2 :
        			$_REQUEST ['funcionarioContactoDepartamento']='Antioquia';
        			break;
        		case 3 :
        			$_REQUEST ['funcionarioContactoDepartamento']='Santander';
        			break;
        		case 4 :
        			$_REQUEST ['funcionarioContactoDepartamento']='Bolivar';
        			break;
        		case 5 :
        			$_REQUEST ['funcionarioContactoDepartamento']='Bogotá D.C.';
        			break;
        	}
        }
        
        if(isset($_REQUEST['funcionarioContactoCiudad'])){
        	switch($_REQUEST ['funcionarioContactoCiudad']){
        		case 1 :
        			$_REQUEST ['funcionarioContactoCiudad']='Bogota D.C.';
        			break;
        		case 2 :
        			$_REQUEST ['funcionarioContactoCiudad']='Medellin';
        			break;
        		case 3 :
        			$_REQUEST ['funcionarioContactoCiudad']='Barranquilla';
        			break;
        		case 4 :
        			$_REQUEST ['funcionarioContactoCiudad']='Cali';
        			break;
        		case 5 :
        			$_REQUEST ['funcionarioContactoCiudad']='Cucuta';
        			break;
        		case 6 :
        			$_REQUEST ['funcionarioContactoCiudad']='Bucaramanga';
        			break;
        	}
        }
        //------------------------------- Preliminar Ubicación ----------------------------------
        
        if(isset($_REQUEST['funcionarioContactoEstrato'])){
        	switch($_REQUEST ['funcionarioContactoEstrato']){
        		case 1 :
        			$_REQUEST ['funcionarioContactoEstrato']='Uno';
        			break;
        		case 2 :
        			$_REQUEST ['funcionarioContactoEstrato']='Dos';
        			break;
        		case 3 :
        			$_REQUEST ['funcionarioContactoEstrato']='Tres';
        			break;
        		case 4 :
        			$_REQUEST ['funcionarioContactoEstrato']='Cuatro';
        			break;
        		case 5 :
        			$_REQUEST ['funcionarioContactoEstrato']='Cinco';
        			break;
        		case 6 :
        			$_REQUEST ['funcionarioContactoEstrato']='Seis';
        			break;
        		default:
             		$_REQUEST ['funcionarioContactoEstrato']=' ';
       				break;
        	}
        }
        
        $datosResidenciaContactos = array(
        		'nacionalidad' => $_REQUEST['funcionarioContactoNacionalidad'],
        		'localidadContacto' => $_REQUEST['funcionarioContactoLocalidad'],
        		'barrioContacto' => $_REQUEST['funcionarioContactoBarrio'],
        		'direccionContacto' => $_REQUEST['funcionarioContactoDireccion'],
        		'soporteEstrato' => $_REQUEST['funcionarioSoporteEstrato'],
        		'soporteResidencia' => $_REQUEST['funcionarioSoporteResidencia'],
        		'telefonoFijoContacto' => $_REQUEST['funcionarioContactoTelFijo'],
        		'telefonoMovilContacto' => $_REQUEST['funcionarioContactoTelMovil'],
        		'emailContacto' => $_REQUEST['funcionarioContactoEmail'],
        		'telefonoFijoOficina' => $_REQUEST['funcionarioContactoOrganiTelOficina'],
        		'emailOficina' => $_REQUEST['funcionarioContactoOrganiEmail'],
        		'direccionOficina' => $_REQUEST['funcionarioContactoOrganiDireccion'],
        		'cargoOficina' => $_REQUEST['funcionarioContactoOrganiCargo']
        		
        		
        );
        
        $atributos ['cadena_sql'] = $this->miSql->getCadenaSql("insertarDatosResidenciaCont",$datosResidenciaContactos);
        $primerRecursoDB->ejecutarAcceso($atributos['cadena_sql'], "acceso");//********************************
        
        
        
        //Manejo de Ubicacion Preliminar --------------------------------------------------------
        
        if(isset($_REQUEST['funcionarioFormacionBasicaPais'])){
        	switch($_REQUEST ['funcionarioFormacionBasicaPais']){
        		case 1 :
        			$_REQUEST ['funcionarioFormacionBasicaPais']='Argentina';
        			break;
        		case 2:
        			$_REQUEST ['funcionarioFormacionBasicaPais']='Peru';
        			break;
        		case 3 :
        			$_REQUEST ['funcionarioFormacionBasicaPais']='Chile';
        			break;
        		case 4 :
        			$_REQUEST ['funcionarioFormacionBasicaPais']='Colombia';
        			break;
        	}
        }
        
        if(isset($_REQUEST['funcionarioFormacionBasicaDepartamento'])){
        	switch($_REQUEST ['funcionarioFormacionBasicaDepartamento']){
        		case 1 :
        			$_REQUEST ['funcionarioFormacionBasicaDepartamento']='Cundinamarca';
        			break;
        		case 2 :
        			$_REQUEST ['funcionarioFormacionBasicaDepartamento']='Antioquia';
        			break;
        		case 3 :
        			$_REQUEST ['funcionarioFormacionBasicaDepartamento']='Santander';
        			break;
        		case 4 :
        			$_REQUEST ['funcionarioFormacionBasicaDepartamento']='Bolivar';
        			break;
        		case 5 :
        			$_REQUEST ['funcionarioFormacionBasicaDepartamento']='Bogotá D.C.';
        			break;
        	}
        }
        
        if(isset($_REQUEST['funcionarioFormacionBasicaCiudad'])){
        	switch($_REQUEST ['funcionarioFormacionBasicaCiudad']){
        		case 1 :
        			$_REQUEST ['funcionarioFormacionBasicaCiudad']='Bogota D.C.';
        			break;
        		case 2 :
        			$_REQUEST ['funcionarioFormacionBasicaCiudad']='Medellin';
        			break;
        		case 3 :
        			$_REQUEST ['funcionarioFormacionBasicaCiudad']='Barranquilla';
        			break;
        		case 4 :
        			$_REQUEST ['funcionarioFormacionBasicaCiudad']='Cali';
        			break;
        		case 5 :
        			$_REQUEST ['funcionarioFormacionBasicaCiudad']='Cucuta';
        			break;
        		case 6 :
        			$_REQUEST ['funcionarioFormacionBasicaCiudad']='Bucaramanga';
        			break;
        	}
        }
        //------------------------------- Preliminar Ubicación ----------------------------------
        
        
        $datosFormacionAcademicaBasica = array(
        		'modalidadBasica' => $_REQUEST['funcionarioFormacionBasicaModalidad'],
        		'colegioBasica' => $_REQUEST['funcionarioFormacionBasicaColegio'],
        		'tituloBasica' => $_REQUEST['funcionarioFormacionBasicaTitul'],
        		'fechaGradoBasica' => $_REQUEST['funcionarioFechaFormacionBasica'],
        		'soporteBasica' => $_REQUEST['funcionarioSoporteFormacionBasica']
        );
        
        $atributos ['cadena_sql'] = $this->miSql->getCadenaSql("insertarFormacionBasica",$datosFormacionAcademicaBasica);
        $primerRecursoDB->ejecutarAcceso($atributos['cadena_sql'], "acceso");//********************************
        
        
        //Manejo de Ubicacion Preliminar --------------------------------------------------------
        
        if(isset($_REQUEST['funcionarioFormacionMediaPais'])){
        	switch($_REQUEST ['funcionarioFormacionMediaPais']){
        		case 1 :
        			$_REQUEST ['funcionarioFormacionMediaPais']='Argentina';
        			break;
        		case 2:
        			$_REQUEST ['funcionarioFormacionMediaPais']='Peru';
        			break;
        		case 3 :
        			$_REQUEST ['funcionarioFormacionMediaPais']='Chile';
        			break;
        		case 4 :
        			$_REQUEST ['funcionarioFormacionMediaPais']='Colombia';
        			break;
        	}
        }
        
        if(isset($_REQUEST['funcionarioFormacionMediaDepartamento'])){
        	switch($_REQUEST ['funcionarioFormacionMediaDepartamento']){
        		case 1 :
        			$_REQUEST ['funcionarioFormacionMediaDepartamento']='Cundinamarca';
        			break;
        		case 2 :
        			$_REQUEST ['funcionarioFormacionMediaDepartamento']='Antioquia';
        			break;
        		case 3 :
        			$_REQUEST ['funcionarioFormacionMediaDepartamento']='Santander';
        			break;
        		case 4 :
        			$_REQUEST ['funcionarioFormacionMediaDepartamento']='Bolivar';
        			break;
        		case 5 :
        			$_REQUEST ['funcionarioFormacionMediaDepartamento']='Bogotá D.C.';
        			break;
        	}
        }
        
        if(isset($_REQUEST['funcionarioFormacionMediaCiudad'])){
        	switch($_REQUEST ['funcionarioFormacionMediaCiudad']){
        		case 1 :
        			$_REQUEST ['funcionarioFormacionMediaCiudad']='Bogota D.C.';
        			break;
        		case 2 :
        			$_REQUEST ['funcionarioFormacionMediaCiudad']='Medellin';
        			break;
        		case 3 :
        			$_REQUEST ['funcionarioFormacionMediaCiudad']='Barranquilla';
        			break;
        		case 4 :
        			$_REQUEST ['funcionarioFormacionMediaCiudad']='Cali';
        			break;
        		case 5 :
        			$_REQUEST ['funcionarioFormacionMediaCiudad']='Cucuta';
        			break;
        		case 6 :
        			$_REQUEST ['funcionarioFormacionMediaCiudad']='Bucaramanga';
        			break;
        	}
        }
        //------------------------------- Preliminar Ubicación ----------------------------------
        
        
        $datosFormacionAcademicaMedia = array(
        		'modalidadMedia' => $_REQUEST['funcionarioFormacionMediaModalidad'],
        		'colegioMedia' => $_REQUEST['funcionarioFormacionMediaColegio'],
        		'tituloMedia' => $_REQUEST['funcionarioFormacionMediaTitul'],
        		'fechaGradoMedia' => $_REQUEST['funcionarioFechaFormacionMedia'],
        		'soporteMedia' => $_REQUEST['funcionarioSoporteFormacionMedia']
        );
        
        $atributos ['cadena_sql'] = $this->miSql->getCadenaSql("insertarFormacionMedia",$datosFormacionAcademicaMedia);
        $primerRecursoDB->ejecutarAcceso($atributos['cadena_sql'], "acceso");//********************************
        
        
        // ---------------- INICIO: Lista Variables Control--------------------------------------------------------
        
        $cantidadFormacionSuperior = $_REQUEST['funcionarioRegistrosSuperior'];
        $cantidadFormacionInformal = 1;//$_REQUEST['funcionarioRegistrosInformal'];
        $cantidadIdiomas = 1;//$_REQUEST['funcionarioRegistrosIdioma'];
        $cantidadExperiencia = 1;//$_REQUEST['funcionarioRegistrosExperiencia'];
        $cantidadReferenciasPer = 1;//$_REQUEST['funcionarioRegistrosReferencia'];
        
        // ---------------- FIN: Lista Variables Control--------------------------------------------------------
        // -------------------------------------------------- Campos Dinamicos ----------------------------------
        $count = 0;
        
        while($count < $cantidadFormacionSuperior){
        	
        	if(isset($_REQUEST['funcionarioFormacionSuperiorModalidad_'.$count])){
        		switch($_REQUEST ['funcionarioFormacionSuperiorModalidad_'.$count]){
        			case 1 :
        				$_REQUEST ['funcionarioFormacionSuperiorModalidad_'.$count]='Técnica';
        				break;
        			case 2 :
        				$_REQUEST ['funcionarioFormacionSuperiorModalidad_'.$count]='Tecnológica';
        				break;
        			case 3 :
        				$_REQUEST ['funcionarioFormacionSuperiorModalidad_'.$count]='Tecnológica Especializada';
        				break;
        			case 4 :
        				$_REQUEST ['funcionarioFormacionSuperiorModalidad_'.$count]='Universitaria';
        				break;
        			case 5 :
        				$_REQUEST ['funcionarioFormacionSuperiorModalidad_'.$count]='Especialización';
        				break;
        			case 6 :
        				$_REQUEST ['funcionarioFormacionSuperiorModalidad_'.$count]='Maestría';
        				break;
        			case 7 :
        				$_REQUEST ['funcionarioFormacionSuperiorModalidad_'.$count]='Doctorado';
        		}
        	}
        	
        	if(isset($_REQUEST['funcionarioFormacionSuperiorGraduado_'.$count])){
        		switch($_REQUEST ['funcionarioFormacionSuperiorGraduado_'.$count]){
        			case 1 :
        				$_REQUEST ['funcionarioFormacionSuperiorGraduado_'.$count]='Si';
        				break;
        			case 2 :
        				$_REQUEST ['funcionarioFormacionSuperiorGraduado_'.$count]='No';
        				break;
        		}
        	}
        	
        	//Manejo de Ubicacion Preliminar --------------------------------------------------------
        	
        	if(isset($_REQUEST['funcionarioFormacionSuperiorPais_'.$count])){
        		switch($_REQUEST ['funcionarioFormacionSuperiorPais_'.$count]){
        			case 1 :
        				$_REQUEST ['funcionarioFormacionSuperiorPais_'.$count]='Argentina';
        				break;
        			case 2:
        				$_REQUEST ['funcionarioFormacionSuperiorPais_'.$count]='Peru';
        				break;
        			case 3 :
        				$_REQUEST ['funcionarioFormacionSuperiorPais_'.$count]='Chile';
        				break;
        			case 4 :
        				$_REQUEST ['funcionarioFormacionSuperiorPais_'.$count]='Colombia';
        				break;
        		}
        	}
        	
        	if(isset($_REQUEST['funcionarioFormacionSuperiorDepartamento_'.$count])){
        		switch($_REQUEST ['funcionarioFormacionSuperiorDepartamento_'.$count]){
        			case 1 :
        				$_REQUEST ['funcionarioFormacionSuperiorDepartamento_'.$count]='Cundinamarca';
        				break;
        			case 2 :
        				$_REQUEST ['funcionarioFormacionSuperiorDepartamento_'.$count]='Antioquia';
        				break;
        			case 3 :
        				$_REQUEST ['funcionarioFormacionSuperiorDepartamento_'.$count]='Santander';
        				break;
        			case 4 :
        				$_REQUEST ['funcionarioFormacionSuperiorDepartamento_'.$count]='Bolivar';
        				break;
        			case 5 :
        				$_REQUEST ['funcionarioFormacionSuperiorDepartamento_'.$count]='Bogotá D.C.';
        				break;
        		}
        	}
        	
        	if(isset($_REQUEST['funcionarioFormacionSuperiorCiudad_'.$count])){
        		switch($_REQUEST ['funcionarioFormacionSuperiorCiudad_'.$count]){
        			case 1 :
        				$_REQUEST ['funcionarioFormacionSuperiorCiudad_'.$count]='Bogota D.C.';
        				break;
        			case 2 :
        				$_REQUEST ['funcionarioFormacionSuperiorCiudad_'.$count]='Medellin';
        				break;
        			case 3 :
        				$_REQUEST ['funcionarioFormacionSuperiorCiudad_'.$count]='Barranquilla';
        				break;
        			case 4 :
        				$_REQUEST ['funcionarioFormacionSuperiorCiudad_'.$count]='Cali';
        				break;
        			case 5 :
        				$_REQUEST ['funcionarioFormacionSuperiorCiudad_'.$count]='Cucuta';
        				break;
        			case 6 :
        				$_REQUEST ['funcionarioFormacionSuperiorCiudad_'.$count]='Bucaramanga';
        				break;
        		}
        	}
        	//------------------------------- Preliminar Ubicación ----------------------------------
        	
        	
        	$datosFormacionAcademicaSuperior[$count] = array(
        			'semestresCursados' => $_REQUEST['funcionarioFormacionSuperiorSemestres_'.$count],
        			'resolucionConvalidacion' => $_REQUEST['funcionarioFormacionSuperiorResolucionConvali_'.$count],
        			'fechaConvalidacion' => $_REQUEST['funcionarioFechaConvalidaSuperior_'.$count],
        			'entidadConvalidacion' => $_REQUEST['funcionarioFormacionSuperiorEntidadConvali_'.$count],
        			'universidadSuperior' => $_REQUEST['funcionarioFormacionSuperiorUniversidad_'.$count],
        			'tituloSuperior' => $_REQUEST['funcionarioFormacionSuperiorTituloObtenido_'.$count],
        			'fechaGraduacionSuperior' => $_REQUEST['funcionarioFechaTituloSuperior_'.$count],
        			'numeroTarjetaProfesional' => $_REQUEST['funcionarioFormacionSuperiorNumeroTarjeta_'.$count],
        			'fechaExpedicionTarjeta' => $_REQUEST['funcionarioFechaTarjetaSuperior_'.$count],
        			'soporteSuperior' => $_REQUEST['funcionarioSoporteFormacionSuperior_'.$count]
        	);
        	$count++;
        }
        
        $atributos ['cadena_sql'] = $this->miSql->getCadenaSql("insertarFormacionSuperior",$datosFormacionAcademicaSuperior);
        $primerRecursoDB->ejecutarAcceso($atributos['cadena_sql'], "acceso");//********************************
        
        
        $count = 0;
        
        while($count < $cantidadFormacionInformal){
        	
        	$datosFormacionAcademicaInformal[$count] = array(
        			'cursoInformal' => $_REQUEST['funcionarioFormacionInformalCurso_'.$count],
        			'entidadCurso' => $_REQUEST['funcionarioFormacionInformalCursoLugar_'.$count],
        			'intensidadHoraria' => $_REQUEST['funcionarioFormacionInformalCursoIntensidad_'.$count],
        			'fechaTerminacion' => $_REQUEST['funcionarioFechaInformal_'.$count],
        			'soporteInformal' => $_REQUEST['funcionarioSoporteFormacionInformal_'.$count]
        	);
        	$count++;
        
        }
        
        $atributos ['cadena_sql'] = $this->miSql->getCadenaSql("insertarFormacionInformal",$datosFormacionAcademicaInformal);
        $primerRecursoDB->ejecutarAcceso($atributos['cadena_sql'], "acceso");//********************************
        
        
        $count = 0;
        
        while($count < $cantidadIdiomas){
        	
        	if(isset($_REQUEST['funcionarioFormacionIdioma_'.$count])){
        		switch($_REQUEST ['funcionarioFormacionIdioma_'.$count]){
        			case 1 :
        				$_REQUEST ['funcionarioFormacionIdioma_'.$count]='Inglés';
        				break;
        			case 2 :
        				$_REQUEST ['funcionarioFormacionIdioma_'.$count]='Francés';
        				break;
        			case 3 :
        				$_REQUEST ['funcionarioFormacionIdioma_'.$count]='Alemán';
        				break;
        			case 4 :
        				$_REQUEST ['funcionarioFormacionIdioma_'.$count]='Portugués';
        				break;
        			case 5 :
        				$_REQUEST ['funcionarioFormacionIdioma_'.$count]='Italiano';
        				break;
        			case 6 :
        				$_REQUEST ['funcionarioFormacionIdioma_'.$count]='Mandarín';
        				break;
        			case 7 :
        				$_REQUEST ['funcionarioFormacionIdioma_'.$count]='Otro';
        				break;
        		}
        	}
        	
        	if(isset($_REQUEST['funcionarioFormacionIdiomaNivel_'.$count])){
        		switch($_REQUEST ['funcionarioFormacionIdiomaNivel_'.$count]){
        			case 1 :
        				$_REQUEST ['funcionarioFormacionIdiomaNivel_'.$count]='(A1) Básico';
        				break;
        			case 2 :
        				$_REQUEST ['funcionarioFormacionIdiomaNivel_'.$count]='(A2) Elemental';
        				break;
        			case 3 :
        				$_REQUEST ['funcionarioFormacionIdiomaNivel_'.$count]='(B1) Pre-Intermedio';
        				break;
        			case 4 :
        				$_REQUEST ['funcionarioFormacionIdiomaNivel_'.$count]='(B2) Intermedio Alto';
        				break;
        			case 5 :
        				$_REQUEST ['funcionarioFormacionIdiomaNivel_'.$count]='(C1) Avanzado';
        				break;
        			case 6 :
        				$_REQUEST ['funcionarioFormacionIdiomaNivel_'.$count]='(C2) Superior';
        				break;
        		}
        	}
        	
        	if(isset($_REQUEST['funcionarioFormacionIdiomaNivelHabla_'.$count])){
        		switch($_REQUEST ['funcionarioFormacionIdiomaNivelHabla_'.$count]){
        			case 1 :
        				$_REQUEST ['funcionarioFormacionIdiomaNivelHabla_'.$count]='Aceptable';
        				break;
        			case 2 :
        				$_REQUEST ['funcionarioFormacionIdiomaNivelHabla_'.$count]='Bueno';
        				break;
        			case 3 :
        				$_REQUEST ['funcionarioFormacionIdiomaNivelHabla_'.$count]='Excelente';
        				break;
        			default :
        				$_REQUEST ['funcionarioFormacionIdiomaNivelHabla_'.$count]=' ';
        				break;
        		}
        	}
        	
        	if(isset($_REQUEST['funcionarioFormacionIdiomaNivelLee_'.$count])){
        		switch($_REQUEST ['funcionarioFormacionIdiomaNivelLee_'.$count]){
        			case 1 :
        				$_REQUEST ['funcionarioFormacionIdiomaNivelLee_'.$count]='Aceptable';
        				break;
        			case 2 :
        				$_REQUEST ['funcionarioFormacionIdiomaNivelLee_'.$count]='Bueno';
        				break;
        			case 3 :
        				$_REQUEST ['funcionarioFormacionIdiomaNivelLee_'.$count]='Excelente';
        				break;
        			default :
        				$_REQUEST ['funcionarioFormacionIdiomaNivelLee_'.$count]=' ';
        				break;
        		}
        	}
        	
        	if(isset($_REQUEST['funcionarioFormacionIdiomaNivelEscribe_'.$count])){
        		switch($_REQUEST ['funcionarioFormacionIdiomaNivelEscribe_'.$count]){
        			case 1 :
        				$_REQUEST ['funcionarioFormacionIdiomaNivelEscribe_'.$count]='Aceptable';
        				break;
        			case 2 :
        				$_REQUEST ['funcionarioFormacionIdiomaNivelEscribe_'.$count]='Bueno';
        				break;
        			case 3 :
        				$_REQUEST ['funcionarioFormacionIdiomaNivelEscribe_'.$count]='Excelente';
        				break;
        			default :
        				$_REQUEST ['funcionarioFormacionIdiomaNivelEscribe_'.$count]=' ';
        				break;
        		}
        	}
        	
        	if(isset($_REQUEST['funcionarioFormacionIdiomaNivelEscucha_'.$count])){
        		switch($_REQUEST ['funcionarioFormacionIdiomaNivelEscucha_'.$count]){
        			case 1 :
        				$_REQUEST ['funcionarioFormacionIdiomaNivelEscucha_'.$count]='Aceptable';
        				break;
        			case 2 :
        				$_REQUEST ['funcionarioFormacionIdiomaNivelEscucha_'.$count]='Bueno';
        				break;
        			case 3 :
        				$_REQUEST ['funcionarioFormacionIdiomaNivelEscucha_'.$count]='Excelente';
        				break;
        			default :
        				$_REQUEST ['funcionarioFormacionIdiomaNivelEscucha_'.$count]=' ';
        				break;
        		}
        	}
        	
        	$datosFormacionAcademicaIdiomas[$count] = array(
        			'universidadIdioma' => $_REQUEST['funcionarioFormacionIdiomaUniversidad_'.$count],
        			'soporteIdioma' => $_REQUEST['funcionarioSoporteIdioma_'.$count],
        			'observacionIdioma' => $_REQUEST['funcionarioIdiomaObservacion_'.$count]
        	);
        	$count++;
        }
        
        $atributos ['cadena_sql'] = $this->miSql->getCadenaSql("insertarFormacionIdiomas",$datosFormacionAcademicaIdiomas);
        $primerRecursoDB->ejecutarAcceso($atributos['cadena_sql'], "acceso");//********************************
        
        
        $datosInvestigacion = array(
        		'tematicaInvestigacion' => $_REQUEST['funcionarioPublicacionesTematica'],
        		'tipoInvestigacion' => $_REQUEST['funcionarioPublicacionesTipo'],
        		'logrosInvestigacion' => $_REQUEST['funcionarioPublicacionesLogros'],
        		'referenciasInvestigacion' => $_REQUEST['funcionarioPublicacionesReferencias']
        );
        
        $atributos ['cadena_sql'] = $this->miSql->getCadenaSql("insertarFormacionInvestigacion",$datosInvestigacion);
        $primerRecursoDB->ejecutarAcceso($atributos['cadena_sql'], "acceso");//********************************
        
        
        $count = 0;
        
        while($count < $cantidadExperiencia){
        	
        	if(isset($_REQUEST['funcionarioExperienciaTipo_'.$count])){
        		switch($_REQUEST ['funcionarioExperienciaTipo_'.$count]){
        			case 1 :
        				$_REQUEST ['funcionarioExperienciaTipo_'.$count]='Pública';
        				break;
        			case 2 :
        				$_REQUEST ['funcionarioExperienciaTipo_'.$count]='Privada';
        				break;
        		}
        	}
        	
        	//Manejo de Ubicacion Preliminar --------------------------------------------------------
        	 
        	if(isset($_REQUEST['funcionarioExperienciaPais_'.$count])){
        		switch($_REQUEST ['funcionarioExperienciaPais_'.$count]){
        			case 1 :
        				$_REQUEST ['funcionarioExperienciaPais_'.$count]='Argentina';
        				break;
        			case 2:
        				$_REQUEST ['funcionarioExperienciaPais_'.$count]='Peru';
        				break;
        			case 3 :
        				$_REQUEST ['funcionarioExperienciaPais_'.$count]='Chile';
        				break;
        			case 4 :
        				$_REQUEST ['funcionarioExperienciaPais_'.$count]='Colombia';
        				break;
        		}
        	}
        	 
        	if(isset($_REQUEST['funcionarioExperienciaDepartamento_'.$count])){
        		switch($_REQUEST ['funcionarioExperienciaDepartamento_'.$count]){
        			case 1 :
        				$_REQUEST ['funcionarioExperienciaDepartamento_'.$count]='Cundinamarca';
        				break;
        			case 2 :
        				$_REQUEST ['funcionarioExperienciaDepartamento_'.$count]='Antioquia';
        				break;
        			case 3 :
        				$_REQUEST ['funcionarioExperienciaDepartamento_'.$count]='Santander';
        				break;
        			case 4 :
        				$_REQUEST ['funcionarioExperienciaDepartamento_'.$count]='Bolivar';
        				break;
        			case 5 :
        				$_REQUEST ['funcionarioExperienciaDepartamento_'.$count]='Bogotá D.C.';
        				break;
        		}
        	}
        	 
        	if(isset($_REQUEST['funcionarioExperienciaCiudad_'.$count])){
        		switch($_REQUEST ['funcionarioExperienciaCiudad_'.$count]){
        			case 1 :
        				$_REQUEST ['funcionarioExperienciaCiudad_'.$count]='Bogota D.C.';
        				break;
        			case 2 :
        				$_REQUEST ['funcionarioExperienciaCiudad_'.$count]='Medellin';
        				break;
        			case 3 :
        				$_REQUEST ['funcionarioExperienciaCiudad_'.$count]='Barranquilla';
        				break;
        			case 4 :
        				$_REQUEST ['funcionarioExperienciaCiudad_'.$count]='Cali';
        				break;
        			case 5 :
        				$_REQUEST ['funcionarioExperienciaCiudad_'.$count]='Cucuta';
        				break;
        			case 6 :
        				$_REQUEST ['funcionarioExperienciaCiudad_'.$count]='Bucaramanga';
        				break;
        		}
        	}
        	//------------------------------- Preliminar Ubicación ----------------------------------
        	     
        	
        	$datosExperiencia[$count] = array(
        			'nombreEmpresa' => $_REQUEST['funcionarioExperienciaEmpresa_'.$count],
        			'nitEmpresa' => $_REQUEST['funcionarioExperienciaEmpresaNIT_'.$count],
        			'emailEmpresa' => $_REQUEST['funcionarioExperienciaEmpresaCorreo_'.$count],
        			'telefonoEmpresa' => $_REQUEST['funcionarioExperienciaEmpresaTelefono_'.$count],
        			'fechaIngreso' => $_REQUEST['funcionarioFechaEntradaExperiencia_'.$count],
        			'fechaRetiro' => $_REQUEST['funcionarioFechaSalidaExperiencia_'.$count],
        			'dependenciaEmpresa' => $_REQUEST['funcionarioExperienciaEmpresaDependencia_'.$count],
        			'cargoEmpresa' => $_REQUEST['funcionarioExperienciaEmpresaCargo_'.$count],
        			'horasTrabjo' => $_REQUEST['funcionarioExperienciaEmpresaHoras_'.$count],
        			'soporteExperiencia' => $_REQUEST['funcionarioSoporteExperiencia_'.$count]
        	);
        	$count++;
        }
        
        $atributos ['cadena_sql'] = $this->miSql->getCadenaSql("insertarExperienciaLaboral",$datosExperiencia);
        $primerRecursoDB->ejecutarAcceso($atributos['cadena_sql'], "acceso");//********************************
        
        
        $count = 0;
        
        while($count < $cantidadReferenciasPer){
        	
        	if(isset($_REQUEST['funcionarioReferenciaTipo_'.$count])){
        		switch($_REQUEST ['funcionarioReferenciaTipo_'.$count]){
        			case 1 :
        				$_REQUEST ['funcionarioReferenciaTipo_'.$count]='Personal';
        				break;
        			case 2 :
        				$_REQUEST ['funcionarioReferenciaTipo_'.$count]='Profesional';
        				break;
        			default:
        				$_REQUEST ['funcionarioReferenciaTipo_'.$count]=' ';
        		}
        	}
        	
        	$datosReferencias[$count] = array(
        			'nombresReferencia' => $_REQUEST['funcionarioReferenciaNombres_'.$count],
        			'apellidosReferencia' => $_REQUEST['funcionarioReferenciaApellidos_'.$count],
        			'telefonoReferencia' => $_REQUEST['funcionarioReferenciaTelefono_'.$count],
        			'relacionReferencia' => $_REQUEST['funcionarioReferenciaRelacion_'.$count],
        			'soporteReferencia' => $_REQUEST['funcionarioSoporteReferencia_'.$count]
        	);
        	$count++;
        	 
        }
        
        $atributos ['cadena_sql'] = $this->miSql->getCadenaSql("insertarReferenciasPersonales",$datosReferencias);
        $primerRecursoDB->ejecutarAcceso($atributos['cadena_sql'], "acceso");//********************************
        
        
        
        
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