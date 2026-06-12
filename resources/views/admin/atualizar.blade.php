<div>
    <form action="{{ route('aluno.save') }}" method="post">
        @csrf

        <input type="hidden" name="id" value="{{ $adm->id }}">

        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="{{ old('nome') }}">

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}">

        <label for="cpf">Cpf</label>
        <input type="text" name="cpf" id="cpf" value="{{ old('cpf') }}">

        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario" value="{{ old('usuario') }}">

        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha" value="{{ old('senha') }}">

        <label for="status">Status</label>
        <input type="text" name="status" id="status" value="{{ old('status') }}">

        <button type="submit">Salvar</button>
        @isset($success)
            <h1>{{ $success }}</h1>
        @endisset
    </form>
</div>
