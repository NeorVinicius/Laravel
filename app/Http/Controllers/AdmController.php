<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlunoController extends Controller
{

    function index(){ 
        $aluno = new \App\Models\AdmModel();
        return view('aluno.index', ['alunos'=>$aluno::all()]);
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
              ->route('aluno.index')
              ->withErrors($validator)
              ->withInput();
      }
        
        $adm = new \App\Models\AdmModel();
        $adm::create($dados->all());
        
        $adms = new \App\Models\AdmModel();

        return view('adim.index', ['success'=>'Cadastrado!', 'adms'=>$adms::all()]);
        
    }
    
    function remove(string $id) {
        $adm = new \App\Models\AdmModel();
        $adm::destroy($id);

        return view('aluno.index', ['success'=>'Removido!', 'adms'=>$adm::all()]);

    }

    function atualizar(string $id) {
        $adm = new \App\Models\AdmModel();
        $adm = $aluno::find($id);

        return view('aluno.atualizar', ['aluno'=>$adm]);
    }

    function save(Request $dados) {
        $adm = new \App\Models\AdmModel();
        $adm = $aluno::find($dados->id);
        $adm->update($dados->all());

        return view('aluno.index', ['success'=>'Atualizado!', 'adms'=>$adm::all()]);
    }

}