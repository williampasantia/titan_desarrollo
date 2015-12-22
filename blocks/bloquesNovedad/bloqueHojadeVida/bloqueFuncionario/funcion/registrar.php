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
    	
        //Aquí va la lógica de procesamiento
        
        $conexion = 'estructura';
        $primerRecursoDB = $this->miConfigurador->fabricaConexiones->getRecursoDB($conexion);
       
        /*Datos de PERSONA NATURAL ------------------------------------------------------------------------*/
        /*
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
        }*/
        /*
        $datosPersonaNatural = array (
        		'primerNombre' => $_REQUEST['funcionarioPrimerNombre'],
        		'segundoNombre' => $_REQUEST['funcionarioSegundoNombre'],
        		'primerApellido' => $_REQUEST['funcionarioPrimerApellido'],
        		'segundoApellido' => $_REQUEST['funcionarioSegundoApellido'],
        		'otrosNombres' => $_REQUEST['funcionarioOtrosNombres'],
        );*/
        /*-------------------------------------------------------------------------------------------------*/
        
        $datosUbicacionExpedicion = array(
        		'paisExpedicion' => $_REQUEST['funcionarioPais'],
        		'departamentoExpedicion' => $_REQUEST['funcionarioDepartamento'],
        		'ciudadExpedicion' => $_REQUEST['funcionarioCiudad']
        );
        
        $cadenaSql = $this->miSql->getCadenaSql("insertarUbicacionExpedicion",$datosUbicacionExpedicion);
        $id_ubicacion_expe = $primerRecursoDB->ejecutarAcceso($cadenaSql, "busqueda", $datosUbicacionExpedicion, "insertarUbicacionExpedicion");
        
        
        
        $datosInformacionPersonalExpedicion = array (
        		'numeroDocumento' => $_REQUEST ['funcionarioDocumento'], //Llave Foranea fk Persona Natural
        		'soporteDocumento' => $_REQUEST ['funcionarioSoporteIden'],
        		'fechaExpedicionDocumento' => $_REQUEST ['funcionarioFechaExpDoc'],
        		'fk_ubicacion_expedicion' => $id_ubicacion_expe[0][0]
        );
        
        $cadenaSql = $this->miSql->getCadenaSql("insertarIdentificacionDocumento",$datosInformacionPersonalExpedicion);
		$id_datos_identificacion = $primerRecursoDB->ejecutarAcceso($cadenaSql, "busqueda", $datosInformacionPersonalExpedicion, "insertarIdentificacionDocumento");
        
