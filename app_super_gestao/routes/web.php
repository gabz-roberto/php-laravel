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

Route::get('/', [\App\Http\Controllers\MainController::class,'principal'])->name('site.index');
// Para utilizar um controller, os parâmetros são ('rota', caminho::class,'nomeDaAction')

Route::get('/about', [\App\Http\Controllers\AboutController::class,'sobre'])->name('site.sobrenos');
// A função ->name('') especifica um alias para a rota, fazendo que não tenha uma dependência direta da url

Route::get('/contact', [\App\Http\Controllers\ContactController::class,'contato'])->name('site.contato');
Route::get('/login', function() { return 'Login'; })->name('site.login');

// Agrupando as rotas e utilizano um prefixo, dessa forma, as rotas serão acessadas através de /app/nomeDaRota
Route::prefix('/app')->group(function() {
    Route::get('/clients', function() { return 'Clients'; })->name('app.clientes');
    Route::get('/suppliers', function() { return 'Fornecedores'; })->name('app.fornecedores');
    Route::get('/products', function() { return 'Produtos'; })->name('app.produtos');
});


Route::get('/teste/{p1}/{p2}', [\App\Http\Controllers\TesteController::class,'teste'])->name('teste');


// Criando uma rota fallback para URL's não mapeada
Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui para ir para a página inicial.</a>';
});

// Route::get("/rota1", function() { echo 'Rota 1'; })->name('site.rota1');

// Redirencionamento direto pela função
// redirect()->route('nomeDaRotaDestino');
// Route::get("/rota2", function() { 
//     return redirect()->route('site.rota1');
//  })->name('site.rota2');

// Redirecionamento de rotas -> redirencionando para outra rota
// Route::redirect('/rota2', '/rota1');
// Route::redirect('/rotaDeOrigem', '/rotaDeDestino');

// // Os params serão enviados em sequência e recebidos na callback na mesma sequência
// // Sendo assim, não importa o nome dos parâmetros recebidos na função
// /**                                                              Params opcionais terminam com ?
//  * Route::get(/nomeDaRota/{paramObrigatorio}/{paramObrigatorio}/{paramOpcional?}/{paramOpcional?})
//  * Na callback, são definidos parâmetros padrão par os argumentos opcionais
//  * 
//  * Parâmetros opcionais são passados da direita pra esquerda, para evitar erros de falta de argumentos
//  */
// Route::get('/contact/{nome}/{categoria_id}', function(string $nome, int $categoria_id = 1) {
//     echo "ROTA: $nome - $categoria_id";
// })->where('categoria_id','[0-9]+')->where('nome', '[A-Za-z]+'); 
// // Utilizando uma regex para aceitar somente números no param de nome categoria_id
// // Da mesma forma, no param nome, que aceita somente caracteres de 'A' a 'Z' ou 'a' a 'z'
// /**
//  * VERBOS HTTP
//  * get
//  * post
//  * put
//  * patch
//  * delete
//  * options
//  */