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
	Route::post('roles/store','RoleController@store')->name('roles.store');

	Route::get('roles','RoleController@index')->name('roles.index')
		->middleware('permission:roles.index');

	Route::get('roles/create','RoleController@create')->name('roles.create');

	Route::put('roles/{role}','RoleController@update')->name('roles.update');

	Route::get('roles/{role}','RoleController@show')->name('roles.show');

	Route::delete('roles/{role}','RoleController@destroy')->name('roles.destroy');

	Route::get('roles/{role}/edit','RoleController@edit')->name('roles.edit');

//users
	Route::get('users','UserController@index')->name('users.index')
		->middleware('permission:users.index');

	Route::put('users/{user}','UserController@update')->name('users.update');

	Route::get('users/{user}','UserController@show')->name('users.show');

	Route::delete('users/{user}','UserController@destroy')->name('users.destroy');

	Route::get('users/{user}/edit','UserController@edit')->name('users.edit');

	//Paises y estados
	Route::get('countries', 'CountryController@index')->name('countries.index')
	->middleware('permission:countries.index');

	Route::get('getdata/countries', 'CountryController@getData')->name('getdata.countries');
	Route::post('postdata/countries', 'CountryController@postData')->name('postdata.countries');
	Route::get('fetchdata/countries', 'CountryController@fetchData')->name('fetchdata.countries');
	Route::get('deletedate/countries', 'CountryController@deleteData')->name('deletedata.countries');
	//departamentos
	Route::get('fetchdataforstate/state', 'CountryController@fetchDataForState')->name('fetchdataforstate.state');
	Route::post('postdataforstate/state', 'CountryController@postDataForState')->name('postdataforstate.state');

	//listasDependientes
	Route::get('/departaments', 'ClientController@getDepartaments');
	Route::get('/country', 'ClientController@getCountry');

	//clientes
	Route::get('clients', 'ClientController@index')->name('clients.index')
	->middleware('permission:clients.index');
	Route::get('clients/getdata', 'ClientController@getData')->name('clients.getdata');
	Route::post('clients/postdata', 'ClientController@postData')->name('clients.postdata');
	Route::get('clients/fetchdata', 'ClientController@fetchData')->name('clients.fetchdata');
	Route::get('clients/deletedata', 'ClientController@deleteData')->name('clients.deletedata');
	//observacions
	Route::get('clients/fetchdataforobs', 'ClientController@fetchDataForObservation')->name('clients.fetchdataforobs');
	Route::post('clients/postdataforobs', 'ClientController@postDataForObservation')->name('clients.postdataforobs');

	//habitaciones
	Route::get('rooms', 'RoomController@index')->name('rooms.index')
	->middleware('permission:rooms.index');
	Route::get('rooms/getdata', 'RoomController@getData')->name('rooms.getdata');
	Route::post('rooms/postdata', 'RoomController@postData')->name('rooms.postdata');
	Route::get('rooms/fetchdata', 'RoomController@fetchData')->name('rooms.fetchdata');
	Route::get('rooms/deletedata', 'RoomController@deleteData')->name('rooms.deletedata');

	//categorias
	Route::post('categories/postdata', 'CategoryController@postData')->name('categories.postdata');

	//asignaciones
	Route::get('roomslist', 'AsignationController@indexPB')->name('asignations.index')
	->middleware('permission:asignations.index');
	Route::get('roomslist1', 'AsignationController@index1')->name('asignations.index1');
	Route::get('roomslist2', 'AsignationController@index2')->name('asignations.index2');
	Route::get('roomslist3', 'AsignationController@index3')->name('asignations.index3');
	Route::post('asignations/postdata', 'AsignationController@postData')->name('asignations.postdata');
	//ocuped
	Route::get('asignations/ocuped', 'AsignationController@ocuped')->name('asignations.ocuped');
	Route::post('asignations/postdataocuped', 'AsignationController@postDataOcuped')->name('asignations.postdataocuped');
	//autocomplete
	Route::get('Client/findClient', 'AsignationController@findClient');
	//Acciones
	Route::get('rooms/maintenance', 'ActionController@maintenance')->name('rooms.maintenance');
	Route::get('rooms/finishMaint', 'ActionController@finishMaint')->name('rooms.finishMaint');
	Route::get('rooms/limpiando', 'ActionController@limpiando')->name('rooms.limpiando');

	//listas de huespedes
	Route::get('asignations/indexH', 'AsignationController@indexH')->name('asignations.indexH')
	->middleware('permission:asignations.indexH');

	//pdf
	Route::get('asignations/pdf','AsignationController@pdf')->name('asignations.pdf');


});