<?php 
namespace bloquesConcepto\contenidoConcepto\formulario;



if(!isset($GLOBALS["autorizado"])) {
	include("../index.php");
	exit;
}


class Formulario {

    var $miConfigurador;
    var $lenguaje;
    var $miFormulario;

    function __construct($lenguaje, $formulario, $sql) {

        $this->miConfigurador = \Configurador::singleton ();

        $this->miConfigurador->fabricaConexiones->setRecursoDB ( 'principal' );

        $this->lenguaje = $lenguaje;

        $this->miFormulario = $formulario;
        
        $this->miSql = $sql;

    }

    function formulario() {

        /**
         * IMPORTANTE: Este formulario está utilizando jquery.
         * Por tanto en el archivo ready.php se delaran algunas funciones js
         * que lo complementan.
         */

        // Rescatar los datos de este bloque
        $directorio = $this->miConfigurador->getVariableConfiguracion ( "host" );
       $directorio .= $this->miConfigurador->getVariableConfiguracion ( "site" ) . "/index.php?";
       $directorio .= $this->miConfigurador->getVariableConfiguracion ( "enlace" );
        // Rescatar los datos de este bloque
       $esteBloque = $this->miConfigurador->getVariableConfiguracion ( "esteBloque" );
        $rutaBloque = $this->miConfigurador->getVariableConfiguracion("host");
        $rutaBloque.=$this->miConfigurador->getVariableConfiguracion("site") . "/blocks/";
        $rutaBloque.= $esteBloque['grupo'] . "/" . $esteBloque['nombre'];
		
       

        // ---------------- SECCION: Parámetros Globales del Formulario ----------------------------------
        /**
        * Atributos que deben ser aplicados a todos los controles de este formulario.
        * Se utiliza un arreglo
        * independiente debido a que los atributos individuales se reinician cada vez que se declara un campo.
        *
        * Si se utiliza esta técnica es necesario realizar un mezcla entre este arreglo y el específico en cada control:
        * $atributos= array_merge($atributos,$atributosGlobales);
        */
        $atributosGlobales ['campoSeguro'] = 'true';
        $_REQUEST['tiempo']=time();
        
        $conexion = 'estructura';
        $primerRecursoDB = $this->miConfigurador->fabricaConexiones->getRecursoDB($conexion);
        
        //var_dump($primerRecursoDB);
        //exit;
        
        // -------------------------------------------------------------------------------------------------

        // ---------------- SECCION: Parámetros Generales del Formulario ----------------------------------
        $esteCampo = $esteBloque ['nombre'];
        $atributos ['id'] = $esteCampo;
        $atributos ['nombre'] = $esteCampo;

        // Si no se coloca, entonces toma el valor predeterminado 'application/x-www-form-urlencoded'
        $atributos ['tipoFormulario'] = '';

        // Si no se coloca, entonces toma el valor predeterminado 'POST'
        $atributos ['metodo'] = 'POST';

        // Si no se coloca, entonces toma el valor predeterminado 'index.php' (Recomendado)
        $atributos ['action'] = 'index.php';
        $atributos ['titulo'] = false;//$this->lenguaje->getCadena ( $esteCampo );

        // Si no se coloca, entonces toma el valor predeterminado.
        $atributos ['estilo'] = '';
        $atributos ['marco'] = true;
        $tab = 1;
        // ---------------- FIN SECCION: de Parámetros Generales del Formulario ----------------------------

        // ----------------INICIAR EL FORMULARIO ------------------------------------------------------------
        $atributos ['tipoEtiqueta'] = 'inicio';
        echo $this->miFormulario->formulario ( $atributos );

        // ---------------- SECCION: Controles del Formulario -----------------------------------------------
        
        
       // --------------------------------------------------------------------------------------------------
        
        $esteCampo = "marcoDatosBasicos";
		$atributos ['id'] = $esteCampo;
		$atributos ["estilo"] = "jqueryui";
		$atributos ['tipoEtiqueta'] = 'inicio';
		$atributos ["leyenda"] = "AGREGAR CONDICION";
		echo $this->miFormulario->marcoAgrupacion ( 'inicio', $atributos );
        // --------------------------------------------------------------------------------------------------
        
        $atributos ["id"] = "condicion";
        $atributos ["estilo"] = "row";
        echo $this->miFormulario->division ( "inicio", $atributos );
        
        $atributos ["id"] = "condicionSi";
        $atributos ["estilo"] = "col-md-2";
        echo $this->miFormulario->division ( "inicio", $atributos );
        
        $esteCampo = 'condicionSi';        
        $atributos ["estilo"] = "condicion";
        $atributos ['id'] = $esteCampo;
        $atributos ['nombre'] = $esteCampo;
        $atributos ['tipo'] = 'text';
        $atributos ['estilo'] = 'jqueryui';
        $atributos ['marco'] = true;
        $atributos ['columnas'] = 1;
        $atributos ['dobleLinea'] = false;
        $atributos ['tabIndex'] = $tab;
        $atributos ['anchoEtiqueta'] = 25;
        $atributos ['etiqueta'] = $this->lenguaje->getCadena ( $esteCampo );
//        $atributos ['obligatorio'] = true;
//        $atributos ['etiquetaObligatorio'] = true;
        $atributos ['validar'] = 'required';
        
        if (isset ( $_REQUEST [$esteCampo] )) {
        	$atributos ['valor'] = $_REQUEST [$esteCampo];
        } else {
        	$atributos ['valor'] = '';
        }
        $atributos ['titulo'] = $this->lenguaje->getCadena ( $esteCampo . 'Titulo' );
        $atributos ['deshabilitado'] = false;
        $atributos ['tamanno'] = 12;
        $atributos ['maximoTamanno'] = '';
        $tab ++;
        
        // Aplica atributos globales al control
        $atributos = array_merge ( $atributos, $atributosGlobales );
        echo $this->miFormulario->campoCuadroTexto ( $atributos );
//        unset($atributos);
        echo $this->miFormulario->division("fin"); 
        // --------------- FIN CONTROL : Cuadro de Texto --------------------------------------------------
        
        // ---------------- CONTROL: Select --------------------------------------------------------
        $atributos ["id"] = "variable";
        $atributos ["estilo"] = "col-md-2";
        echo $this->miFormulario->division ( "inicio", $atributos );
        
        $esteCampo = 'listaSignos';
        $atributos['nombre'] = $esteCampo;
        $atributos['id'] = $esteCampo;
        $atributos['etiqueta'] = $this->lenguaje->getCadena ( $esteCampo );
        $atributos['tab'] = $tab;
        $atributos['seleccion'] = -2;
        $atributos['evento'] = ' ';
        $atributos['deshabilitado'] = false;
        $atributos['limitar']= 50;
        $atributos['tamanno']= 1;
        $atributos['columnas']= 1;
        
       
        
        $atributos ['validar'] = 'required';
                 $matrizItems=array(
                 		array(1,'signo'),
                 		array(2,'<'),
                 		array(3,'<='),
                 		array(4,'>='),
                 		array(5,'>'),
                 		array(6,'='),
                 		array(7,'!=')
        
                 );
        $atributos['matrizItems'] = $matrizItems;
        
        if (isset ( $_REQUEST [$esteCampo] )) {
        	$atributos ['valor'] = $_REQUEST [$esteCampo];
        } else {
        	$atributos ['valor'] = '';
        }
        $tab ++;
        
        // Aplica atributos globales al control
        $atributos = array_merge ( $atributos, $atributosGlobales );
        echo $this->miFormulario->campoCuadroLista ( $atributos );
        echo $this->miFormulario->division("fin"); 
        // --------------- FIN CONTROL : Select --------------------------------------------------
       
         // --------------------------------------------------------------------------------------------------
        $atributos ["id"] = "condicion";
        $atributos ["estilo"] = "col-md-2";
        echo $this->miFormulario->division ( "inicio", $atributos );
        
        $esteCampo = 'variable';
        $atributos ['id'] = $esteCampo;
        $atributos ['nombre'] = $esteCampo;
        $atributos ['tipo'] = 'text';
        $atributos ['estilo'] = 'jqueryui';
        $atributos ['marco'] = true;
        $atributos ['columnas'] = 2;
        $atributos ['dobleLinea'] = false;
        $atributos ['tabIndex'] = $tab;
        $atributos ['etiqueta'] = '';
//        $atributos ['obligatorio'] = true;
//        $atributos ['etiquetaObligatorio'] = true;
        $atributos ['validar'] = 'required';
        
        if (isset ( $_REQUEST [$esteCampo] )) {
        	$atributos ['valor'] = $_REQUEST [$esteCampo];
        } else {
        	$atributos ['valor'] = '';
        }
       
        $atributos ['deshabilitado'] = false;
        $atributos ['tamanno'] = 20;
        $atributos ['maximoTamanno'] = '';
        $tab ++;
        
        // Aplica atributos globales al control
        $atributos = array_merge ( $atributos, $atributosGlobales );
        echo $this->miFormulario->campoCuadroTexto ( $atributos );
       
          echo $this->miFormulario->division("fin"); 
          // ---------------- CONTROL: Select --------------------------------------------------------
        $atributos ["id"] = "variable1";
        $atributos ["estilo"] = "col-md-2";
        echo $this->miFormulario->division ( "inicio", $atributos );
        $esteCampo = 'operadores';
        $atributos['nombre'] = $esteCampo;
        $atributos['id'] = $esteCampo;
        $atributos['tab'] = '';
        $atributos ['etiqueta'] = '';
        $atributos['seleccion'] = -2;
        $atributos['evento'] = ' ';
        $atributos['deshabilitado'] = false;
        $atributos['limitar']= 50;
        $atributos['tamanno']= 1;
        $atributos['columnas']= 1;
        
        $atributos ['ajax_function'] = "";
        $atributos ['ajax_control'] = $esteCampo;
        
      
        $atributos ['validar'] = 'required';
        
                 $matrizItems=array(
                                array(1,'operador'),
                 		array(2,'<'),
                 		array(3,'<='),
                 		array(4,'>='),
                 		array(5,'>'),
                 		array(6,'='),
                 		array(7,'!=')
        
                 );
        $atributos['matrizItems'] = $matrizItems;
        
        if (isset ( $_REQUEST [$esteCampo] )) {
        	$atributos ['valor'] = $_REQUEST [$esteCampo];
        } else {
        	$atributos ['valor'] = '';
        }
        $tab ++;
        
        // Aplica atributos globales al control
        $atributos = array_merge ( $atributos, $atributosGlobales );
        
        echo $this->miFormulario->campoCuadroLista ( $atributos );
        echo $this->miFormulario->division("fin");
     
        // --------------- FIN CONTROL : Select --------------------------------------------------
         $atributos ["id"] = "condicionPara";
        $atributos ["estilo"] = "col-md-4";
        echo $this->miFormulario->division ( "inicio", $atributos );
       
       
     
        $esteCampo = 'parametro';
        $atributos['nombre'] = $esteCampo;
        $atributos['id'] = $esteCampo;
        $atributos['tab'] = '';
        $atributos['etiqueta'] = $this->lenguaje->getCadena ( $esteCampo );
        $atributos['seleccion'] = -1;
        $atributos['evento'] = ' ';
        $atributos['deshabilitado'] = false;
        $atributos['limitar']= 50;
        $atributos['tamanno']= 1;
        $atributos['columnas']= 1;
        $atributos ['anchoEtiqueta'] = 100;
        $atributos ['ajax_function'] = "";
        $atributos ['ajax_control'] = $esteCampo;
        
      
        $atributos ['validar'] = 'required';
        
        
        $atributos ['cadena_sql'] = $this->miSql->getCadenaSql("buscarRegistroxParametro");
        $matrizParametros=$primerRecursoDB->ejecutarAcceso($atributos['cadena_sql'], "busqueda");
        
        $atributos['matrizItems'] = $matrizParametros;
        
        if (isset ( $_REQUEST [$esteCampo] )) {
        	$atributos ['valor'] = $_REQUEST [$esteCampo];
        } else {
        	$atributos ['valor'] = '';
        }
        $tab ++;
        
        // Aplica atributos globales al control
        $atributos = array_merge ( $atributos, $atributosGlobales );
        
        echo $this->miFormulario->campoCuadroLista ( $atributos );
      
        echo $this->miFormulario->division("fin");
       
      
        echo $this->miFormulario->division("fin"); 
          unset($atributos); 
        // --------------- FIN CONTROL : Cuadro de Texto --------------------------------------------------
         $atributos ["id"] = "condicion";
        $atributos ["estilo"] = "row";
        echo $this->miFormulario->division ( "inicio", $atributos );
        
        $atributos ["id"] = "condicionSi";
//        $atributos['columnas'] = 5;
        $atributos ["estilo"] = "col-md-5";
        echo $this->miFormulario->division ( "inicio", $atributos );
        
          $esteCampo = 'condicionEntonces';
        $atributos ['id'] = $esteCampo;
        $atributos ['nombre'] = $esteCampo;
        $atributos ['tipo'] = 'text';
        $atributos ['estilo'] = 'jqueryui';
        $atributos ['marco'] = true;
        $atributos ['columnas'] = 1;
        $atributos ['dobleLinea'] = false;
        $atributos ['tabIndex'] = $tab;
        $atributos ['etiqueta'] = $this->lenguaje->getCadena ( $esteCampo );
//        $atributos ['obligatorio'] = true;
//        $atributos ['etiquetaObligatorio'] = true;
        $atributos ['validar'] = 'required';
        
        if (isset ( $_REQUEST [$esteCampo] )) {
        	$atributos ['valor'] = $_REQUEST [$esteCampo];
        } else {
        	$atributos ['valor'] = '';
        }
        $atributos ['titulo'] = $this->lenguaje->getCadena ( $esteCampo . 'Titulo' );
        $atributos ['deshabilitado'] = false;
        $atributos ['tamanno'] = 20;
        $atributos ['maximoTamanno'] = '';
        $tab ++;
        
        // Aplica atributos globales al control
        $atributos = array_merge ( $atributos, $atributosGlobales );
        echo $this->miFormulario->campoCuadroTexto ( $atributos );
        unset($atributos);
         echo $this->miFormulario->division("fin"); 
           $atributos ["id"] = "condicion";
        $atributos ["estilo"] = "col-md-3";
        echo $this->miFormulario->division ( "inicio", $atributos );
          $variableMOD = "pagina=" . $this->miConfigurador->getVariableConfiguracion ( 'pagina' );; // pendiente la pagina para modificar parametro
                          $variableMOD .= "&opcion=modificar";
                          $variableMOD .= "&bloque=" . $esteBloque ['nombre'];
                          $variableMOD .= "&bloqueGrupo=" . $esteBloque ["grupo"];
                          $variableMOD = $this->miConfigurador->fabricaConexiones->crypto->codificar_url ( $variableMOD, $directorio );

                         echo "<td><center><a href='" . $variableMOD . "'>
                          <img src='" . $rutaBloque . "/css/images/Eliminar.png' width='35px'>
                          </a></center> </td>";
       
         echo $this->miFormulario->division("fin"); 
         
         
         $atributos ["id"] = "condicionPara";
        $atributos ["estilo"] = "col-md-4";
        echo $this->miFormulario->division ( "inicio", $atributos );
       
       
        $esteCampo = 'concepto';
        $atributos['nombre'] = $esteCampo;
        $atributos['id'] = $esteCampo;
        $atributos['tab'] = '';
        $atributos['etiqueta'] = $this->lenguaje->getCadena ( $esteCampo );
        $atributos['seleccion'] = -1;
        $atributos['evento'] = ' ';
        $atributos['deshabilitado'] = false;
        $atributos['limitar']= 50;
        $atributos['tamanno']= 1;
        $atributos['columnas']= 1;
        $atributos ['anchoEtiqueta'] = 100;
        $atributos ['ajax_function'] = "";
        $atributos ['ajax_control'] = $esteCampo;
        
      
        $atributos ['validar'] = 'required';
        
        
        $atributos ['cadena_sql'] = $this->miSql->getCadenaSql("buscarRegistroxParametro");
        $matrizParametros=$primerRecursoDB->ejecutarAcceso($atributos['cadena_sql'], "busqueda");
        
        $atributos['matrizItems'] = $matrizParametros;
        
        if (isset ( $_REQUEST [$esteCampo] )) {
        	$atributos ['valor'] = $_REQUEST [$esteCampo];
        } else {
        	$atributos ['valor'] = '';
        }
        $tab ++;
        
        // Aplica atributos globales al control
        $atributos = array_merge ( $atributos, $atributosGlobales );
        
        echo $this->miFormulario->campoCuadroLista ( $atributos );
      
        echo $this->miFormulario->division("fin");
        
        echo $this->miFormulario->division("fin"); 
        
          // -----------------CONTROL: Botón ----------------------------------------------------------------
       echo '<br>';
         $atributos ["id"] = "condicion2";
        $atributos ["estilo"] = "row";
        echo $this->miFormulario->division ( "inicio", $atributos );
        
        $atributos ["id"] = "condicionAg";
//        $atributos['columnas'] = 5;
        $atributos ["estilo"] = "col-md-3";
        echo $this->miFormulario->division ( "inicio", $atributos );
        
        $variableAG = "pagina=" . $this->miConfigurador->getVariableConfiguracion ( 'pagina' );; // pendiente la pagina para modificar parametro
                          $variableAG .= "&opcion=modificar";
                          $variableAG .= "&bloque=" . $esteBloque ['nombre'];
                          $variableAG .= "&bloqueGrupo=" . $esteBloque ["grupo"];
                          $variableAG = $this->miConfigurador->fabricaConexiones->crypto->codificar_url ( $variableAG, $directorio );

                         echo "<td><center><a href='" . $variableMOD . "'>
                          <img src='" . $rutaBloque . "/css/images/Adicionar.png' width='35px'>
                          </a></center> </td>";
        echo $this->miFormulario->division("fin"); 
        echo $this->miFormulario->division("fin"); 
        
        echo '<br>';
        echo '<br>';
      
        unset($atributos);
        $esteCampo = "marcoDatosParametros";
        $atributos ['id'] = $esteCampo;
        $atributos ["estilo"] = "jqueryui";
        $atributos ['tipoEtiqueta'] = 'inicio';
        $atributos ["leyenda"] = "Panel Condiciones";
        echo $this->miFormulario->marcoAgrupacion ( 'inicio', $atributos );
        {
        	unset($atributos);
        	$atributos ["id"] = "camposDinamicos";
        	$atributos ["estilo"] = "col-md-8";
        	echo $this->miFormulario->division ( "inicio", $atributos );
        	{
        		
        	}
        	echo $this->miFormulario->division("fin");
        	
        	unset($atributos);
        	$atributos ["id"] = "opcionesCamposDinamicos";
        	$atributos ["estilo"] = "col-md-4";
        	echo $this->miFormulario->division ( "inicio", $atributos );
        	{
        		echo "<center>";
        		echo "<input type=\"button\" id=\"btAdd\" value=\"Añadir Elemento\" class=\"btn btn-success\" />";
				echo "<input type=\"button\" id=\"btRemove\" value=\"Eliminar Elemento\" class=\"btn btn-success\" />";
				echo "<input type=\"button\" id=\"btRemoveAll\" value=\"Eliminar Todo\" class=\"btn btn-success\" /><br />";
				echo "</center>";
        	}
        	echo $this->miFormulario->division("fin");
        }
        echo $this->miFormulario->marcoAgrupacion("fin");
                        
                        
                          
         
        // --------------- FIN CONTROL : Cuadro de Texto --------------------------------------------------
        // ------------------Division para los botones-------------------------
                        $atributos ["id"] = "botones";
                        $atributos ["estilo"] = "marcoBotones";
                        echo $this->miFormulario->division ( "inicio", $atributos );

                        // -----------------CONTROL: Botón ----------------------------------------------------------------
                        $esteCampo = 'botonRegistrarCargo';
                        $atributos ["id"] = $esteCampo;
                        $atributos ["tabIndex"] = $tab;
                        $atributos ["tipo"] = 'boton';
                        // submit: no se coloca si se desea un tipo button genérico
                        $atributos ['submit'] = true;
                        $atributos ["estiloMarco"] = '';
                        $atributos ["estiloBoton"] = 'jqueryui';
                        // verificar: true para verificar el formulario antes de pasarlo al servidor.
                        $atributos ["verificar"] = '';
                        $atributos ["tipoSubmit"] = 'jquery'; // Dejar vacio para un submit normal, en este caso se ejecuta la función submit declarada en ready.js
                        $atributos ["valor"] = $this->lenguaje->getCadena ( $esteCampo );
                        $atributos ['nombreFormulario'] = $esteBloque ['nombre'];
                        $tab ++;

                        // Aplica atributos globales al control
                        $atributos = array_merge ( $atributos, $atributosGlobales );
                        echo $this->miFormulario->campoBoton ( $atributos );
                        
                        
                      
                        
                        
                        // -----------------FIN CONTROL: Botón -----------------------------------------------------------

                        // ------------------Fin Division para los botones-------------------------
                   
                        
                        echo $this->miFormulario->division("fin"); 
                        
                        
                        
        // ---------------- CONTROL: Tabla Cargos sin Sara -----------------------------------------------                
                        
    
                       
            
           
                
        
        
       
        /**
                        
                        
        // ---------------- CONTROL: Tabla Cargos -----------------------------------------------                
//                        
//        $atributos ['cadena_sql'] = $this->miSql->getCadenaSql("buscarRegistroxCargo");
//        $matrizItems=$primerRecursoDB->ejecutarAcceso($atributos['cadena_sql'], "busqueda");
//       
//        echo $this->miFormulario->tablaReporte($matrizItems);
//        
//       echo $this->miFormulario->marcoAgrupacion ( 'fin' );

        // ------------------- SECCION: Paso de variables ------------------------------------------------

        /**
         * En algunas ocasiones es útil pasar variables entre las diferentes páginas.
         * SARA permite realizar esto a través de tres
         * mecanismos:
         * (a). Registrando las variables como variables de sesión. Estarán disponibles durante toda la sesión de usuario. Requiere acceso a
         * la base de datos.
         * (b). Incluirlas de manera codificada como campos de los formularios. Para ello se utiliza un campo especial denominado
         * formsara, cuyo valor será una cadena codificada que contiene las variables.
         * (c) a través de campos ocultos en los formularios. (deprecated)
        */

        // En este formulario se utiliza el mecanismo (b) para pasar las siguientes variables:

        // Paso 1: crear el listado de variables

        $valorCodificado = "actionBloque=" . $esteBloque ["nombre"]; //Ir pagina Funcionalidad
        $valorCodificado .= "&pagina=" . $this->miConfigurador->getVariableConfiguracion ( 'pagina' );//Frontera mostrar formulario
        $valorCodificado .= "&bloque=" . $esteBloque ['nombre'];
        $valorCodificado .= "&bloqueGrupo=" . $esteBloque ["grupo"];
        $valorCodificado .= "&opcion=registrar";
        /**
         * SARA permite que los nombres de los campos sean dinámicos.
         * Para ello utiliza la hora en que es creado el formulario para
         * codificar el nombre de cada campo. 
         */
        $valorCodificado .= "&campoSeguro=" . $_REQUEST['tiempo'];
        // Paso 2: codificar la cadena resultante
        $valorCodificado = $this->miConfigurador->fabricaConexiones->crypto->codificar ( $valorCodificado );

        $atributos ["id"] = "formSaraData"; // No cambiar este nombre
        $atributos ["tipo"] = "hidden";
        $atributos ['estilo'] = '';
        $atributos ["obligatorio"] = false;
        $atributos ['marco'] = true;
        $atributos ["etiqueta"] = "";
        $atributos ["valor"] = $valorCodificado;
        echo $this->miFormulario->campoCuadroTexto ( $atributos );
        unset ( $atributos );

        // ----------------FIN SECCION: Paso de variables -------------------------------------------------

        // ---------------- FIN SECCION: Controles del Formulario -------------------------------------------

        // ----------------FINALIZAR EL FORMULARIO ----------------------------------------------------------
        // Se debe declarar el mismo atributo de marco con que se inició el formulario.
        $atributos ['marco'] = true;
        $atributos ['tipoEtiqueta'] = 'fin';
        echo $this->miFormulario->formulario ( $atributos );

        return true;

    }

