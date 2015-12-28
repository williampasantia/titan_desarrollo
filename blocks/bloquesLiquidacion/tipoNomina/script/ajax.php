<?php

// URL base

?>

<script>
                  
          $(function () {
	        
	        $("#<?php echo $this->campoSeguro('tipoNomina')?>").change(function(){
	        	if($("#<?php echo $this->campoSeguro('tipoNomina')?>").val()==1 || $("#<?php echo $this->campoSeguro('tipoNomina')?>").val()==3  ){
	            	     $("#<?php echo $this->campoSeguro('periodo')?>").removeAttr('disabled');
		            
		            //$('#<?php echo $this->campoSeguro('periodo')?>').width(250);
		            $("#<?php echo $this->campoSeguro('periodo')?>").select2();
		            
		            $("#<?php echo $this->campoSeguro('periodo')?>").removeClass("validate[required]");
	    		}else{
	    			$("#<?php echo $this->campoSeguro('periodo')?>").attr('disabled','');
	    			}
	    	      });
	        
		
	    });
</script>