<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    // Os métodos dentro de um controller são chamados de actions
    // As actions serão responsáveis pela renderização das views, que irão renderizar o conteúdo HTML relacionado
    public function principal() {
        return view('site.main');
    }
    // O próprio framework irá utilizar como raiz a pasta views, sendo somente necessário informar os subdiretórios e com a notação ponto especificar o nome da view
}
