<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuarioMantenimiento;
use App\Roles;
use App\ModelHasRole;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;
use App\User;
use Spatie\Permission\Traits\RefreshesPermissionCache;



class UsuarioMantenimientoController extends Controller
{


    
	protected function validator(Request $request)
    {
        return Validator::make($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    
    
     function index(Request $request){

		if($request->ajax()){ 

        $result =  UsuarioMantenimiento::
				join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
			     ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
			     ->select(	
						'users.id',
						'users.name',
						'users.name',
						'users.email',
						'users.enabled',
						'roles.name as roles'
							)																
													
			     ->get();


			return array('data'=>$result);

		}


		return view('mantenimiento.usuario.index');
	}

    function agregar (Request $request){


        try{

            $user = UsuarioMantenimiento::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),                
                'enabled' => true,
                
            ]);

            


            $user->assignRole($request['role']);

           
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
            $user = UsuarioMantenimiento::where('id', $request->id)
            ->update([
            	'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'enabled' => $request->enabled
                
            ]);

            
             //$user->assignRole($request->input('roles'));

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

            $result = UsuarioMantenimiento::where('id', $request->id)
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

            UsuarioMantenimiento::where('id', $request->id)
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


