<?php
//use Symfony\Component\Routing\Route;
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


//Route::resource('usuarios', 'UsersController');
//Route::resource('roles', 'RolesController');
//Route::resource('rooms','RoomController');

Route::middleware(['auth'])->group(function(){

//roles
	Route::post('roles/store','RoleController@store')->name('roles.store')
		->middleware('permission:roles.create');

	Route::get('roles','RoleController@index')->name('roles.index')
		->middleware('permission:roles.index');

	Route::get('roles/create','RoleController@create')->name('roles.create')
		->middleware('permission:roles.create');

	Route::put('roles/{role}','RoleController@update')->name('roles.update')
		->middleware('permission:roles.edit');

	Route::get('roles/{role}','RoleController@show')->name('roles.show')
		->middleware('permission:roles.show');

	Route::delete('roles/{role}','RoleController@destroy')->name('roles.destroy')
		->middleware('permission:roles.destroy');

	Route::get('roles/{role}/edit','RoleController@edit')->name('roles.edit')
		->middleware('permission:roles.edit');

//users
	Route::get('users','UserController@index')->name('users.index')
		->middleware('permission:users.index');

	Route::put('users/{user}','UserController@update')->name('users.update')
		->middleware('permission:users.edit');

	Route::get('users/{user}','UserController@show')->name('users.show')
		->middleware('permission:users.show');

	Route::delete('users/{user}','UserController@destroy')->name('users.destroy')
		->middleware('permission:users.destroy');

	Route::get('users/{user}/edit','UserController@edit')->name('users.edit')
		->middleware('permission:users.edit');

	//Paises y estados
	Route::get('countries', 'CountryController@index')->name('countries.index');
	Route::get('getdata/countries', 'CountryController@getData')->name('getdata.countries');
	Route::post('postdata/countries', 'CountryController@postData')->name('postdata.countries');
	Route::get('fetchdata/countries', 'CountryController@fetchData')->name('fetchdata.countries');
	//departamentos
	Route::get('fetchdataforstate/state', 'CountryController@fetchDataForState')->name('fetchdataforstate.state');
	Route::post('postdataforstate/state', 'CountryController@postDataForState')->name('postdataforstate.state');

	//listasDependientes
	Route::get('/departaments', 'ClientController@getDepartaments');
	Route::get('/country', 'ClientController@getCountry');

	//clientes
	Route::get('clients', 'ClientController@index')->name('clients.index');
	Route::get('clients/getdata', 'ClientController@getData')->name('clients.getdata');
	Route::post('clients/postdata', 'ClientController@postData')->name('clients.postdata');
	Route::get('clients/fetchdata', 'ClientController@fetchData')->name('clients.fetchdata');
	Route::get('clients/deletedata', 'ClientController@deleteData')->name('clients.deletedata');
	//observacions
	Route::get('clients/fetchdataforobs', 'ClientController@fetchDataForObservation')->name('clients.fetchdataforobs');
	Route::post('clients/postdataforobs', 'ClientController@postDataForObservation')->name('clients.postdataforobs');

	//habitaciones
	Route::get('rooms', 'RoomController@index')->name('rooms.index');
	Route::get('rooms/getdata', 'RoomController@getData')->name('rooms.getdata');
	Route::post('rooms/postdata', 'RoomController@postData')->name('rooms.postdata');

	//categorias
	Route::post('categories/postdata', 'CategoryController@postData')->name('categories.postdata');

	//asignaciones
	Route::get('roomslist', 'AsignationController@indexPB')->name('asignations.index');
	Route::get('roomslist1', 'AsignationController@index1')->name('asignations.index1');
	Route::get('roomslist2', 'AsignationController@index2')->name('asignations.index2');
	Route::get('roomslist3', 'AsignationController@index3')->name('asignations.index3');
	Route::post('asignations/postdata', 'AsignationController@postData')->name('asignations.postdata');
	//autocomplete
	Route::get('Client/findClient', 'AsignationController@findClient');
	//Acciones
	Route::get('rooms/maintenance', 'ActionController@maintenance')->name('rooms.maintenance');
});