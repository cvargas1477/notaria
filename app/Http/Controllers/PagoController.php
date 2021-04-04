<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pago;
use App\ServicioRegistro;
use App\FinalizarPago;

class PagoController extends Controller
{

	public function index(Request $request)
	{
		if($request->ajax()){

			
			//$result =  Pago::where('estado', 'PENDIENTE')->get();
			
			$result =  Pago::
			join('ventas', 'ventascabecera.numero_orden', '=', 'ventas.numero_orden')
			->groupBy('ventascabecera.numero_orden')
			->select(	
						'ventascabecera.*',						
						ServicioRegistro::raw('sum(ventas.total) as total')
							)												
			->where('ventascabecera.estado', '=', 'PENDIENTE')											
			->get();
			
			
			

			//return $result;
			return array('data'=>$result);
		}



   		return view('pagos.index');
   	}



   	public function pago(Request $request)
	{
		if($request->ajax()){			
			
			$items = $request->items;

						
			//consulta para traer los datos de los numeros de ordenes seleccionados
			
			$result = ServicioRegistro::
			    join('ventascabecera', 'ventas.numero_orden', '=', 'ventascabecera.numero_orden')
			    ->join('servicios', 'servicios.id', '=', 'ventas.id_servicio')	      
			    ->select(	'ventas.numero_orden', 
			    			'ventas.rut_venta', 
			    			'servicios.nombre_servicio',
			    			'ventas.valor', 
			    			'ventas.cantidad',
			    			'ventas.total')
			    ->whereIn('ventas.numero_orden', $items)
			    ->get();
			    

			//grabar en la tabla de finalizarpago el numero de orden seleccionado y el id_usuario, para luego usarlo como referencia del pago
			    
			$id_usuario = $request->id_usuario;

			foreach ($request->items as $numero_orden) {
			    
				FinalizarPago::create([
				
				//ingresar los campos a la BD
				'id_usuario'	=>$id_usuario,						
				'numero_orden'	=>$numero_orden	
				
			
				]);	
			}  
										
			
			return $result;
			//return array('data'=>$result); 
		}


   		return view('pagos.index');
   	}


   	




 public function finalizarpago(Request $request)
 	{

 		if($request->ajax()){

 		$id_usuario = $request['id_usuario'];	
		
		
		try{

				
				//buscar en BD todos los registros guardados hace unos minutos por el mismo usuario
				$pagofinal = finalizarpago::where('id_usuario', $id_usuario)->get();

				

								           	
				//actualizar BD a estado PAGADO de los registros seleccionados
				foreach ($pagofinal as $numero_orden) {

					$fecha_pago = now();

					pago::where('numero_orden', $numero_orden->numero_orden)
	            	->update([
	                	'estado'=>'PAGADO',
	                	'fecha_pago' => $fecha_pago
	                
	            	]);


				}

				
	            
	            //eliminar los registros de la BD que se uso para el pago, esta BD es temporal, y se llena con los datos que se van a pagar en el momento	
				foreach ($pagofinal as $numero_orden_delete) {
	            	
	            	finalizarpago::where('numero_orden', $numero_orden_delete->numero_orden)->delete();
	            	

	        	}
	        	

	            return array(
	                'title' => 'Gracias',
	                'text'  => 'Pago Realizado',
	                'icon'  => 'success'

	            );

        } catch(\Illuminate\Database\QueryException $e){
            return array(
                'title' => 'Error',
                'text' => (env('APP_DEBUG')==true) ? $e->getCode() : $e->getMessage(),
                'icon'=> 'error',
                'timer'=> 10000

            );          
        }
        

	}

}	
	
 public function cancelarpago(Request $request)
 	{
 		$id_usuario = $request['id_usuario'];

 		//buscar en BD todos los registros guardados hace unos minutos por el mismo usuario
		$pagofinal = finalizarpago::where('id_usuario', $id_usuario)->get();

 		 //eliminar los registros de la BD que se uso para el pago, esta BD es temporal, y se llena con los datos que se van a pagar en el momento	
		foreach ($pagofinal as $numero_orden_delete) {
	            	
	            	finalizarpago::where('numero_orden', $numero_orden_delete->numero_orden)->delete();
	            	

	        	}


 	}	
	
		




   		
}
