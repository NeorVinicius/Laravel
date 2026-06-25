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

{{-- CONTAINER PRINCIPAL COM CANVAS DA LUZ DA BORDA --}}
<div class="container">
  <canvas id="borderLight"></canvas>
  <div class="inner">

    {{-- ÁREA DO TOPO: IMAGEM + CALENDÁRIO --}}
    <div class="top-area">

      {{-- LADO ESQUERDO: IMAGEM DO MÊS --}}
      <div class="left">
        <img id="monthImage" src="{{ asset('img/janeiro.jpeg') }}" alt="Imagem do mês">
        {{-- BADGE COM NOME E NÚMERO DO MÊS, ATUALIZADO PELO JS --}}
        <div class="badge">
          <span class="badge-month" id="monthName">Janeiro</span>
          <span class="badge-number" id="monthNumber">01</span>
        </div>
      </div>

      {{-- LADO DIREITO: CALENDÁRIO + FORMULÁRIO --}}
      <div class="right">
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

          {{-- ÁREA DE CADASTRO DE LEMBRETE --}}
          <div class="note">

            {{-- MENSAGEM DE SUCESSO VINDA DO CONTROLLER --}}
            @if(isset($success))
              <div class="alert-success">{{ $success }}</div>
            @endif

            {{-- DIA SELECIONADO, ATUALIZADO PELO JS AO CLICAR NO CALENDÁRIO --}}
            <div class="selected-label">
              <span class="selected-icon">📅</span>
              <span id="selectedText">Selecione um dia</span>
            </div>

            {{-- FORMULÁRIO DE CADASTRO --}}
            {{-- OS INPUTS HIDDEN SÃO PREENCHIDOS PELO JS AO CLICAR NO DIA --}}
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

    {{-- ÁREA DO BAIXO: PESQUISA + LEMBRETES --}}
    <div class="bottom-area">

      {{-- BARRA DE PESQUISA --}}
      {{-- oninput E onchange CHAMAM A FUNÇÃO filtrarLembretes() DO JS --}}
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

      {{-- PAINEL DE LEMBRETES VINDOS DO BANCO --}}
      <div class="saved-panel">
        <div id="saved">

          @php
            // Array de meses para exibição
            $meses = [
              1=>'Janeiro',2=>'Fevereiro',3=>'Março',4=>'Abril',
              5=>'Maio',6=>'Junho',7=>'Julho',8=>'Agosto',
              9=>'Setembro',10=>'Outubro',11=>'Novembro',12=>'Dezembro'
            ];
            // Se $calendarios não vier do controller, usa coleção vazia
            $calendarios = $calendarios ?? collect();
            // Ordena por ano, mês e dia e agrupa por mês/ano
            $grupos = $calendarios->sortBy(fn($i) => $i->ano.$i->mes.$i->dia)->groupBy(fn($i) => $i->ano.'-'.$i->mes);
          @endphp

          {{-- SE NÃO TIVER LEMBRETES MOSTRA MENSAGEM --}}
          @if($calendarios->isEmpty())
            <p class="empty">Nenhum lembrete salvo</p>
          @else

            {{-- PERCORRE OS GRUPOS DE MÊS/ANO --}}
            @foreach($grupos as $chave => $itens)
              @php
                // Separa ano e mês da chave do grupo
                [$ano, $mes] = explode('-', $chave);
              @endphp

              {{-- CABEÇALHO DO MÊS --}}
              <div class="month-group-header">{{ $meses[(int)$mes] }} {{ $ano }}</div>

              {{-- PERCORRE OS LEMBRETES DO MÊS --}}
              @foreach($itens as $item)
                {{-- data-mes E data-texto SÃO USADOS PELO JS PARA FILTRAR --}}
                <div class="item" data-mes="{{ $item->mes }}" data-texto="{{ strtolower($item->lembrete) }}">
                  <small>{{ $item->dia }} de {{ $meses[(int)$item->mes] }} de {{ $item->ano }}</small>
                  <p class="item-text">{{ $item->lembrete }}</p>
                  <div class="item-actions">

                    {{-- BOTÃO EDITAR: LEVA PARA A PÁGINA DE EDIÇÃO --}}
                    <a href="{{ route('calendario.atualizar', $item->id) }}" class="btn-edit">✏️ Editar</a>

                    {{-- BOTÃO REMOVER: ABRE O MODAL DE CONFIRMAÇÃO VIA JS --}}
                    <a href="#"
                       class="btn-remove"
                       onclick="abrirModal('{{ route('calendario.remove', $item->id) }}')">
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

{{-- MODAL DE CONFIRMAÇÃO DE REMOÇÃO --}}
{{-- Fica escondido por padrão, aparece ao clicar em Remover --}}
<div id="modalRemover" class="modal-overlay" style="display:none">
  <div class="modal-box">
    <div class="modal-icon">🗑️</div>
    <h3 class="modal-title">Remover Lembrete</h3>
    <p class="modal-text">Tem certeza que deseja remover este lembrete? Esta ação não pode ser desfeita.</p>
    <div class="modal-actions">
      {{-- CANCELA E FECHA O MODAL --}}
      <button class="modal-cancel" onclick="fecharModal()">Cancelar</button>
      {{-- CONFIRMA E SEGUE PARA A ROTA DE REMOÇÃO --}}
      <a id="modalConfirmar" href="#" class="modal-confirmar">Remover</a>
    </div>
  </div>
</div>

<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>