<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::middleware(['auth'])->group(function(){
	Route::get('empleado','EmpleadoController@index')->name('empleado.index');
	Route::get('empleado','EmpleadoController@index')->name('empleado.index');
	Route::post('empleado/envio','EmpleadoController@envio')->name('empleado.envio');
	Route::post('empleado/registro','EmpleadoController@registro')->name('empleado.registro');

	Route::middleware(['permission:create service'])->group(function(){
		//rutas en pagina de servicio, que es donde se van a grabar los pedidos	
		Route::get('servicio','ServicioController@index')->name('servicio.index');
		Route::post('servicio/envio','ServicioController@envio')->name('servicio.envio');
		Route::post('servicio/registro','ServicioController@registro')->name('servicio.registro');
	
	});

	Route::middleware(['permission:pay service'])->group(function(){ 
		//rutas de pago de servicios
		Route::get('pago','PagoController@index')->name('pagos.index');
		Route::post('pago/pago','PagoController@pago')->name('pago.pago');
		Route::put('pago/finalizarpago','PagoController@finalizarpago')->name('pago.finalizarpago');
		Route::put('pago/cancelarpago','PagoController@cancelarpago')->name('pago.cancelarpago');

	});

	Route::middleware(['permission:report'])->group(function(){ 
		//rutas reportes
		Route::get('reporte','ReporteController@index')->name('reporte.index');
		Route::get('reporte/bfecha', 'ReporteController@bfecha')->name('reporte.busqueda');

	});


	Route::middleware(['permission:edit service'])->group(function(){ 
		//rutas de mantenimiento
		route::prefix('mantenimiento')->group(function(){
			
			//Servicio
			Route::get('servicio_mantenimiento','ServicioMantenimientoController@index')->name('servicio_mantenimiento.index');		
			Route::post('servicio/agregar', 'ServicioMantenimientoController@agregar')->name('servicio_mantenimiento.agregar');		
			route::put('servicio/actualizar', 'ServicioMantenimientoController@actualizar')->name('servicio_mantenimiento.actualizar');		
			route::delete('servicio/eliminar', 'ServicioMantenimientoController@eliminar')->name('servicio_mantenimiento.eliminar');		
			route::get('servicio/consultar', 'ServicioMantenimientoController@consultar')->name('servicio_mantenimiento.consultar');

			//Usuario
			Route::get('usuario_mantenimiento','UsuarioMantenimientoController@index')->name('usuario_mantenimiento.index');
			Route::post('usuario/agregar', 'UsuarioMantenimientoController@agregar')->name('usuario_mantenimiento.agregar');	
			route::put('usuario/actualizar', 'UsuarioMantenimientoController@actualizar')->name('usuario_mantenimiento.actualizar');
			route::get('usuario/consultar', 'UsuarioMantenimientoController@consultar')->name('usuario_mantenimiento.consultar');
			route::delete('usuario/eliminar', 'UsuarioMantenimientoController@eliminar')->name('usuario_mantenimiento.eliminar');


	
		});


	});





});


















