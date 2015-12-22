<?php

// URL base
$url = $this->miConfigurador->getVariableConfiguracion ( "host" );
$url .= $this->miConfigurador->getVariableConfiguracion ( "site" );
$url .= "/index.php?";

var_dump($_REQUEST);

// Variables
$cadenaACodificar4 = "pagina=" . $this->miConfigurador->getVariableConfiguracion ( "pagina" );
$cadenaACodificar4 .= "&procesarAjax=true";
$cadenaACodificar4 .= "&action=index.php";
$cadenaACodificar4 .= "&bloqueNombre=" . $esteBloque ["nombre"];
$cadenaACodificar4 .= "&bloqueGrupo=" . $esteBloque ["grupo"];
$cadenaACodificar4 .= $cadenaACodificar4 . "&funcion=consultarCiudad";
$cadenaACodificar4 .= "&tiempo=" . $_REQUEST ['tiempo'];

// Codificar las variables
$enlace = $this->miConfigurador->getVariableConfiguracion ( "enlace" );
$cadena4 = $this->miConfigurador->fabricaConexiones->crypto->codificar_url ( $cadenaACodificar4, $enlace );

// URL definitiva
$urlFinal4 = $url . $cadena4;


?>

<script type='text/javascript'>
    







function consultarCiudad(elem, request, response){
		  $.ajax({
		    url: "<?php echo $urlFinal4?>",
		    dataType: "json",
		    data: { valor:$("#<?php echo $this->campoSeguro('lugarRegistroDepto')?>").val()},
		    success: function(data){ 



		        if(data[0]!=" "){

		            $("#<?php echo $this->campoSeguro('lugarRegistro')?>").html('');
		            $("<option value=''>Seleccione  ....</option>").appendTo("#<?php echo $this->campoSeguro('lugarRegistro')?>");
		            $.each(data , function(indice,valor){

		            	$("<option value='"+data[ indice ].ID_CIUDAD+"'>"+data[ indice ].NOMBRE+"</option>").appendTo("#<?php echo $this->campoSeguro('lugarRegistro')?>");
		            	
		            });
		            
		            $("#<?php echo $this->campoSeguro('lugarRegistro')?>").removeAttr('disabled');
		            
		            $('#<?php echo $this->campoSeguro('lugarRegistro')?>').width(200);
		            $("#<?php echo $this->campoSeguro('lugarRegistro')?>").select2();
		            
		          
		            
			        }
		    			

		    }
			                    
		   });
}
</script>