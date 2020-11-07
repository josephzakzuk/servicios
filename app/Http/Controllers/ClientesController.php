<?php

namespace App\Http\Controllers;
use App\Cliente;
use App\Servicio;
use App\ServicioCliente;
use Validator;
use Storage;
use File;
use DB;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index(){
		
		$clientes = Cliente::paginate(5);
		
		return view('clientes.index',compact('clientes'));
		
	}
	
	public function create(){
		
		$titulo_modal = 'Crear cliente nuevo';
		$id_modal = "modal_crear_cliente";
		$modal_size = 'lg';
		$text_aceptar = 'Guardar cliente';
		$no_accept_button = true;
		return view('clientes.form',compact('titulo_modal','id_modal','modal_size', 'text_aceptar', 'no_accept_button'));
	}
	
	public function edit(Cliente $cliente){
		
		$titulo_modal = 'Editando el cliente: '.$cliente->nombre;
		$id_modal = "modal_editar_cliente";
		$modal_size = 'lg';
		$text_aceptar = 'Guardar cliente';
		$no_accept_button = true;
		
		return view('clientes.form',compact('cliente','titulo_modal','id_modal','modal_size', 'text_aceptar', 'no_accept_button'));
	}
	
	public function store(Request $request){
		
		$mensajes_error = [
							'cedula.required' => 'Por favor ingresa la cedula',
							'nombre.required' => 'Por favor ingresa el nombre',
							'correo.required' => 'Por favor ingresa el correo',
							'telefono.required' => 'Por favor ingresa el telefono',
							'direccion.required' => 'Por favor ingresa la direccion'
							];
		$validator = Validator::make($request->all(),[
									'cedula' => 'required',
									'nombre' => 'required',
									'correo' => 'required',
									'telefono' => 'required',
									'direccion' => 'required'
									],$mensajes_error);

		if ($validator->fails()) {
			
			return response()->json(array('errores' => $validator->messages()), 500);
			
		}else{
			
			$datos = $request->all();
			
			if(!empty($request->id)){
				$cliente = Cliente::find($request->id);
				unset($datos['imagen']);
				$cliente->update($datos);
			}else{
				$datos['imagen'] = '';
				$cliente = Cliente::create($datos);
			}
			
			if($request->hasFile('imagen')){
			
				$path = Storage::disk('fotos')->path('clientes');
				
				$file = $request->file('imagen');
				
				$original_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
				$new_name = 'cliente_'.$cliente->id;
				$extension = $file->extension();
						
				Storage::disk('fotos')->put('clientes/'.$new_name.'.'.$extension,  File::get($file));
				
				$cliente->imagen = $new_name.'.'.$extension;
				$cliente->save();
				
		}
			
			return response()->json(array('mensaje' => 'El cliente ha sido guardado'), 200);
			
		}
		
	}
	
	public function destroy(Request $request){
		$cliente = Cliente::find($request->cliente);
		if($cliente->serviciosClientes->count() > 0){
				return response()->json(array('error'=>1,'mensaje' => 'El cliente tiene servicios asociados!'), 200);
		}else{
			$cliente->delete();
			return response()->json(array('error'=>0,'mensaje' => 'El cliente ha sido eliminado!'), 200);
		}
	}
	
	public function showAddService(Cliente $cliente){
		
		$titulo_modal = 'Agregar servicios al cliente: '.$cliente->nombre;
		$id_modal = "modal_cliente_add_service";
		$modal_size = 'lg';
		$text_aceptar = 'Guardar';
		$no_accept_button = true;
		
		$servicios = Servicio::all();
		
		$max_orden = "select coalesce(max(orden), 0) as orden from servicios_clientes";
		$max_orden = DB::select($max_orden);
		$max_orden = $max_orden[0]->orden;
		
		return view('clientes.agregar_servicio',compact('max_orden','servicios', 'cliente','titulo_modal','id_modal','modal_size', 'text_aceptar', 'no_accept_button'));
	
	}
	
	public function AddService(Request $request){
		
		$mensajes_error = [
							'servicios_clientes.required' => 'Agregue al menos un servicio',
							'servicios_clientes.min' => 'Agregue al menos un servicio'
							];
		$validator = Validator::make($request->all(),[
									'servicios_clientes' => 'required|array|min:1'
									],$mensajes_error);

		if ($validator->fails()) {
			
			return response()->json(array('errores' => $validator->messages()), 500);
			
		}
		
		ServicioCliente::insert($request->servicios_clientes);
		
			return response()->json(array('error'=>0,'mensaje' => 'Se han agregado los servicios! <br> puedes ver los servicios en el detalle del cliente'), 200);
		
	}
	
	public function detalleServicios(Cliente $cliente){
		
		$servicios_clientes = ServicioCliente::where('cliente_id', $cliente->id)->paginate(10);
		
		return view('clientes.detalleservicios', compact('cliente','servicios_clientes'));
		
	}
	
}
