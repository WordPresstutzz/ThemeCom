$(document).ready( function() {        
            
            jQuery('div.woocommerce').on('change', 'input.qty', function(){ 
                jQuery("[name='update_cart']").trigger("click"); 
			   }); 
        });