function ajaxFormFile(args){
	
	event.preventDefault();
 
    var formData = new FormData(args.form);

    $.ajax({
        url: $(args.form).attr("action"),
        type: $(args.form).attr("method"),
        data: formData,
        success(response){
			
          
					if(undefined!==response.mensaje){
						toastr.success(response.mensaje);
					}
					
					if(typeof args.callback == 'function'){
						args.callback(response);
					}
				 
				
        },
        cache: false,
        contentType: false,
        processData: false,
		error(response){
			
			if(undefined!==response.responseJSON && undefined !== response.responseJSON.errores){
				
						$.each(response.responseJSON.errores, function(i, v){
							toastr.error(v);
						});
				
				}else{
						toastr.error("Ha ocurrido un error");
			}
			
		}
    });
	
}

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#foto').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}