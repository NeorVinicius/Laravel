<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlunoController extends Controller
{

    function index(){ 
        $aluno = new \App\Models\AlunoModel();
        return view('aluno.index', ['alunos'=>$aluno::all()]);
    }

    function add(Request $dados) { 

        $validator = Validator::make(
            $dados->all(),
              [
                  'nome' => 'required|min:3|max:255',
              ],
              [
                  'nome.required' => 'O campo Nome é obrigatório.',
                  'nome.min' => 'O campo Nome deve conter no mínimo 3 caracteres.',
                  'nome.max' => 'O campo Nome deve conter no máximo 255 caracteres.',
              ]
      );

      if ($validator->fails()) {
          return redirect()
              ->route('aluno.index')
              ->withErrors($validator)
              ->withInput();
      }
        
        $aluno = new \App\Models\AlunoModel();
        $aluno::create($dados->all());
        
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