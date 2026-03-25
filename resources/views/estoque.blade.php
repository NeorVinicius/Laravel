<table border="1">
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Ações</th>
    </tr>
    @foreach ($produtos as $produto)
    <tr>
        <td>{{ $produto['id'] }}</td>
        <td>{{ $produto['nome'] }}</td>
        <td>{{ $produto['preco'] }}</td>
        <td>
            <button>Remover</button>
            <button>Editar</button>
        </td>
    </tr>
    @endforeach


</table>