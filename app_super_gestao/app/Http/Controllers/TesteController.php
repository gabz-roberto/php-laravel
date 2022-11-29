<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(int $param1,  int $param2) {
        // echo "A soma de $param1 e $param2 é: ".($param1 + $param2);
        // return view('site.teste', ['param1' => $param1, 'param2' => $param2]); // array associativo
        // A variável está sendo passada para a view como um array, contendo o atributo x
        // Por convenção, os atributos são passados com o mesmo nome das variáveis

        return view('site.teste', compact('param1', 'param2'));
    }
}
