<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Editar Lembrete</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="container">
  <canvas id="borderLight"></canvas>
  <div class="inner">

    <div class="top-area" style="grid-template-columns: 1fr;">

      <div class="right" style="padding:30px;">
        <div class="calendar-area">

          <div class="top">
            <button id="prev" type="button" aria-label="Mês anterior">&#8249;</button>
            <h1 id="monthTitle"></h1>
            <button id="next" type="button" aria-label="Próximo mês">&#8250;</button>
          </div>

          <div class="week">
            <span>Dom</span>
            <span>Seg</span>
            <span>Ter</span>
            <span>Qua</span>
            <span>Qui</span>
            <span>Sex</span>
            <span>Sáb</span>
          </div>

          <div id="calendar" class="days"></div>

          <div class="note">

            @isset($success)
              <div class="alert-success">{{ $success }}</div>
            @endisset

            <div class="selected-label">
              <span class="selected-icon">📅</span>
              <span id="selectedText">
                {{ $calendario->dia }} de
                {{ ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'][$calendario->mes - 1] }}
                de {{ $calendario->ano }}
              </span>
            </div>

            <form action="{{ route('calendario.save') }}" method="POST">
              @csrf

              <input type="hidden" name="id"  value="{{ $calendario->id }}">
              <input type="hidden" name="dia" id="diaInput" value="{{ $calendario->dia }}">
              <input type="hidden" name="mes" id="mesInput" value="{{ $calendario->mes }}">
              <input type="hidden" name="ano" id="anoInput" value="{{ $calendario->ano }}">

              <textarea
                name="lembrete"
                id="text"
                maxlength="300"
              >{{ $calendario->lembrete }}</textarea>

              <div class="note-actions">
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

<script>
  // Inicia o calendário no mês do lembrete sendo editado
  const mesInicial = {{ $calendario->mes }} - 1
  const anoInicial = {{ $calendario->ano }}
</script>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>