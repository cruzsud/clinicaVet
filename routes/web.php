<?php
use Illuminate\Support\Facades\Input; 
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

//REMOVER
Route::get('/animal/remove/{id_animal}','AnimalController@remover')->name('animal.remove');
Route::get('/cliente/remove/{id_cliente}','ClienteController@remover')->name('cliente.remove');
Route::get('/tipo_animal/remove/{id_tipo_animal}','Tipo_AnimalController@remover')->name('tipo_animal.remove');
Route::get('/consulta/remove/{id_consulta}','ConsultaController@remover')->name('consulta.remove');
Route::get('/vacina/remove/{id_vacina}','VacinaController@remover')->name('vacina.remove');
// CONTROLLER
Route::resource('animal','AnimalController');
Route::resource('cliente','ClienteController');
Route::resource('tipo_animal','Tipo_AnimalController');
Route::resource('vacina','VacinaController');
Route::resource('consulta','ConsultaController');
// AJAX
Route::get('/',function()
{
    return view('create.blade');
});


Route::get('create/{id}', 'ConsultaController@getAnimal');




