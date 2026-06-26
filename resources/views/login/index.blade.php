<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MEMO - Login</title>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

  <div class="blur blur1"></div>
  <div class="blur blur2"></div>

  <div class="container">
    <div class="login-card">

      <div class="brand">ME<span>MO</span></div>

      <h2>Bem-vindo</h2>
      <p>Crie uma conta e organize seus agendamentos facilidade.</p>

      {{-- ERROS DE VALIDAÇÃO DO LARAVEL --}}
      @if($errors->any())
        <div class="alert-error">
          @foreach($errors->all() as $error)
            <p style="margin-bottom:0;">⚠️ {{ $error }}</p>
          @endforeach
        </div>
      @endif

      <form action="{{ route('login.enviar') }}" method="POST">
        @csrf

        {{-- CAMPO NOME --}}
        <input
          type="text"
          name="nome"
          placeholder="Seu nome"
          value="{{ old('nome') }}"
        >

        {{-- CAMPO EMAIL --}}
        <input
          type="email"
          name="email"
          placeholder="Seu e-mail"
          value="{{ old('email') }}"
        >

        {{-- CAMPO SENHA --}}
        <input
          type="password"
          name="senha"
          placeholder="Sua senha"
        >

        <button  type="submit" class="btn-primary" href="{{ route('calendario.index') }}">Entrar</button>

      </form>

    </div>
  </div>

</body>
</html>