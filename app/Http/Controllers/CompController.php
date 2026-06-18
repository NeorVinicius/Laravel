<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompController extends Controller
{

    function index(){ 
        $componente = new \App\Models\CompModel();
        return view('comp.index', ['componentes'=>$componente::all()]);
    }

    function add(Request $dados) { 

        $validator = Validator::make(
            $dados->all(),
              [
                  'nome' => 'required|min:3|max:255',
                  'hora_inicio' => 'required',
                  'hora_fim' => 'required'
              ],
              [
                  'nome.required' => 'O campo Nome é obrigatório.',
                  'nome.min' => 'O campo Nome deve conter no mínimo 3 caracteres.',
                  'nome.max' => 'O campo Nome deve conter no máximo 255 caracteres.',

                  'hora_inicio.required' => 'O campo  Hora do inicio é obrigatório.  Ex. (07:30:00 2024-05-12 )',

                  'hora_fim.required' => 'O campo Hora do término é obrigatório. Ex. (11:40:00 2024-05-12 )',


              ]
      );

      if ($validator->fails()) {
          return redirect()
              ->route('componente.index')
              ->withErrors($validator)
              ->withInput();
      }
        
        $componente = new \App\Models\CompModel();
        $componente::create($dados->all());
        
        $componentes = new \App\Models\CompModel();

        return view('comp.index', ['success'=>'Cadastrado!', 'componentes'=>$componentes::all()]);
        
    }
    
    function remove(string $id) {
        $componente = new \App\Models\CompModel();
        $componente::destroy($id);

        return view('comp.index', ['success'=>'Removido!', 'componentes'=>$componente::all()]);

    }

    function atualizar(string $id) {
        $componente = new \App\Models\CompModel();
        $componente = $componente::find($id);

        return view('comp.atualizar', ['componente'=>$componente]);
    }

    function save(Request $dados) {
        $componente = new \App\Models\CompModel();
        $componente = $componente::find($dados->id);
        $componente->update($dados->all());

        return view('comp.index', ['success'=>'Atualizado!', 'componentes'=>$componente::all()]);
    }

}