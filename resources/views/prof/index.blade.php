
<div>
    <form action="{{ Route('professor.add') }}" method="post">
        @csrf
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome">

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email">

        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone">

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
                <td>Telefone</td>
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
                                <form action="{{ route('professor.remove', ['id' => $professor->id]) }}" method="GET">
                                    <button type="submit">Remover</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('professor.atualizar', ['id' => $professor->id]) }}" method="GET">
                                    <button type="submit">Atualizar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
            @endisset
    </table>

</div>    