@extends('modal.base')

@section('contenido_modal')

<form id="formulario_cliente_add_service"
      action="{{route('clientes.addservice.store')}}" 
	  method="POST"
	  onsubmit='ajaxFormFile({form:this,callback(){$("#modal_cliente_add_service").modal("hide")}})'
	  enctype="multipart/form-data"
	  class="needs-validation" novalidate>
	  @csrf
	  
    <div class="form-row">
  
		<div class="col-md-8 mb-3">
		  <label>Servicio</label>
		  <select id="select_servicio_cliente" class="form-control">
			@foreach($servicios as $servicio)
				<option value="{{$servicio->id}}">{{$servicio->nombre}}</option>
			@endforeach
		  </select>
		</div>
  
		<div class="col-md-4 mb-3">
		  <label>&nbsp;</label><br>
		 <button onclick="agregarServicioCliente()"
		         type="button"
				 class="btn- btn-sm btn-info"><i class="fas fa-arrow-down"></i></button>
		</div>
		
  </div>
  
  <div class="row">
  
	<div class="col-md-12">
	
		
		<ul class="list-group" id="contenedor_servicios_cliente" style="max-height:280px;overflow:scroll">
		
		<!-- este div es una plantilla para ir agregando mas serivicos -->
		  <li id="plantilla_servicio_cliente" 
			  style="display:none!important;"
		      class="list-group-item d-flex justify-content-between align-items-center">
			 <div class="row">
				<div class="col-md-6"><input type="hidden" class="servicio_id"><input type="hidden" class="orden" value="{{$max_orden}}">
									  <input type="hidden" class="cliente_id" value="{{$cliente->id}}">
									  <p class="servicio_texto" style="min-width:340px!important;"></p></div>
				<div class="col-md-3"><input type="date" class="fecha_inicio form-control"></div>
				<div class="col-md-3"><input type="date" class="fecha_fin form-control"></div>
			 </div>
		  </li>
		  
		</ul>
	
	</div>
  

  
  </div>
  
 
  
 
  
  <button type="submit" class="btn btn-success float-right">Guardar servicios</button>
  
</form>

@endsection