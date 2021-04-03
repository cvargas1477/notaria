<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicio;
use App\ServicioRegistro;
use App\ServicioRegistroVentaCabecera;

class ServicioController extends Controller
{
    public function index(Request $request)
	{
		$user = auth()-> user();
		
		//$this->authorize('Servicio', $user);
		
		
			
			
			if($request->ajax()){			
				
				$result =  Servicio::all();

				return array('data'=>$result);		

			}
		


		
		return view('servicio.index');

	}

	public function envio(Request $request)
	{

		$items = $request->items;

		$result  = Servicio::whereIn('id',$items)->get();		

		return $result;

	}

	public function registro(Request $request)

	{ 
		$id_usuario 	= $request->id_usuario;
		$ano 			= 2021; 

		
		
		//obtener el ultimo numero_orden de VentaCabecera
		//$result = ServicioRegistroVentaCabecera::all();
		$result = ServicioRegistroVentaCabecera::where('ano',$ano)->get();
		$numero 		= $result->last();
		
		//si no existe ningun registro, se asigna 0, para comenzar con 1
		if( $numero == NULL ){
			$numero['numero'] = 0;
		}

		$numero 		= $numero['numero']+ 1;		
		
		$numero_orden 	= $numero.'-'.$ano;
		$fecha_venta 	= now();
		

		
		//Inicio el ingerso a BD ventascabecera
		ServicioRegistroVentaCabecera::create([
				
				//ingresar los campos a la BD
				'numero'		=>$numero,
				'ano'			=>$ano,				
				'numero_orden'	=>$numero_orden,
				'id_usuario'	=>$id_usuario,
				'rut_venta'		=>$request->rut_venta,
				'fecha_venta'	=>$fecha_venta,				
				'estado'		=>'PENDIENTE'
			
			]);	

		//Ingreso datos a venta		
		foreach ($request->id as $key => $id_servicio) {			

					
			
			$valor  		=  $request->valor[$key];
			$cantidad  		=  $request->cantidad[$key];
			$numero_orden 	= 	$numero_orden;
			

			ServicioRegistro::create([
				
				//ingresar los campos a la BD
						
				'rut_venta'		=>$request->rut_venta,
				'numero_orden'	=>$numero_orden,
				'id_servicio'	=>$id_servicio,
				'valor'			=>$valor,				
				'cantidad'	 	=>$cantidad,
				'total'			=>$valor * $cantidad,
				
			
			]);

		}


		return array(

			'title' => 'Buen Trabajo',
			'text'  => 'Servicio Agregado',			
			'icon'  =>  'success',
			'numero_orden' => 'N° Orden '.$numero_orden
		);
		
		//fin ingreso datos ventas

	}
}
