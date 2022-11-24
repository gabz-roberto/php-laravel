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

// Rotas que serão chamadas quando as URL's inseridas forem acessadas

/**
 * FUNCIONAMENTO
 * Route::verboHttp('uri', funcao_callback)
 * 
 * A callback será chamada quando a URI for acessada
 */

// Route::get('/', function () {
//     return 'hello world';
// });

Route::get('/', [\App\Http\Controllers\MainController::class,'principal']);
// Para utilizar um controller, os parâmetros são ('rota', caminho::class,'nomeDaAction')

Route::get('/about', [\App\Http\Controllers\AboutController::class,'sobre']);

Route::get('/contact', [\App\Http\Controllers\ContactController::class,'contato']);
// nome, categoria, assunto, mensagem

// Os params serão enviados em sequência e recebidos na callback na mesma sequência
// Sendo assim, não importa o nome dos parâmetros recebidos na função
Route::get('/contact/{nome}/{categoria}/{assunto}/{mensagem}', function(string $nome, string $categoria, string $assunto, string $mensagem) {
    echo "ROTA: $nome - $categoria - $assunto - $mensagem";
});
/**
 * VERBOS HTTP
 * get
 * post
 * put
 * patch
 * delete
 * options
 */