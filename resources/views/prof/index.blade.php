

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
    @isset($professores)
        @foreach($professores as $professor)
            <h2>{{ $professor->nome }}</h2>
            <h2>{{ $professor->email }}</h2>
            <h2>{{ $professor->telefone }}</h2>
        @endforeach

       
    @endisset
</form>