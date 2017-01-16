<?php
	use Notebook\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::group(['middleware'=>'auth'], function() {

	Route::get('/', function () {
	    return view('frontpage');
	// 	//return view('welcome');
	 });

	// Route::get('/notebooks', ['as'=>'notebooks.index', 'uses'=>'NotebooksController@index']);

	// //Route::post('/notebooks', 'NotebooksController@store');
	// Route::get('/notebooks/show/{notebooks}', ['uses' => 'NotebooksController@show','as' => 'notebooks.show']);
	// Route::get('/notebooks/{notebooks}', 'NotebooksController@create');
	// Route::get('/notebooks/edit/{notebooks}', ['as'=>'notebooks.edit', 'uses'=>'NotebooksController@edit']);
	// Route::put('/notebooks/edit/{notebooks}', ['as'=>'notebooks.update', 'uses'=>'NotebooksController@update']);
	// Route::delete('/notebooks/{notebooks}', 'NotebooksController@destroy');	
	// Route::post('/notebooks', [
 //        'uses' => 'NotebooksController@store',
 //        'as' => 'notebooks.store'
 //    ]);
	Route::resource('notebooks', 'NotebooksController');
	Route::resource('notes', 'NotesController');
	Route::get('/notes/{notebooksId}/createNote', 'NotesController@createNote')->name('notes.createNote');


});
	 Auth::routes();
	// Route::get('/home', 'HomeController@index');
 
