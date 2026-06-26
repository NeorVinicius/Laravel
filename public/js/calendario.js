// ARRAY COM OS NOMES DOS MESES
const months = [
  "Janeiro", "Fevereiro", "Março", "Abril",
  "Maio", "Junho", "Julho", "Agosto",
  "Setembro", "Outubro", "Novembro", "Dezembro"
]

// ARRAY COM OS NOMES DAS IMAGENS DE CADA MÊS
const images = [
  "janeiro", "fevereiro", "marco", "abril",
  "maio", "junho", "julho", "agosto",
  "setembro", "outubro", "novembro", "dezembro"
]

// SE ESTIVER NA TELA DE EDITAR, INICIA NO MÊS DO LEMBRETE
// CASO CONTRÁRIO, INICIA NO MÊS ATUAL
let current = (typeof mesInicial !== 'undefined')
  ? new Date(anoInicial, mesInicial, 1)
  : new Date()

// REFERÊNCIAS AOS ELEMENTOS DO HTML
const calendarEl   = document.getElementById("calendar")
const monthTitle   = document.getElementById("monthTitle")
const monthImage   = document.getElementById("monthImage")
const monthNumber  = document.getElementById("monthNumber")
const monthName    = document.getElementById("monthName")
const selectedText = document.getElementById("selectedText")
const nextBtn      = document.getElementById("next")
const prevBtn      = document.getElementById("prev")
const diaInput     = document.getElementById("diaInput")
const mesInput     = document.getElementById("mesInput")
const anoInput     = document.getElementById("anoInput")

// RENDERIZA O CALENDÁRIO DO MÊS ATUAL
function render() {
  if (calendarEl) calendarEl.innerHTML = ""

  let y = current.getFullYear()
  let m = current.getMonth()

  // ATUALIZA TÍTULO, IMAGEM, BADGE
  if (monthTitle)  monthTitle.innerText  = `${months[m]} ${y}`
  if (monthImage)  monthImage.src        = `/img/${images[m]}.jpeg`
  if (monthNumber) monthNumber.innerText = String(m + 1).padStart(2, "0")
  if (monthName)   monthName.innerText   = months[m]

  if (!calendarEl) return

  // CALCULA O DIA DA SEMANA DO PRIMEIRO DIA E O TOTAL DE DIAS DO MÊS
  let first = new Date(y, m, 1).getDay()
  let total = new Date(y, m + 1, 0).getDate()

  // ADICIONA ESPAÇOS VAZIOS ANTES DO PRIMEIRO DIA
  for (let i = 0; i < first; i++) {
    calendarEl.innerHTML += "<div></div>"
  }

  // CRIA OS BOTÕES DE CADA DIA
  for (let d = 1; d <= total; d++) {
    let el = document.createElement("div")
    el.className = "day"
    el.innerText = d

    // NA TELA DE EDITAR, MARCA O DIA DO LEMBRETE COMO ATIVO
    if (
      diaInput && mesInput && anoInput &&
      d == diaInput.value &&
      (m + 1) == mesInput.value &&
      y == anoInput.value
    ) {
      el.classList.add("active")
    }

    // AO CLICAR EM UM DIA, ATUALIZA OS INPUTS E O TEXTO DO DIA SELECIONADO
    el.onclick = () => {
      document.querySelectorAll(".day").forEach(x => x.classList.remove("active"))
      el.classList.add("active")
      if (selectedText) selectedText.innerText = `${d} de ${months[m]} de ${y}`
      if (diaInput) diaInput.value = d
      if (mesInput) mesInput.value = m + 1
      if (anoInput) anoInput.value = y
    }
    calendarEl.append(el)
  }
}

