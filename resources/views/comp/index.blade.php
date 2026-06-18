
<div>
    <form action="{{ Route('componente.add') }}" method="post">
        @csrf
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="{{ old('nome') }}">

        <label for="hora_inicio">Hora do Inicio</label>
        <input type="datetime" name="hora_inicio" id="hora_inicio" value="{{ old('hora_inicio') }}">

        <label for="hora_fim">Hora do Término</label>
        <input type="datetime" name="hora_fim" id="hora_fim" value="{{ old('hora_fim') }}">

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
                <td>Inicio</td>
                <td>Fim</td>
                <td colspan="2">Ações</td>
            </tr>
            @isset($componentes)
                    @foreach($componentes as $componente)
                        <tr>
                            <td>
                                <h3>{{ $componente->nome }}</h3>
                            </td>
                            <td>
                                <form action="{{ route('aluno.remove', ['id' => $aluno->id]) }}" method="GET">
                                    <button type="submit">Remover</button>
                                </form>
                            </td>
                            <td>
                            <form action="{{ route('aluno.atualizar', ['id' => $aluno->id]) }}" method="GET">
                                <button type="submit">Atualizar</button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
            @endisset
    </table>
</div>