//*************************************************************************************************//
        
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
        			$_REQUEST ['funcionarioEstadoCivil']='Uni\F3n Libre';
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
        			$_REQUEST ['funcionarioTipoSangre']='NULL';
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
        			$_REQUEST ['funcionarioSangreRH']='NULL';
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
        	}
        }else{
        	$_REQUEST ['funcionarioTipoLibreta']='NULL';
        }
        
        $valorSoporteLib;
        if(isset($_REQUEST['funcionarioSoporteLibreta'])){
        	$valorSoporteLib = $_REQUEST['funcionarioSoporteLibreta'];
        }else{
        	$valorSoporteLib = NULL;
        }
        
        if(isset($_REQUEST['funcionarioGrupoEtnico'])){
        	switch($_REQUEST ['funcionarioGrupoEtnico']){
        		case 1 :
        			$_REQUEST ['funcionarioGrupoEtnico']='Afrodescendiente';
        			break;
        		case 2:
        			$_REQUEST ['funcionarioGrupoEtnico']='Indigenas';
        			break;
        		case 3 :
        			$_REQUEST ['funcionarioGrupoEtnico']='Raizales';
        			break;
        		case 4 :
        			$_REQUEST ['funcionarioGrupoEtnico']='Rom';
        			break;
        		default:
        			$_REQUEST ['funcionarioGrupoEtnico']='NULL';
        			break;
        	}
        }
        
        if(isset($_REQUEST['funcionarioGrupoLGBT'])){
        	switch($_REQUEST ['funcionarioGrupoLGBT']){
        		case 1 :
        			$_REQUEST ['funcionarioGrupoLGBT']='TRUE';
        			break;
        		case 2 :
        			$_REQUEST ['funcionarioGrupoLGBT']='FALSE';
        			break;
        		default:
        			$_REQUEST ['funcionarioGrupoLGBT']='NULL';
        			break;
        	}
        }
        
        if(isset($_REQUEST['funcionarioCabezaFamilia'])){
        	switch($_REQUEST ['funcionarioCabezaFamilia']){
        		case 1 :
        			$_REQUEST ['funcionarioCabezaFamilia']='TRUE';
        			break;
        		case 2 :
        			$_REQUEST ['funcionarioCabezaFamilia']='FALSE';
        			break;
        		default:
        			$_REQUEST ['funcionarioCabezaFamilia']='NULL';
        			break;
        	}
        }
        
        if(isset($_REQUEST['funcionarioPersonasCargo'])){
        	switch($_REQUEST ['funcionarioPersonasCargo']){
        		case 1 :
        			$_REQUEST ['funcionarioPersonasCargo']='TRUE';
        			break;
        		case 2 :
        			$_REQUEST ['funcionarioPersonasCargo']='FALSE';
        			break;
        		default:
        			$_REQUEST ['funcionarioPersonasCargo']='NULL';
        			break;
        	}
        }
        
        $datosUbicacionNacimiento = array(
        		'paisNacimiento' => $_REQUEST['funcionarioPaisNacimiento'],
        		'departamentoNacimiento' => $_REQUEST['funcionarioDepartamentoNacimiento'],
        		'ciudadNacimiento' => $_REQUEST['funcionarioCiudadNacimiento']
        );
        
        $cadenaSql = $this->miSql->getCadenaSql("insertarUbicacionNacimiento",$datosUbicacionNacimiento);
        $id_ubicacion_nacimiento = $primerRecursoDB->ejecutarAcceso($cadenaSql, "busqueda", $datosUbicacionNacimiento, "insertarUbicacionNacimiento");
        
        
        $datosPersonalesBasicos = array(
        		'fechaNacimiento' => $_REQUEST['funcionarioFechaNacimiento'],
        		'edadNacimiento' => $_REQUEST['funcionarioEdad'],
        		'numeroLibreta' => $_REQUEST['funcionarioNumeroLibreta'],
        		'numeroDistritoLibreta' => $_REQUEST['funcionarioDistritoLibreta'],
        		'soporteLibreta' => $valorSoporteLib,
        		'soporteCaracterizacion' => $_REQUEST['funcionarioSoporteCaracterizacion'],
        		'fk_ubicacion' => $id_ubicacion_nacimiento[0][0]
        );
        
        
        $cadenaSql = $this->miSql->getCadenaSql("insertarInformacionPersonalBasica",$datosPersonalesBasicos);
        $id_informacion_personal_basica = $primerRecursoDB->ejecutarAcceso($cadenaSql, "busqueda", $datosUbicacionNacimiento, "insertarInformacionPersonalBasica");

//******************************************************************************************************************************************************       
     
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
             		$_REQUEST ['funcionarioContactoEstrato']='NULL';
       				break;
        	}
        }
        
        $datosUbicacionContacto = array(
        		'paisContacto' => $_REQUEST['funcionarioContactoPais'],
        		'departamentoContacto' => $_REQUEST['funcionarioContactoDepartamento'],
        		'ciudadContacto' => $_REQUEST['funcionarioContactoCiudad']
        );
        
        $cadenaSql = $this->miSql->getCadenaSql("insertarUbicacionContacto",$datosUbicacionContacto);
        $id_ubicacion_contacto = $primerRecursoDB->ejecutarAcceso($cadenaSql, "busqueda", $datosUbicacionContacto, "insertarUbicacionContacto");
        
        
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
        		'cargoOficina' => $_REQUEST['funcionarioContactoOrganiCargo'],
        		'fk_ubicacion' => $id_ubicacion_contacto[0][0]
        		
        );
        
        $cadenaSql = $this->miSql->getCadenaSql("insertarDatosResidenciaCont",$datosResidenciaContactos);
        $id_datos_residencia = $primerRecursoDB->ejecutarAcceso($cadenaSql, "busqueda", $datosResidenciaContactos);//********************************
        
