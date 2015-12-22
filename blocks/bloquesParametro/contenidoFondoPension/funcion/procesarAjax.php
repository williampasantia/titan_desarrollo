<?php


$conexion = "estructura";
$esteRecursoDB = $this->miConfigurador->fabricaConexiones->getRecursoDB($conexion);



if ($_REQUEST ['funcion'] == 'consultarCiudad') {




	$cadenaSql = $this->sql->getCadenaSql ( 'consultarCiudad', $_REQUEST['valor'] );
	$resultado = $esteRecursoDB->ejecutarAcceso ( $cadenaSql, "busqueda" );

        
	$resultado = json_encode ( $resultado);

	echo $resultado;
}





?>