    function mensaje() {

        // Si existe algun tipo de error en el login aparece el siguiente mensaje
        $mensaje = $this->miConfigurador->getVariableConfiguracion ( 'mostrarMensaje' );
        $this->miConfigurador->setVariableConfiguracion ( 'mostrarMensaje', null );

        if ($mensaje) {

            $tipoMensaje = $this->miConfigurador->getVariableConfiguracion ( 'tipoMensaje' );

            if ($tipoMensaje == 'json') {

                $atributos ['mensaje'] = $mensaje;
                $atributos ['json'] = true;
            } else {
                $atributos ['mensaje'] = $this->lenguaje->getCadena ( $mensaje );
            }
            // -------------Control texto-----------------------
            $esteCampo = 'divMensaje';
            $atributos ['id'] = $esteCampo;
            $atributos ["tamanno"] = '';
            $atributos ["estilo"] = 'information';
            $atributos ["etiqueta"] = '';
            $atributos ["columnas"] = ''; // El control ocupa 47% del tamaño del formulario
            echo $this->miFormulario->campoMensaje ( $atributos );
            unset ( $atributos );

             
        }

        return true;

    }

}

$miFormulario = new Formulario ( $this->lenguaje, $this->miFormulario, $this->sql );


$miFormulario->formulario ();
$miFormulario->mensaje ();

?>