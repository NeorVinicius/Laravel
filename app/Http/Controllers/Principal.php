<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Principal extends Controller
{
    function principal(){
        echo 'Página Principal';
    }

    function somar(int $p1, int $p2){
        // echo "A soma entre $p1 e $p2 é " . ($p1+$p2);
        return view('somar', [ "p1" => $p1, "p2" => $p2 ]);
    }

    function subtrair(int $p1, int $p2){
        // echo "A soma entre $p1 e $p2 é " . ($p1+$p2);
        return view('subtrair', [ "p1" => $p1, "p2" => $p2 ]);
    }

    function multiplicar(int $p1, int $p2){
        // echo "A soma entre $p1 e $p2 é " . ($p1+$p2);
        return view('multiplicar', [ "p1" => $p1, "p2" => $p2 ]);
    }

    function dividir(int $p1, int $p2){
        // echo "A soma entre $p1 e $p2 é " . ($p1+$p2);
        return view('dividir', [ "p1" => $p1, "p2" => $p2 ]);
    }
}


