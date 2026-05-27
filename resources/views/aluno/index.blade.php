

<form action="{{ Route('aluno.add') }}" method="post">
    @csrf
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome">

    <button type="submit">Salvar</button>
    @isset($success)
        <h1>{{ $success }}</h1>
    @endisset
    @isset($alunos)
        @foreach($alunos as $aluno)
            <h2>{{ $aluno->nome }}</h2>
        @endforeach

       
    @endisset
</form>