<?php

if(isset($_POST['condicionSi'])){
    $emails=$_POST['condicionSi'];
    for ($i=0; $i<=count($emails); $i++) {
    echo $emails[$i].'<br>';
}
}

?>

<script>

function agregar() {
	campo = '<li><label>Email:</label><input type="text" size="20" name="condicionSi[]" /></li>';
	$("#condicionAg").append(campo);
}


 $('#<?php echo $this->campoSeguro('listaSignos')?>').width(100);
 $("#<?php echo $this->campoSeguro('listaSignos')?>").select2();
 
 $('#<?php echo $this->campoSeguro('operadores')?>').width(120);
 $("#<?php echo $this->campoSeguro('operadores')?>").select2();

 $('#<?php echo $this->campoSeguro('concepto')?>').width(140);
 $("#<?php echo $this->campoSeguro('concepto')?>").select2();

 $('#<?php echo $this->campoSeguro('parametro')?>').width(140);
 $("#<?php echo $this->campoSeguro('parametro')?>").select2();
 

 $('#<?php echo $this->campoSeguro('tipoSueldoRegistroMod')?>').width(200);
 $("#<?php echo $this->campoSeguro('tipoSueldoRegistroMod')?>").select2();  
 
 
 $('#<?php echo $this->campoSeguro('estadoRegistro')?>').width(200);
 $("#<?php echo $this->campoSeguro('estadoRegistro')?>").select2();  
    
$( "#<?php echo $this->campoSeguro('personaNaturalPrimerNombre')?>" ).change(function() {
	$("#<?php echo $this->campoSeguro('personaNaturalPrimerApellido') ?>").val('Nada');
	$("#<?php echo $this->campoSeguro('personaCarrera') ?>").val(-6);
});


</script>