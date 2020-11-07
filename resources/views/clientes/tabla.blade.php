<table class="table table-bordered mt-2">
  <thead>
    <tr>
      <th>#</th>
      <th>Cedula</th>
      <th>Nombre</th>
      <th>Correo</th>
      <th>Telefono</th>
      <th>Direccion</th>
      <th>Observaciones</th>
      <th>...</th>
    </tr>
  </thead>
  <tbody style="background:white;">
  
	@if(!empty('clientes'))
		
		@foreach($clientes as $key=>$cliente)
			
			<tr>
			  <td>{{$key+1}}</td>
			  <td>{{$cliente->cedula}}</td>
			  <td>{{$cliente->nombre}}</td>
			  <td>{{$cliente->correo}}</td>
			  <td>{{$cliente->telefono}}</td>
			  <td>{{$cliente->direccion}}</td>
			  <td>{{$cliente->observaciones}}</td>
			  <td style="width:180px;">
			  
				<a href="{{route('clientes.detalleservicios', $cliente->id)}}" type="button" class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i></a>
				
				<button onclick="load({
										url:'{{route('clientes.edit',$cliente->id)}}',
										container:'#contenedor_form',
										callback(){
											
											//inicial el modal dle formulario clientes
											$('#modal_editar_cliente').modal().draggable({handle: '.modal-header'});
											
										}
									})"
				        type="button" 
						class="btn btn-sm btn-warning"><i class="fas fa-edit"></i>
				</button>
						
				<button onclick="alertify.confirm('¿Realmente deseas borrar al cliente?<br> -> {{$cliente->nombre}}', function(){
										
										$.post('{{route('clientes.destroy', $cliente->id)}}',{_token:'{{csrf_token()}}'}).done(function(response){
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
				
				<button
					   onclick="load({
										url:'{{route('clientes.addservice',$cliente->id)}}',
										container:'#contenedor_form',
										callback(){
											
											//iniciar el modal
											$('#modal_cliente_add_service').modal().draggable({handle: '.modal-header'});
											
										}
									})"
				       class="btn btn-success btn-sm"
				       type="button"><i class="fas fa-cart-plus"></i></button>
				
			  </td>
			</tr>
		
		@endforeach
		
	@endif
    
  </tbody>
</table>

 {{$clientes->links()}}