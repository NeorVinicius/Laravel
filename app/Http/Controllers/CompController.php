<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlunoController extends Controller
{

    function index(){ 
        $aluno = new \App\Models\CompModel();
        return view('comp.index', ['alunos'=>$aluno::all()]);
    }

    function add(Request $dados) { 

        $validator = Validator::make(
            $dados->all(),
              [
                  'nome' => 'required|min:3|max:255',
              ],
              [
                  'nome.required' => 'O campo nome é obrigatório.',
                  'nome.min' => 'O campo nome deve conter no mínimo 3 caracteres.',
                  'nome.max' => 'O campo nome deve conter no máximo 255 caracteres.',
              ]
      );

      if ($validator->fails()) {
          return redirect()
              ->route('comp.index')
              ->withErrors($validator)
              ->withInput();
      }
        
        $componente = new \App\Models\CompModel();
        $componente::create($dados->all());
        
        $componentes = new \App\Models\CompModel();

        return view('comp.index', ['success'=>'Cadastrado!', 'componentes'=>$componentes::all()]);
        
    }
    
    function remove(string $id) {
        $aluno = new \App\Models\CompModel();
        $aluno::destroy($id);

        return view('comp.index', ['success'=>'Removido!', 'componentes'=>$componente::all()]);

    }

    function atualizar(string $id) {
        $aluno = new \App\Models\CompModel();
        $aluno = $aluno::find($id);

        return view('comp.atualizar', ['componente'=>$componente]);
    }

    function save(Request $dados) {
        $aluno = new \App\Models\CompModel();
        $aluno = $aluno::find($dados->id);
        $aluno->update($dados->all());

        return view('comp.index', ['success'=>'Atualizado!', 'componentes'=>$componente::all()]);
    }

}