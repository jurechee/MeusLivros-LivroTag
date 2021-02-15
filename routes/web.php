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

// Route::get('/', function () {
//     return view('livros');
// });

Route::middleware('auth')->group(function()
{
    Route::get('/', 'LivroController@index')->name('livros.index');
    
});
Route::get('/livros/create', 'LivroController@create');
Route::post('/livros', 'LivroController@store');
Route::get('/livros/{livro}', 'LivroController@show');
Route::get('/livros/{livro}/edit', 'LivroController@edit');
Route::put('/livros/{livro}', 'LivroController@update');
Route::delete('livros/{livro}', 'LivroController@destroy')->name('livros.delete');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

