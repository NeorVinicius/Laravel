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

    function remove(string $id) {
        $professor = new \App\Models\ProfModel();
        $professor::destroy($id);

        return view('prof.index', ['success'=>'Removido!', 'professores'=>$professor::all()]);

    }

    function atualizar(string $id) {
        $professor = new \App\Models\ProfModel();
        $professor = $professor::find($id);

        return view('professor.atualizar', ['professor'=>$professor]);
    }
}