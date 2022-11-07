<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    // Os métodos dentro de um controller são chamados de actions
    public function principal() {
        echo 'Início';
    }
}
