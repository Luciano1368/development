
$(document).ready(function(){        
          
    $('#btnTraerDatos').click(function(){

    	document.getElementById('overlay').style.display = 'block';

        $.ajax({
	        type: 'POST',
	        url: '../controller/index.php',
	        data: {
	        	userId : "userId"
	        },
	        success: function (response) {
	        	
	        	document.getElementById('overlay').style.display = 'none';

	            if (response != "0") {
	            	Swal.fire({
		                title: "Datos Adquiridos",
		                width: 400,				                
		                timer: 5000,
		                showConfirmButton: true,
		                confirmButtonText: "Cerrar"

		            }).then(function(result) {
		            	location.reload();
		            })
	            }else{

	            	Swal.fire({
	                icon: 'error',
	                title: "Error",
	                showConfirmButton: true,
	                confirmButtonText: "Cerrar"
		            })
	            }
	           
	        }
    	});	 	
			
	});
	
});

//FUNCION PARA MOSTRAR LOS DATOS REQUERIDOS A TRAVES DEL ID MEDIANTE AJAX
function mostrarDatos(val){
	document.getElementById('overlay').style.display = 'block';
	$.ajax({
        type: 'POST',
        url: '../controller/index.php',
        data: {
        	idMostrar : val
        },
        success: function (response) {
        	
        	document.getElementById('overlay').style.display = 'none';

        	Swal.fire({
                title: response,
                width: 400,				                
                timer: 5000,
                showConfirmButton: true,
                confirmButtonText: "Cerrar"

            }).then(function(result) {
            	
            })
           
           
        }
	});	 	
}