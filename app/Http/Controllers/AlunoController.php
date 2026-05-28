<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlunoController extends Controller
{
    function index(){ 
        return view('aluno.index');
    }

    function add(Request $dados) { 
        $aluno = new \App\Models\AlunoModel();
        $aluno::create($dados->all());
    
    //RECUPERANDO TODOS ALUNOS DO BANCO E ENVIANDO PARA A VIEW
				
    $alunos = new \App\Models\AlunoModel();

    return view('aluno.index', ['success'=>'Cadastrado!', 'alunos'=>$alunos::all()]);

    }

    function remove(string $id) {
        $aluno = new \App\Models\AlunoModel();
        $aluno::destroy($id);

        return view('aluno.index', ['success'=>'Removido!', 'alunos'=>$aluno::all()]);

    }

    function atualizar(string $id) {
        $aluno = new \App\Models\AlunoModel();
        $aluno = $aluno::find($id);

        return view('aluno.atualizar', ['aluno'=>$aluno]);
    }

    function save(Request $dados) {
        $aluno = new \App\Models\AlunoModel();
        $aluno = $aluno::find($dados->id);
        $aluno->update($dados->all());

        return view('aluno.index', ['success'=>'Atualizado!', 'alunos'=>$aluno::all()]);
    }

}