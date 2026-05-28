<div>
    <form action="{{ Route('curso.add') }}" method="post">
     @csrf
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome">

        <label for="periodo">Periodo</label>
        <input type="text" name="periodo" id="periodo">

        <button type="submit">Salvar</button>
        @isset($success)
            <h1>{{ $success }}</h1>
        @endisset
       
                
    </form>

    <table border="1">
        <tr>
            <td>Nome</td>
            <td>Periodo</td>
            <td colspan="2">Ações</td>
        </tr>
        @isset($cursos)
            @foreach($cursos as $curso)
                    <tr>
                        <td>
                            <h3>{{ $curso->nome }}</h3>
                        </td>
                        <td>
                            <h3>{{ $curso->periodo }}</h3>
                        </td>
                        <td>
                            <form action="{{ route('curso.remove', ['id' => $curso->id]) }}" method="GET">
                                <button type="submit">Remover</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('curso.atualizar', ['id' => $curso->id]) }}" method="GET">
                                <button type="submit">Atualizar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
        @endisset
    </table>

</div> 