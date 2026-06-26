<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Editar Lembrete</title>
  <link rel="stylesheet" href="{{ asset('css/calendario.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="container">
  <canvas id="borderLight"></canvas>
  <div class="inner">

    <div class="top-area" style="grid-template-columns: 1fr;">

      <div class="right" style="padding:30px;">
        <div class="calendar-area">

          {{-- NAVEGAÇÃO DO CALENDÁRIO --}}
          <div class="top">
            <button id="prev" type="button" aria-label="Mês anterior">&#8249;</button>
            <h1 id="monthTitle"></h1>
            <button id="next" type="button" aria-label="Próximo mês">&#8250;</button>
          </div>

          {{-- CABEÇALHO DOS DIAS DA SEMANA --}}
          <div class="week">
            <span>Dom</span>
            <span>Seg</span>
            <span>Ter</span>
            <span>Qua</span>
            <span>Qui</span>
            <span>Sex</span>
            <span>Sáb</span>
          </div>

          {{-- DIAS DO MÊS GERADOS PELO JS --}}
          <div id="calendar" class="days"></div>

          <div class="note">

            {{-- MENSAGEM DE SUCESSO --}}
            @isset($success)
              <div class="alert-success">{{ $success }}</div>
            @endisset

            {{-- ERROS DE VALIDAÇÃO DO LARAVEL --}}
            {{-- APARECE QUANDO O LEMBRETE ESTÁ VAZIO OU INVÁLIDO --}}
            @if($errors->any())
              <div class="aviso-dia">
                @foreach($errors->all() as $erro)
                  <span>⚠️ {{ $erro }}</span>
                @endforeach
              </div>
            @endif

            {{-- DIA SELECIONADO, ATUALIZADO PELO JS AO CLICAR NO CALENDÁRIO --}}
            <div class="selected-label">
              <span class="selected-icon">📅</span>
              <span id="selectedText">
                {{ $calendario->dia }} de
                {{ ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'][$calendario->mes - 1] }}
                de {{ $calendario->ano }}
              </span>
            </div>

            {{-- FORMULÁRIO DE EDIÇÃO --}}
            <form action="{{ route('calendario.save') }}" method="POST">
              @csrf

              {{-- CAMPOS HIDDEN COM OS DADOS DO LEMBRETE --}}
              <input type="hidden" name="id"  value="{{ $calendario->id }}">
              <input type="hidden" name="dia" id="diaInput" value="{{ $calendario->dia }}">
              <input type="hidden" name="mes" id="mesInput" value="{{ $calendario->mes }}">
              <input type="hidden" name="ano" id="anoInput" value="{{ $calendario->ano }}">

              {{-- old() MANTÉM O TEXTO SE A VALIDAÇÃO FALHAR --}}
              {{-- SE NÃO TIVER old(), USA O VALOR DO BANCO --}}
              <textarea
                name="lembrete"
                id="text"
                maxlength="300"
              >{{ old('lembrete', $calendario->lembrete) }}</textarea>

              <div class="note-actions">
                {{-- CANCELAR VOLTA PARA O INDEX --}}
                <a href="{{ route('calendario.index') }}" id="cancel">Cancelar</a>
                <button type="submit" id="save">Atualizar</button>
              </div>

            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

{{-- PASSA O MÊS E ANO DO LEMBRETE PRO JS --}}
{{-- ASSIM O CALENDÁRIO ABRE NO MÊS CORRETO --}}
<script>
  const mesInicial = {{ $calendario->mes }} - 1
  const anoInicial = {{ $calendario->ano }}
</script>
<script src="{{ asset('js/calendario.js') }}"></script>
</body>
</html>