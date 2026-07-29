<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Principal extends Controller
{
    function principal(){
        return view('principal');
    }

    function sobre(){
        return view('sobre');
    }

    function produtos(){
        return view('produtos');
    }

    function contato(){
        return view('contato');
    }
}


