<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Sobre extends Controller
{
    function sobre(){
        return view ('pagina-sobre');
    }

}

?>