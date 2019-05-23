<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'TopicController@index')->name('home');



//Route ressource du controller TopicController sans la route index
Route::resource('topics', 'TopicController')->except([
    'index'
]);

Route::post('/commentaire', 'TopicController@commentaire')->name('commentaire');

Route::get('/search', 'TopicController@search')->name('recherche');


Auth::routes();
