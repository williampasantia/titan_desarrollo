

$("#contenidoConcepto").validationEngine({
	promptPosition : "centerRight",
	scroll: false,
	autoHidePrompt: true,
	autoHideDelay: 2000
});


    
    
$('#datepicker').datepicker({
	autoHidePrompt: true
});


 $('#<?php echo $this->campoSeguro('seccionParametros')?>').width(400);
 $("#<?php echo $this->campoSeguro('seccionParametros')?>").select2(); 


 $('#<?php echo $this->campoSeguro('seccionConceptos')?>').width(400);
 $("#<?php echo $this->campoSeguro('seccionConceptos')?>").select2();


 