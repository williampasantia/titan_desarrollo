<?php

?>

<script>
     $('#<?php echo $this->campoSeguro('codTipoCargoRegistro')?>').width(200);
 $("#<?php echo $this->campoSeguro('codTipoCargoRegistro')?>").select2();
 $('#<?php echo $this->campoSeguro('tipoSueldoRegistro')?>').width(200);
 $("#<?php echo $this->campoSeguro('tipoSueldoRegistro')?>").select2(); 

 $('#<?php echo $this->campoSeguro('tipoSueldoRegistroMod')?>').width(200);
 $("#<?php echo $this->campoSeguro('tipoSueldoRegistroMod')?>").select2();  
 
 
 $('#<?php echo $this->campoSeguro('estadoRegistro')?>').width(200);
 $("#<?php echo $this->campoSeguro('estadoRegistro')?>").select2();  
   
</script>