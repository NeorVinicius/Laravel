<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Aluno extends Controller
{
    function login(){
        echo 'Aluno se conectou!';
    }

    function boletim(){
        echo 'Notas';
    }

    function presenca(){
        echo 'Faltas';
    }

    function desenpenho(){
        echo 'Notas da avaliações';
    }
}


