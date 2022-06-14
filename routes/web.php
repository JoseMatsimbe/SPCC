<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\DescricaoController;
use App\Http\Controllers\CapituloController;
use App\Http\Controllers\ProjectoController;

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



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('itens', ItemController::class);
Route::resource('descricoes', DescricaoController::class);
Route::resource('capitulos', CapituloController::class);
Route::resource('projectos', ProjectoController::class);

Route::get('getDescricao/{codigo_item}', function ($id) {
    $descricao = App\Models\Descricao::where('codigo_item',$id)->get();
    return response()->json($descricao);
});

Route::get('getItem/{codigo}', function ($id) {
    $item = App\Models\Item::where('codigo',$id)->get();
    return response()->json($item);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
