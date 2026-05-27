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
    @isset($cursos)
        @foreach($cursos as $curso)
            <h2>{{ $curso->nome }}</h2>
            <h2>{{ $curso->periodo }}</h2>
        @endforeach

       
    @endisset
</form>