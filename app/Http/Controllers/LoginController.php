<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // EXIBE A TELA DE LOGIN
    function index()
    {
        return view('login.index');
    }

    // PROCESSA O LOGIN — SÓ VALIDA E ENTRA
    function login(Request $dados)
    {
        // VALIDAÇÃO DOS CAMPOS
        $validator = Validator::make(
            $dados->all(),
            [
                'email' => 'required|email',
                'senha' => 'required',
            ],
            [
                'email.required' => 'O campo e-mail é obrigatório.',
                'email.email'    => 'Insira um e-mail válido.',
                'senha.required' => 'A senha é obrigatória.',
            ]
        );

        // SE A VALIDAÇÃO FALHAR, VOLTA COM OS ERROS
        if ($validator->fails()) {
            return redirect()
                ->route('login')
                ->withErrors($validator)
                ->withInput();
        }

        // SE PASSOU NA VALIDAÇÃO, VAI DIRETO PRO CALENDÁRIO
        return redirect()->route('calendario.index');
    }

    // PROCESSA O CADASTRO
    function add(Request $dados)
    {
        // VALIDAÇÃO DOS CAMPOS COM MENSAGENS PERSONALIZADAS
        $validator = Validator::make(
            $dados->all(),
            [
                'nome'  => 'required|min:3|max:255',
                'email' => 'required|email|unique:login,email',
                'senha' => 'required|min:6',
            ],
            [
                'nome.required'  => 'O campo nome é obrigatório.',
                'nome.min'       => 'O nome deve conter no mínimo 3 caracteres.',
                'nome.max'       => 'O nome deve conter no máximo 255 caracteres.',
                'email.required' => 'O campo e-mail é obrigatório.',
                'email.email'    => 'Insira um e-mail válido.',
                'email.unique'   => 'Este e-mail já está cadastrado.',
                'senha.required' => 'A senha é obrigatória.',
                'senha.min'      => 'A senha deve conter no mínimo 6 caracteres.',
            ]
        );

        // SE A VALIDAÇÃO FALHAR, VOLTA COM OS ERROS
        if ($validator->fails()) {
            return redirect()
                ->route('login.signup')
                ->withErrors($validator)
                ->withInput();
        }

        // CADASTRA O USUÁRIO NO BANCO
        $login = new \App\Models\LoginModel();
        $login::create($dados->all());

        // REDIRECIONA PRO LOGIN COM MENSAGEM DE SUCESSO
        return redirect()
            ->route('login')
            ->with('success', 'Conta criada com sucesso! Faça o login.');
    }
}