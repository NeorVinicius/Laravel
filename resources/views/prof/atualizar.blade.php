<div>
    <form action="{{ route('professor.save') }}" method="post">
        @csrf

        <input type="hidden" name="id" value="{{ $professor->id }}">

        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="{{ $professor->nome }}">

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" value="{{ $professor->email }}">>

        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone" value="{{ $professor->telefone }}">>

        <button type="submit">Salvar</button>
        @isset($success)
            <h1>{{ $success }}</h1>
        @endisset
    </form>
</div>
