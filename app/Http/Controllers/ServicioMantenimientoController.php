<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicio;
use App\ServicioMantenimiento;

class ServicioMantenimientoController extends Controller
{
    function index(Request $request){

		if($request->ajax()){

			$result =  ServicioMantenimiento::all();

			return array('data'=>$result);

		}


		return view('mantenimiento.servicio.index');
	}


	function agregar (Request $request){

        try{

            Servicio::create([
                'nombre_servicio'   => $request->nombre_servicio,
                'valor'   			=> $request->valor,
                'cantidad'			=> '1'
                
            ]);
            return array(
                'title' => 'Buen trabajo',
                'text'  => 'Registro Agregado',
                'icon'  => 'success'

            );

        }catch( \Illuminate\Database\QueryException $e){

            return array(
                'title' => 'Error',
                'text' => (env('APP_DEBUG')==true) ? $e->getCode() : $e->getMessage(),
                'icon'=> 'error',
                'timer'=> 30000

            );

        }        
    }

     function actualizar (Request $request){

        try{
            servicio::where('id', $request->id)
            ->update([
                'nombre_servicio'=>$request->nombre_servicio,
                'valor'=>$request->valor
            ]);

            return array(
                'title' => 'Buen trabajo',
                'text'  => 'Registro Actualizado',
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


    function consultar(Request $request){

         try{

            $result = servicio::where('id', $request->id)
            ->first();

            return $result;

        }catch(\Illuminate\Database\QueryException $e){

            return array(
                'title' => 'Error',
                'text' => (env('APP_DEBUG')==true) ? $e->getCode() : $e->getMessage(),
                'icon'=> 'error',
                'timer'=> 10000
            );
        } 

    }

     function eliminar (Request $request){

        try{

            Servicio::where('id', $request->id)
                ->delete();

            return array(

                'title' => 'Buen trabajo',
                'text' => 'Registro Eliminado',
                'icon'=> 'success',
                'timer'=> 3000

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
