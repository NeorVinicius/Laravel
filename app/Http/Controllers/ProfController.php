<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfController extends Controller
{
    function index(){ 
        return view('prof.index');
    }

    function add(Request $dados) { 
        $professor = new \App\Models\ProfModel();
        $professor::create($dados->all());
    
    //RECUPERANDO TODOS ALUNOS DO BANCO E ENVIANDO PARA A VIEW
				
    $professores = new \App\Models\ProfModel();

    return view('prof.index', ['success'=>'Cadastrado!', 'professores'=>$professores::all()]);

    }
}