<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Memo Agenda</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="container">
  <canvas id="borderLight"></canvas>
  <div class="inner">

    <div class="top-area">

      <div class="left">
        <img id="monthImage" src="{{ asset('img/janeiro.jpeg') }}" alt="Imagem do mês">
        <div class="badge">
          <span class="badge-month" id="monthName">Janeiro</span>
          <span class="badge-number" id="monthNumber">01</span>
        </div>
      </div>

      <div class="right">
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

            @if(isset($success))
              <div class="alert-success">{{ $success }}</div>
            @endif

            <div class="selected-label">
              <span class="selected-icon">📅</span>
              <span id="selectedText">Selecione um dia</span>
            </div>

            <form action="{{ route('calendario.add') }}" method="POST">
              @csrf
              <input type="hidden" name="dia" id="diaInput">
              <input type="hidden" name="mes" id="mesInput">
              <input type="hidden" name="ano" id="anoInput">

              <textarea
                name="lembrete"
                id="text"
                placeholder="Escreva um lembrete para este dia..."
                maxlength="300"
              ></textarea>

              <div class="note-actions">
                <button type="submit" id="save">Salvar</button>
              </div>
            </form>

          </div>
        </div>
      </div>

    </div>

    <div class="bottom-area">

      <div class="search-bar">
        <span class="search-icon">🔍</span>
        <input
          id="searchInput"
          type="text"
          placeholder="Pesquisar lembrete..."
          oninput="filtrarLembretes()"
        >
        <select id="searchMonth" onchange="filtrarLembretes()">
          <option value="">Todos os meses</option>
          <option value="1">Janeiro</option>
          <option value="2">Fevereiro</option>
          <option value="3">Março</option>
          <option value="4">Abril</option>
          <option value="5">Maio</option>
          <option value="6">Junho</option>
          <option value="7">Julho</option>
          <option value="8">Agosto</option>
          <option value="9">Setembro</option>
          <option value="10">Outubro</option>
          <option value="11">Novembro</option>
          <option value="12">Dezembro</option>
        </select>
      </div>

      <div class="saved-panel">
        <div id="saved">

          @php
            $meses = [
              1=>'Janeiro',2=>'Fevereiro',3=>'Março',4=>'Abril',
              5=>'Maio',6=>'Junho',7=>'Julho',8=>'Agosto',
              9=>'Setembro',10=>'Outubro',11=>'Novembro',12=>'Dezembro'
            ];
            $calendarios = $calendarios ?? collect();
            $grupos = $calendarios->sortBy(fn($i) => $i->ano.$i->mes.$i->dia)->groupBy(fn($i) => $i->ano.'-'.$i->mes);
          @endphp

          @if($calendarios->isEmpty())
            <p class="empty">Nenhum lembrete salvo</p>
          @else
            @foreach($grupos as $chave => $itens)
              @php
                [$ano, $mes] = explode('-', $chave);
              @endphp
              <div class="month-group-header">{{ $meses[(int)$mes] }} {{ $ano }}</div>

              @foreach($itens as $item)
                <div class="item" data-mes="{{ $item->mes }}" data-texto="{{ strtolower($item->lembrete) }}">
                  <small>{{ $item->dia }} de {{ $meses[(int)$item->mes] }} de {{ $item->ano }}</small>
                  <p class="item-text">{{ $item->lembrete }}</p>
                  <div class="item-actions">
                    <a href="{{ route('calendario.atualizar', $item->id) }}" class="btn-edit">✏️ Editar</a>
                    <a href="{{ route('calendario.remove', $item->id) }}"
                       class="btn-remove"
                       onclick="return confirm('Remover este lembrete?')">
                      🗑️ Remover
                    </a>
                  </div>
                </div>
              @endforeach

            @endforeach
          @endif

        </div>
      </div>

    </div>

  </div>
</div>

<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>