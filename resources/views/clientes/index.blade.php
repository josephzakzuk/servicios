@extends('layouts.home')


@section('contenido')

<div class="row mt-5 bg-light p-4">

	<div class="col-md-5">
	
		<button class="btn btn-info"
		        onclick="load({
								url:'{{route('clientes.create')}}',
								container:'#contenedor_form',
								callback(){
									
									//inicial el modal dle formulario clientes
									$('#modal_crear_cliente').modal().draggable({handle: '.modal-header'});
									
								}
				})"
				>Crear cliente</button>
		
	</div>
	
	<div class="offset-md-2 col-md-5">
		<input type="tex" placeholder="buscar" class="form-control">
	</div>

</div>

<div class="row mt-1 bg-light">

	<div class="col-md-12">
	
		@include('clientes.tabla')
		
	</div>

</div>

<div id="contenedor_form"></div>

@endsection

@section('scripts')
	@include('clientes.scripts')
@append