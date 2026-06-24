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

      <div class="left">
        <img id="monthImage" src="img/janeiro.jpg" alt="Imagem do mês">
        <div class="badge">
          <span class="badge-month" id="monthName">Janeiro</span>
          <span class="badge-number" id="monthNumber">01</span>
        </div>
      </div>

      <div class="right">

        <div class="calendar-area">

          <div class="top">
            <button id="prev" aria-label="Mês anterior">&#8249;</button>
            <h1 id="monthTitle"></h1>
            <button id="next" aria-label="Próximo mês">&#8250;</button>
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
            <div class="selected-label">
              <span class="selected-icon">📅</span>
              <span id="selectedText">Selecione um dia</span>
            </div>

            <textarea
              id="text"
              placeholder="Escreva um lembrete para este dia..."
              maxlength="300"
            ></textarea>

            <div class="note-actions">
              <button id="cancel" style="display:none">Cancelar</button>
              <button id="save">Salvar</button>
            </div>
          </div>

        </div>

        <div class="saved-panel">
          <h2>📋 Lembretes</h2>
          <div id="saved">
            <p class="empty">Nenhum lembrete salvo</p>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="{{  asset('js/script.js') }}"></script>

</body>
</html>