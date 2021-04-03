<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\reporte;
use App\ServicioRegistro;

class ReporteController extends Controller
{
    public function index(Request $request)
	{

		

		if($request->ajax()){
			

			$result =  reporte::
			join('ventas', 'ventascabecera.numero_orden', '=', 'ventas.numero_orden')
			->groupBy('ventascabecera.numero_orden')
			->select(	
						'ventascabecera.*',						
						ServicioRegistro::raw('sum(ventas.total) as total')
							)
																		
			->where('ventascabecera.estado', '=', 'PAGADO')											
			->get();

			return array('data'=>$result);

		}
		
		return view('reportes.index');

	}

	public function bfecha (Request $request)
	{
		//dd($request);
		
		if($request->ajax()){	

		$finicio = $request->fecha_ini;
		$ffin = $request->fecha_fin;

		$result =  reporte::
			join('ventas', 'ventascabecera.numero_orden', '=', 'ventas.numero_orden')
			->groupBy('ventascabecera.numero_orden')
			->select(	
						'ventascabecera.numero_orden',
						'ventascabecera.rut_venta',
						'ventascabecera.fecha_pago',						
						ServicioRegistro::raw('sum(ventas.total) as total')
							)

														
			->whereDate('ventascabecera.fecha_pago', '>=', $finicio) 
			->whereDate('ventascabecera.fecha_pago', '<=', $ffin)
			
															
			->get();


			return array('data'=>$result);

		}

		return view('reportes.index');



	}









}