//*****************************************************************************************************************
        
        
        
        $datosUbicacionFormacionBasica = array(
        		'paisFormacionBasica' => $_REQUEST['funcionarioFormacionBasicaPais'],
        		'departamentoFormacionBasica' => $_REQUEST['funcionarioFormacionBasicaDepartamento'],
        		'ciudadFormacionBasica' => $_REQUEST['funcionarioFormacionBasicaCiudad']
        );
        
        $cadenaSql = $this->miSql->getCadenaSql("insertarUbicacionFormacionBasica",$datosUbicacionFormacionBasica);
        $id_ubicacion_formacion_basica = $primerRecursoDB->ejecutarAcceso($cadenaSql, "busqueda", $datosUbicacionFormacionBasica, "insertarUbicacionFormacionBasica");
        
        $datosFormacionAcademicaBasica = array(
        		'modalidadBasica' => $_REQUEST['funcionarioFormacionBasicaModalidad'],
        		'colegioBasica' => $_REQUEST['funcionarioFormacionBasicaColegio'],
        		'tituloBasica' => $_REQUEST['funcionarioFormacionBasicaTitul'],
        		'fechaGradoBasica' => $_REQUEST['funcionarioFechaFormacionBasica'],
        		'soporteBasica' => $_REQUEST['funcionarioSoporteFormacionBasica'],
        		'fk_ubicacion' => $id_ubicacion_formacion_basica[0][0]
        );
        
        $cadenaSql = $this->miSql->getCadenaSql("insertarFormacionBasica",$datosFormacionAcademicaBasica);
        $id_formacion_basica = $primerRecursoDB->ejecutarAcceso($cadenaSql, "busqueda", $datosFormacionAcademicaBasica);//********************************
        
 //**************************************************************************************************************
 
        
        $datosUbicacionFormacionMedia = array(
        		'paisFormacionMedia' => $_REQUEST['funcionarioFormacionMediaPais'],
        		'departamentoFormacionMedia' => $_REQUEST['funcionarioFormacionMediaDepartamento'],
        		'ciudadFormacionMedia' => $_REQUEST['funcionarioFormacionMediaCiudad']
        );
        
        $cadenaSql = $this->miSql->getCadenaSql("insertarUbicacionFormacionMedia",$datosUbicacionFormacionMedia);
        $id_ubicacion_formacion_media = $primerRecursoDB->ejecutarAcceso($cadenaSql, "busqueda", $datosUbicacionFormacionMedia, "insertarUbicacionFormacionMedia");
        
        
        $datosFormacionAcademicaMedia = array(
        		'modalidadMedia' => $_REQUEST['funcionarioFormacionMediaModalidad'],
        		'colegioMedia' => $_REQUEST['funcionarioFormacionMediaColegio'],
        		'tituloMedia' => $_REQUEST['funcionarioFormacionMediaTitul'],
        		'fechaGradoMedia' => $_REQUEST['funcionarioFechaFormacionMedia'],
        		'soporteMedia' => $_REQUEST['funcionarioSoporteFormacionMedia'],
        		'fk_ubicacion' => $id_ubicacion_formacion_media[0][0]
        );
        
        $cadenaSql = $this->miSql->getCadenaSql("insertarFormacionMedia",$datosFormacionAcademicaMedia);
        $id_formacion_media = $primerRecursoDB->ejecutarAcceso($cadenaSql, "busqueda",$datosFormacionAcademicaMedia);//********************************
        
 //***************************************************************************************************************
        
        $datosFormacionAcademicaFuncionario = array(
        		'fk_id_formacion_basica' => $id_formacion_basica[0][0],
        		'fk_id_formacion_media' => $id_formacion_media[0][0]
        );
        
        $cadenaSql = $this->miSql->getCadenaSql("insertarFormacionFuncionario",$datosFormacionAcademicaFuncionario);
        $id_datos_formacion_funcionario = $primerRecursoDB->ejecutarAcceso($cadenaSql, "busqueda", $datosFormacionAcademicaFuncionario, "insertarFormacionFuncionario");
        
 //***************************************************************************************************************       
        
        //var_dump($cadenaSql);
        //var_dump("El ID es..... ".$id_salida[0][0]);
        //exit;
        
        echo "El ID es ".$id_datos_formacion_funcionario[0][0];
        
        var_dump("
        		*******************************************************
        		Registro Parcial Satisfactorio
        			Las Tablas
        					Identificacion Basica
        					Datos de Nacimiento fueron almacenados
        					Información Residencia Contacto
        					Información Formación Basica
        					Información Formación Media
        					Relacion Formacion Funcionario
        			Con sus
        					id_ubicacion (5)
        			Retorno de
        					id_datos_identificacion
        					id_informacion_personal_basica
        					id_datos_residencia
        		
        						(id_formacion_basica)
        						(id_formacion_media)
        					id_datos_formacion_funcionario
        		*******************************************************");
        exit;
        
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