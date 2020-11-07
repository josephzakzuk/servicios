@extends('modal.base')

@section('contenido_modal')
<form id="formulario_clientes"
      action="{{route('clientes.store')}}" 
	  method="POST"
	  onsubmit='ajaxFormFile({form:this, callback(){$("#formulario_clientes")[0].reset();$("#modal_crear_cliente, #modal_editar_cliente").modal("hide")}})'
	  enctype="multipart/form-data"
	  class="needs-validation" novalidate>
	  @csrf
	  
  @if(!empty($cliente))
	   <input name="id" type="hidden" value="{{$cliente->id}}">
  @endif	
  <div class="form-row">
  
	<div class="col-md-4 mb-3">
      <label>Cedula</label>
      <input name="cedula" type="text" class="form-control" value="{{$cliente->cedula ?? ''}}" required>
    </div>
	
    <div class="col-md-8 mb-3">
      <label>Nombre</label>
      <input name="nombre" type="text" class="form-control" value="{{$cliente->nombre ?? ''}}" required>
    </div>
	
  </div>
  
  <div class="form-row">
    
	<div class="col-md-4 mb-3">
      <label >Correo</label>
      <input name="correo" type="text" class="form-control" value="{{$cliente->correo ?? ''}}" required>
    </div>
	
    <div class="col-md-4 mb-3">
      <label>Telefono</label>
      <input name="telefono" type="text" class="form-control" value="{{$cliente->telefono ?? ''}}" required>
    </div>
	
	<div class="col-md-4 mb-3">
      <label >Direccion</label>
      <input name="direccion" type="text" class="form-control" value="{{$cliente->direccion ?? ''}}" required>
    </div>
	
  </div>
  
  <div class="form-row">
  
	<div class="form-group col-md-4">
							@php 
							  $foto = empty($cliente->imagen)?asset('img/user.png'):asset('img/clientes/'.$cliente->imagen);
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
      <textarea name="observaciones" class="form-control">{{$cliente->observaciones ?? ''}}</textarea>
    </div>
	
  </div>
  
  <button type="submit" class="btn btn-success float-right">Guardar cliente</button>
  
</form>
@endsection