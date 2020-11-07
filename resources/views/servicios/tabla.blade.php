
<table class="table table-bordered mt-2">
  <thead>
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>Imagen</th>
      <th>Tipo Servicio</th>
      <th>Observaciones</th>
      <th>...</th>
    </tr>
  </thead>
  <tbody style="background:white;">
  
	@if(!empty('servicios'))
		
		@foreach($servicios as $key=>$servicio)
			
			<tr>
			  <td>{{$key+1}}</td>
			  <td>{{$servicio->nombre}}</td>
			  <td>imagen</td>
			  <td>{{$servicio->tipoServicio->descripcion}}</td>
			  <td>{{$servicio->observaciones}}</td>
			  <td>
			  
					<button onclick="load({
											url:'{{route('servicios.edit',$servicio->id)}}',
											container:'#contenedor_form',
											callback(){
												
												//inicial el modal dle formulario servicios
												$('#modal_editar_servicio').modal().draggable({handle: '.modal-header'});
												
											}
										})"
							type="button" 
							class="btn btn-sm btn-warning"><i class="fas fa-edit"></i>
					</button>
							
					<button onclick="alertify.confirm('¿Realmente deseas borrar el producto?<br> -> {{$servicio->nombre}}', function(){
											
											$.post('{{route('servicios.destroy', $servicio->id)}}',{_token:'{{csrf_token()}}'}).done(function(response){
												console.log(response);
												if(undefined!== response.mensaje && response.error == 0){
													toastr[response.error>0?'error':'success'](response.mensaje);
												}
												
											}).fail(function(){
												toastr.error('Ha ocurrido un error!');
											});
											
									}).setHeader('CONFIRMAR')"
							type="button" 
							class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>
					</button>
			  
			  </td>
			</tr>
		
		@endforeach
		
	@endif
    
  </tbody>
  
   
 
  
</table>

 {{$servicios->links()}}
 