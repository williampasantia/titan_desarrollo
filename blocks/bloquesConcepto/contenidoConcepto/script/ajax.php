<?php
var_dump($_REQUEST);
?>

<script>

    
    
 $('#<?php echo $this->campoSeguro('variable')?>').width(200);
 $("#<?php echo $this->campoSeguro('variable')?>").select2(); 


 $('#<?php echo $this->campoSeguro('listaSignos')?>').width(200);
 $("#<?php echo $this->campoSeguro('listaSignos')?>").select2();
 


 $('#<?php echo $this->campoSeguro('tipoSueldoRegistroMod')?>').width(200);
 $("#<?php echo $this->campoSeguro('tipoSueldoRegistroMod')?>").select2();  
 
 
 $('#<?php echo $this->campoSeguro('estadoRegistro')?>').width(200);
 $("#<?php echo $this->campoSeguro('estadoRegistro')?>").select2();  
    
$( "#<?php echo $this->campoSeguro('personaNaturalPrimerNombre')?>" ).change(function() {
	$("#<?php echo $this->campoSeguro('personaNaturalPrimerApellido') ?>").val('Nada');
	$("#<?php echo $this->campoSeguro('personaCarrera') ?>").val(-6);
});
</script>