<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarioController extends Controller
{
    function index(){ 
        return view('calendario.index');
    }

    function add(Request $dados) { 
        $calendario = new \App\Models\CalendarioModel();
        $calendario::create($dados->all());
    
    //RECUPERANDO TODOS CALENDARIOS DO BANCO E ENVIANDO PARA A VIEW
				
    $calendarios = new \App\Models\CalendarioModel();

    return view('calendario.index', ['success'=>'Cadastrado!', 'calendarios'=>$calendarios::all()]);

    }

    function remove(string $id) {
        $calendario = new \App\Models\CalendarioModel();
        $calendario::destroy($id);

        return view('calendario.index', ['success'=>'Removido!', 'calendarios'=>$calendario::all()]);

    }

    function atualizar(string $id) {
        $calendario = new \App\Models\CalendarioModel();
        $calendario = $calendario::find($id);

        return view('calendario.atualizar', ['calendario'=>$calendario]);
    }

    function save(Request $dados) {
        $calendario = new \App\Models\CalendarioModel();
        $calendario = $calendario::find($dados->id);
        $calendario->update($dados->all());

        return view('calendario.index', ['success'=>'Atualizado!', 'calendarios'=>$calendario::all()]);
    }

}