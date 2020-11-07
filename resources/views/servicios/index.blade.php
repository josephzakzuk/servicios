@extends('layouts.home')


@section('contenido')

<div class="row mt-5 bg-light p-4">

	<div class="col-md-5">
		<button onclick="load({
								url:'{{route('servicios.create')}}',
								container:'#contenedor_form',
								callback(){
									
									//inicial el modal dle formulario clientes
									$('#modal_crear_servicio').modal().draggable({handle: '.modal-header'});
									
								}
						})"
		        class="btn btn-info">Crear Servicio</button>
	</div>

	<div class="offset-md-2 col-md-5">
		<input type="tex" placeholder="buscar" class="form-control">
	</div>

</div>

<div class="row mt-1 bg-light">

	<div class="col-md-12">
	
		@include('servicios.tabla')
		
	</div>

</div>

<div id="contenedor_form"></div>

@endsection