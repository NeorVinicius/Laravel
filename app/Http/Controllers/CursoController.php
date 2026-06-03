<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    function index(){ 
        $curso = new \App\Models\CursoModel();
        return view('curso.index', ['cursos'=>$curso::all()]);
    }

    function add(Request $dados) { 

        $validator = Validator::make(
            $dados->all(),
              [
                  'nome' => 'required|min:2|max:250',
                  'periodo' => 'required|min:3|max:250'
              ],
              [
                  'nome.required' => 'O campo nome é obrigatório.',
                  'nome.min' => 'O campo nome deve conter no mínimo 2 caracteres.',
                  'nome.max' => 'O campo nome deve conter no máximo 250 caracteres.',
                  
                  'periodo.required' => 'O campo nome é obrigatório.',
                  'periodo.min' => 'O campo nome deve conter no mínimo 2 caracteres.',
                  'periodo.max' => 'O campo nome deve conter no máximo 250 caracteres.',
              ]
              
      );

      if ($validator->fails()) {
          return redirect()
              ->route('curso.index')
              ->withErrors($validator)
              ->withInput();
      }

        $curso = new \App\Models\CursoModel();
        $curso::create($dados->all());

        $cursos = new \App\Models\CursoModel();

        return view('curso.index', ['success'=>'Cadastrado!', 'cursos'=>$cursos::all()]);
    }

    function remove(string $id) {
        $curso = new \App\Models\CursoModel();
        $curso::destroy($id);

        return view('curso.index', ['success'=>'Removido!', 'cursos'=>$curso::all()]);

    }

    function atualizar(string $id) {
        $curso = new \App\Models\CursoModel();
        $curso = $curso::find($id);

        return view('curso.atualizar', ['curso'=>$curso]);
    }

    function save(Request $dados) {
        $curso = new \App\Models\CursoModel();
        $curso = $curso::find($dados->id);
        $curso->update($dados->all());

        return view('curso.index', ['success'=>'Atualizado!', 'cursos'=>$curso::all()]);
    }

}