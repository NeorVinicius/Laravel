<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfController extends Controller
{

    function index(){ 
        $professor = new \App\Models\ProfModel();
        return view('prof.index', ['professores'=>$professor::all()]);
    }
 
    function add(Request $dados) { 

        $validator = Validator::make(
            $dados->all(),
              [
                  'nome' => 'required|min:3|max:250',
                  'email' => 'required|min:5|max:250',
                  'telefone' => 'required|min:14|max:14'
              ],
              [
                  'nome.required' => 'O campo Nome é obrigatório.',
                  'nome.min' => 'O campo Nome deve conter no mínimo 3 caracteres.',
                  'nome.max' => 'O campo Nome deve conter no máximo 250 caracteres.',
                  
                  'email.required' => 'O campo Email é obrigatório.',
                  'email.min' => 'O campo Email deve conter no mínimo 5 caracteres.',
                  'email.max' => 'O campo Email deve conter no máximo 250 caracteres.',

                  'telefone.required' => 'O campo Telefone é obrigatório.',
                  'telefone.min' => 'O campo Telefone deve conter no mínimo 14 caracteres.',
                  'telefone.max' => 'O campo Telefone deve conter no máximo 14 caracteres.',
              ]
              
      );

      if ($validator->fails()) {
          return redirect()
              ->route('professor.index')
              ->withErrors($validator)
              ->withInput();
      }

        $professor = new \App\Models\ProfModel();
        $professor::create($dados->all());

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

        return view('prof.atualizar', ['professor'=>$professor]);
    }

    function save(Request $dados) {
        $professor = new \App\Models\ProfModel();
        $professor = $professor::find($dados->id);
        $professor->update($dados->all());

        return view('prof.index', ['success'=>'Atualizado!', 'professores'=>$professor::all()]);
    }

}