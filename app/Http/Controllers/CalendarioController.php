<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CalendarioController extends Controller
{
    function index(){ 
        $calendario = new \App\Models\CalendarioModel();
        return view('calendario.index', ['calendarios' => $calendario::all()]);
    }

    function add(Request $dados) { 

        // VALIDAÇÃO COM MENSAGENS PERSONALIZADAS
        $validator = Validator::make(
            $dados->all(),
            [
                'dia'      => 'required',
                'lembrete' => 'required|min:2|max:200',
            ],
            [
                'dia.required'      => 'Selecione um Dia no calendário.',
                'lembrete.required' => 'O campo Lembrete é obrigatório.',
                'lembrete.min'      => 'O Lembrete deve conter no mínimo 2 caracteres.',
                'lembrete.max'      => 'O Lembrete deve conter no máximo 200 caracteres.',
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->route('calendario.index')
                ->withErrors($validator)
                ->withInput();
        }

        $calendario = new \App\Models\CalendarioModel();
        $calendario::create($dados->all());

        $calendarios = new \App\Models\CalendarioModel();
        return view('calendario.index', ['success' => 'Cadastrado!', 'calendarios' => $calendarios::all()]);
    }

    function remove(string $id) {
        $calendario = new \App\Models\CalendarioModel();
        $calendario::destroy($id);

        return view('calendario.index', ['success' => 'Removido!', 'calendarios' => $calendario::all()]);
    }

    function atualizar(string $id) {
        $calendario = new \App\Models\CalendarioModel();
        $calendario = $calendario::find($id);

        return view('calendario.atualizar', ['calendario' => $calendario]);
    }

   function save(Request $dados) {

    // VALIDAÇÃO COM MENSAGENS PERSONALIZADAS
    $validator = Validator::make(
        $dados->all(),
        [
            'lembrete' => 'required|min:3|max:300',
        ],
        [
            'lembrete.required' => 'O campo Lembrete é obrigatório.',
            'lembrete.min'      => 'O lembrete deve conter no mínimo 3 caracteres.',
            'lembrete.max'      => 'O lembrete deve conter no máximo 300 caracteres.',
        ]
    );

    // SE FALHAR, VOLTA PRA TELA DE EDIÇÃO COM OS ERROS
        if ($validator->fails()) {
            return redirect()
                ->route('calendario.atualizar', $dados->id)
                ->withErrors($validator)
                ->withInput();
        }

        $calendario = new \App\Models\CalendarioModel();
        $calendario = $calendario::find($dados->id);
        $calendario->update($dados->all());

        return view('calendario.index', ['success' => 'Atualizado!', 'calendarios' => $calendario::all()]);
    }
}