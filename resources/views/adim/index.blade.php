
<div>
    <form action="{{ Route('adm.add') }}" method="post">
        @csrf
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="{{ old('nome') }}">

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}">

        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone" value="{{ old('telefone') }}">

        <label for="cpf">Cpf</label>
        <input type="text" name="cpf" id="cpf" value="{{ old('telefone') }}">

        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario" value="{{ old('telefone') }}">

        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha" value="{{ old('telefone') }}">

        <label for="status">Status</label>
        <input type="text" name="status" id="status" value="{{ old('telefone') }}">

        <button type="submit">Salvar</button>
        @isset($success)
            <h1>{{ $success }}</h1>
        @endisset

        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </form>

    <table border="1">
            <tr>
                <td>Nome</td>
                <td>Email</td>
                <td>Cpf</td>
                <td>Usuario</td>
                <td>Senha</td>
                <td>Status</td>
                <td colspan="2">Ações</td>
            </tr>
            @isset($professores)
                @foreach($professores as $professor)
                        <tr>
                            <td>
                                <h3>{{ $professor->nome }}</h3>
                            </td>
                            <td>
                                <h3>{{ $professor->email }}</h3>
                            </td>
                            <td>
                                <h3>{{ $professor->telefone }}</h3>
                            </td>
                            <td>
                                <form action="{{ route('adm.remove', ['id' => $adm->id]) }}" method="GET">
                                    <button type="submit">Remover</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('adm.atualizar', ['id' => $adm->id]) }}" method="GET">
                                    <button type="submit">Atualizar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
            @endisset
    </table>

</div>    