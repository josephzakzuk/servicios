@extends('layouts.home')


@section('contenido')

<div class="row mt-5 bg-light p-4">

	<div class="col-md-5">
	
		<h6>SERVICIOS ASOCIADOS A: {{$cliente->cedula}}-{{$cliente->nombre}}</h6>
		
	</div>
	
	<div class="offset-md-2 col-md-5">
		<input type="tex" placeholder="buscar" class="form-control">
	</div>

</div>

<div class="row mt-1 bg-light">

	<div class="col-md-12">
	
		@include('clientes.tabla_detalle_servicios')
		
	</div>

</div>

<div id="contenedor_form"></div>

@endsection
