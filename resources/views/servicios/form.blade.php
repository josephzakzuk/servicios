@extends('modal.base')

@section('contenido_modal')
<form id="formulario_servicios"
      action="{{route('servicios.store')}}" 
	  method="POST"
	  onsubmit='ajaxFormFile({form:this, callback(){$("#formulario_servicios")[0].reset();$("#modal_crear_servicio, #modal_editar_servicio").modal("hide")}})'
	  enctype="multipart/form-data"
	  class="needs-validation" novalidate>
	  @csrf
	  
  @if(!empty($servicio))
	   <input name="id" type="hidden" value="{{$servicio->id}}">
  @endif	
  <div class="form-row">
  
    <div class="col-md-8 mb-3">
      <label>Nombre</label>
      <input name="nombre" type="text" class="form-control" value="{{$servicio->nombre ?? ''}}" required>
    </div>
  
    <div class="col-md-4 mb-3">
      <label>Tipo de servicio</label>
      <select name="tipo_servicio_id" class="form-control">
			@foreach($tipo_servicios as $ts)
				<option value="{{$ts->id}}">{{$ts->descripcion}}</option>
			@endforeach
	  </select>
    </div>
	
  </div>
  
  <div class="form-row">
  
	<div class="form-group col-md-4">
							@php 
							  $foto = empty($servicio->imagen)?asset('img/product.jpg'):asset('img/servicios/'.$servicio->imagen);
							@endphp
							
							
							<img id="foto" src="{{$foto}}" style="max-width:90;max-height:100px;">
							<input class="mt-2" 
								   type="file" 
								   name="imagen"
								   accept="image/x-png,image/gif,image/jpeg"
								   onchange="readURL(this)"
								   >
	</div> 
    
	<div class="col-md-8 mb-3">
      <label>Observaciones</label>
      <textarea name="observaciones" class="form-control">{{$servicio->observaciones ?? ''}}</textarea>
    </div>
	
  </div>
  
  <button type="submit" class="btn btn-success float-right">Guardar servicio</button>
  
</form>
@endsection