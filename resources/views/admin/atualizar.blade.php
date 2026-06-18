<div>
    <form action="{{ route('adm.save') }}" method="post">
        @csrf

        <input type="hidden" name="id" value="{{ $adm->id }}">

        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="{{ $adm->nome }}">

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" value="{{ $adm->email }}">

        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone" value="{{ $adm->telefone }}">

        <label for="cpf">Cpf</label>
        <input type="text" name="cpf" id="cpf" value="{{ $adm->cpf }}">

        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario" value="{{ $adm->usuario }}">

        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha" value="{{ $adm->senha }}">

        <label for="status">Status</label>
        <input type="text" name="status" id="status" value="{{ $adm->status }}">

        <button type="submit">Salvar</button>
        @isset($success)
            <h1>{{ $success }}</h1>
        @endisset
    </form>
</div>
