<table class="table table-bordered mt-2">
  <thead>
    <tr>
      <th>Orden</th>
      <th>Servicio</th>
      <th>Fecha inicio</th>
      <th>Fecha fin</th>
    </tr>
  </thead>
  <tbody style="background:white;">
  
	@if(!empty($servicios_clientes))
		
		@foreach($servicios_clientes as $key=>$servicio_cliente)
			
			<tr>
			  <td>{{$servicio_cliente->orden}}</td>
			  <td>{{$servicio_cliente->servicio->nombre}}</td>
			  <td>{{$servicio_cliente->fecha_inicio}}</td>
			  <td>{{$servicio_cliente->fecha_fin}}</td>
			  
			</tr>
		
		@endforeach
		
	@endif
    
  </tbody>
</table>

 {{$servicios_clientes->links()}}