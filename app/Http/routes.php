<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return redirect('/login');
});

Route::auth();

Route::group(['middleware' => 'auth'], function() 
{

	Route::get('/home', 'HomeController@index');

	Route::resource('/principal', 'PrincipalController');
	Route::get('/showEvent/{id}', 'PrincipalController@show');
	Route::get('/listEvent', 'PrincipalController@listEvent');
	Route::get('/reportEvent', 'PrincipalController@showReport');
	Route::POST('/pdfActivity', 'PrincipalController@pdfActivity');
	Route::resource('/tipoevento', 'TipoeventoController');
	Route::resource('/user', 'UsuarioController');
	Route::resource('/cargo', 'CargoController');
	Route::resource('/area', 'AreaController');
	Route::resource('/empleado', 'EmpleadoController');
	Route::get('/sueldo/{id}', 'EmpleadoController@sueldo');
	Route::get('/imageChangeEmpleado/{id}', 'EmpleadoController@changeImage');
	Route::put('/imageUpdateEmpleado/{id}', 'EmpleadoController@updateImage');
	Route::resource('/empresa', 'EmpresaController');
	Route::get('/imageChangeEmpresa/{id}', 'EmpresaController@changeImage');
	Route::put('/imageUpdateEmpresa/{id}', 'EmpresaController@updateImage');
	Route::resource('/asignar', 'AsignarController');
	Route::resource('/pagoZaire', 'PagozaireController');
	Route::resource('/pagoZabim', 'PagozabimController');
	Route::resource('/pagoBorder', 'PagoborderController');
	Route::get('/boletazr/{idPago}', 'PagozaireController@boletaPago');
	Route::get('/boletazb/{idPago}', 'PagozabimController@boletaPago');
	Route::get('/boletabr/{idPago}', 'PagoborderController@boletaPago');

	Route::resource('/planillaZaire', 'PlanillazaireController');
	Route::resource('/planillaZabim', 'PlanillazabimController');
	Route::resource('/planillaBorder', 'PlanillaborderController');

	//aguinaldos
	Route::resource('/aguinaldoZaire', 'AguinaldoZaireController');
	Route::resource('/aguinaldoZabim', 'AguinaldoZabimController');
	Route::resource('/aguinaldoBorder', 'AguinaldoBorderController');
	Route::get('/bpZaire/{idaguinaldo}', 'AguinaldoZaireController@boletaAguinaldo');
	Route::get('/bpZabim/{idaguinaldo}', 'AguinaldoZabimController@boletaAguinaldo');
	Route::get('/bpBorder/{idaguinaldo}', 'AguinaldoBorderController@boletaAguinaldo');
	Route::resource('/paZaire', 'PAZaireController');
	Route::resource('/paZabim', 'PAZabimController');
	Route::resource('/paBorder', 'PABorderController');
	//end aguinaldos

	Route::resource('/movimiento','MovimientoController');
	Route::resource('/localizacion','LocalizacionController');
	Route::resource('/barco','BarcoController');
	Route::resource('/rastreo','RastreoController');
});