// FILTRA OS LEMBRETES VISÍVEIS NA TELA SEM RECARREGAR A PÁGINA
function filtrarLembretes() {
  const texto = document.getElementById("searchInput")?.value.toLowerCase().trim() || ""
  const mes   = document.getElementById("searchMonth")?.value || ""

  const items   = document.querySelectorAll(".item")
  const headers = document.querySelectorAll(".month-group-header")

  // MOSTRA OU ESCONDE CADA LEMBRETE CONFORME O FILTRO
  items.forEach(item => {
    const matchTexto = item.dataset.texto?.includes(texto)
    const matchMes   = mes ? item.dataset.mes === mes : true
    item.style.display = matchTexto && matchMes ? "flex" : "none"
  })

  // ESCONDE O CABEÇALHO DO MÊS SE NÃO TIVER ITENS VISÍVEIS
  headers.forEach(header => {
    let next = header.nextElementSibling
    let temVisivel = false
    while (next && !next.classList.contains("month-group-header")) {
      if (next.style.display !== "none") temVisivel = true
      next = next.nextElementSibling
    }
    header.style.display = temVisivel ? "block" : "none"
  })
}

// ABRE O MODAL DE CONFIRMAÇÃO DE REMOÇÃO
// RECEBE A URL DA ROTA DE REMOÇÃO E COLOCA NO BOTÃO CONFIRMAR
function abrirModal(url) {
  document.getElementById("modalConfirmar").href = url
  document.getElementById("modalRemover").style.display = "flex"
}

// FECHA O MODAL SEM REMOVER
function fecharModal() {
  document.getElementById("modalRemover").style.display = "none"
}

// NAVEGAÇÃO ENTRE OS MESES
if (nextBtn) nextBtn.onclick = () => { current.setMonth(current.getMonth() + 1); render() }
if (prevBtn) prevBtn.onclick = () => { current.setMonth(current.getMonth() - 1); render() }

// RENDERIZA O CALENDÁRIO AO CARREGAR A PÁGINA
render()

// CANVAS — LUZ PERCORRENDO A BORDA DO CONTAINER
const canvas = document.getElementById("borderLight")
if (canvas) {
  const ctx = canvas.getContext("2d")

  // AJUSTA O TAMANHO DO CANVAS AO TAMANHO DO CONTAINER
  function resizeCanvas() {
    canvas.width  = canvas.parentElement.offsetWidth
    canvas.height = canvas.parentElement.offsetHeight
  }

  resizeCanvas()
  window.addEventListener("resize", resizeCanvas)

  let progress = 0

  // CALCULA A POSIÇÃO X,Y NA BORDA DO RETÂNGULO A PARTIR DE UM OFFSET
  function getPosOnBorder(offset, w, h) {
    const perimeter = 2 * (w + h)
    offset = ((offset % perimeter) + perimeter) % perimeter
    if (offset < w)          return { x: offset, y: 0 }        // TOPO
    else if (offset < w + h) return { x: w, y: offset - w }    // DIREITA
    else if (offset < 2*w+h) return { x: w - (offset - w - h), y: h } // BASE
    else                     return { x: 0, y: h - (offset - 2*w - h) } // ESQUERDA
  }

  // DESENHA OS DOIS PONTOS DE LUZ COM CAUDA
  function drawBorder() {
    const w = canvas.width
    const h = canvas.height
    const perimeter = 2 * (w + h)

    ctx.clearRect(0, 0, w, h)

    // DOIS PONTOS DE LUZ EM LADOS OPOSTOS DO RETÂNGULO
    const offsets = [
      progress % perimeter,
      (progress + perimeter / 2) % perimeter
    ]

    offsets.forEach(offset => {
      const { x, y } = getPosOnBorder(offset, w, h)

      // DESENHA A CAUDA QUE VAI SUMINDO
      for (let i = 0; i < 60; i++) {
        const tail  = getPosOnBorder(offset - i, w, h)
        const alpha = (1 - i / 60) * 0.8
        ctx.beginPath()
        ctx.arc(tail.x, tail.y, 2, 0, Math.PI * 2)
        ctx.fillStyle = `rgba(0, 170, 255, ${alpha})`
        ctx.fill()
      }

      // DESENHA O PONTO BRANCO NA FRENTE
      ctx.beginPath()
      ctx.arc(x, y, 3, 0, Math.PI * 2)
      ctx.fillStyle = "rgba(255, 255, 255, 1)"
      ctx.fill()
    })

    // AVANÇA A POSIÇÃO — AUMENTE ESSE NÚMERO PARA ACELERAR
    progress += 4
    requestAnimationFrame(drawBorder)
  }

  drawBorder()
}