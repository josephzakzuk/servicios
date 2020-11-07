<?php

namespace App\Http\Controllers;
use App\Servicio;
use App\TipoServicio;
use Validator;
use Storage;
use File;

use Illuminate\Http\Request;

class ServiciosController extends Controller
{
     public function index(){
		 
		$servicios = Servicio::paginate(5);
		
		return view('servicios.index',compact('servicios'));
		
	}
	
	public function create(){
		$tipo_servicios = TipoServicio::all();
		$titulo_modal = 'Crear servicio nuevo';
		$id_modal = "modal_crear_servicio";
		$modal_size = 'lg';
		$text_aceptar = 'Guardar servicio';
		$no_accept_button = true;
		return view('servicios.form',compact('tipo_servicios', 'titulo_modal','id_modal','modal_size', 'text_aceptar', 'no_accept_button'));
	}
	
	public function edit(Servicio $servicio){
		$tipo_servicios = TipoServicio::all();
		$titulo_modal = 'Editando el servicio: '.$servicio->nombre;
		$id_modal = "modal_editar_servicio";
		$modal_size = 'lg';
		$text_aceptar = 'Guardar servicio';
		$no_accept_button = true;
		
		return view('servicios.form',compact('tipo_servicios','servicio','titulo_modal','id_modal','modal_size', 'text_aceptar', 'no_accept_button'));
	}
	
	public function store(Request $request){
		
		$mensajes_error = [
							'nombre.required' => 'Por favor ingresa el nombre dle servicio'
							];
		$validator = Validator::make($request->all(),[
									'nombre' => 'required'
									],$mensajes_error);

		if ($validator->fails()) {
			
			return response()->json(array('errores' => $validator->messages()), 500);
			
		}else{
			
			$datos = $request->all();
			
			if(!empty($request->id)){
				$servicio = Servicio::find($request->id);
				unset($datos['imagen']);
				$servicio->update($datos);
			}else{
				$datos['imagen'] = '';
				$servicio = Servicio::create($datos);
			}
			
			if($request->hasFile('imagen')){
			
				$path = Storage::disk('fotos')->path('servicios');
				
				$file = $request->file('imagen');
				
				$original_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
				$new_name = 'cliente_'.$servicio->id;
				$extension = $file->extension();
						
				Storage::disk('fotos')->put('servicios/'.$new_name.'.'.$extension,  File::get($file));
				
				$servicio->imagen = $new_name.'.'.$extension;
				$servicio->save();
				
		}
			
			return response()->json(array('mensaje' => 'El servicio ha sido guardado'), 200);
			
		}
		
	}
	
	public function destroy(Request $request){
		$servicio = Servicio::find($request->servicio);
		if($servicio->serviciosClientes->count() > 0){
				return response()->json(array('error'=>1,'mensaje' => 'El servicio tiene clientes asociados!'), 200);
		}else{
			$servicio->delete();
			return response()->json(array('error'=>0,'mensaje' => 'El servicio ha sido eliminado!'), 200);
		}
	}
	
}
