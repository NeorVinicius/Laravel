<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdmController extends Controller
{

    function index(){ 
        $adm = new \App\Models\AdmModel();
        return view('admin.index', ['adms'=>$adm::all()]);
    }

    function add(Request $dados) { 

        $validator = Validator::make(
            $dados->all(),
              [
                  'nome' => 'required|min:3|max:255',
                  'email' => 'required|min:5|max:250',
                  'telefone' => 'required|min:14|max:14',
                  'cpf' => 'required|min:11|max:11',
                  'usuario' => 'required|min:3|max:200',
                  'senha' => 'required|min:6|max:40',
                  'status' => 'required|min:3|max:50'
              ],
              [
                  'nome.required' => 'O campo Nome é obrigatório.',
                  'nome.min' => 'O campo Nome deve conter no mínimo 3 caracteres.',
                  'nome.max' => 'O campo Nome deve conter no máximo 255 caracteres.',

                  'email.required' => 'O campo Email é obrigatório.',
                  'email.min' => 'O campo Email deve conter no mínimo 5 caracteres.',
                  'email.max' => 'O campo Email deve conter no máximo 250 caracteres.',

                  'telefone.required' => 'O campo Telefone é obrigatório.',
                  'telefone.min' => 'O campo Telefone deve conter no mínimo 14 caracteres.',
                  'telefone.max' => 'O campo Telefone deve conter no máximo 14 caracteres.',

                  'cpf.required' => 'O campo CPF é obrigatório.',
                  'cpf.min' => 'O CPF deve conter no mínimo 11 caracteres.',
                  'cpf.max' => 'O CPF deve conter no máximo 11 caracteres.',

                  'usuario.required' => 'O campo Usuario é obrigatório.',
                  'usuario.min' => 'O campo Usuario deve conter no mínimo 3 caracteres.',
                  'usuario.max' => 'O campo Usuario deve conter no máximo 200 caracteres.',

                  'senha.required' => 'A Senha é obrigatório.',
                  'senha.min' => 'A Senha deve conter no mínimo 6 caracteres.',
                  'senha.max' => 'A Senha deve conter no máximo 40 caracteres.',

                  'status.required' => 'O Status é obrigatório.',
                  'status.min' => 'O campo Status deve conter no mínimo 3 caracteres.',
                  'status.max' => 'O campo Status deve conter no máximo 50 caracteres.'
              ]
      );

      if ($validator->fails()) {
          return redirect()
              ->route('adm.index')
              ->withErrors($validator)
              ->withInput();
      }
        
        $adm = new \App\Models\AdmModel();
        $adm::create($dados->all());
        
        $adms = new \App\Models\AdmModel();

        return view('admin.index', ['success'=>'Cadastrado!', 'adms'=>$adms::all()]);
        
    }
    
    function remove(string $id) {
        $adm = new \App\Models\AdmModel();
        $adm::destroy($id);

        return view('admin.index', ['success'=>'Removido!', 'adms'=>$adm::all()]);

    }

    function atualizar(string $id) {
        $adm = new \App\Models\AdmModel();
        $adm = $adm::find($id);

        return view('admin.atualizar', ['adm'=>$adm]);
    }

    function save(Request $dados) {
        $adm = new \App\Models\AdmModel();
        $adm = $adm::find($dados->id);
        $adm->update($dados->all());

        return view('admin.index', ['success'=>'Atualizado!', 'adms'=>$adm::all()]);
    }

}