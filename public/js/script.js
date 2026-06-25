const months = [
  "Janeiro", "Fevereiro", "Março", "Abril",
  "Maio", "Junho", "Julho", "Agosto",
  "Setembro", "Outubro", "Novembro", "Dezembro"
]

const images = [
  "janeiro", "fevereiro", "marco", "abril",
  "maio", "junho", "julho", "agosto",
  "setembro", "outubro", "novembro", "dezembro"
]

let current = (typeof mesInicial !== 'undefined')
  ? new Date(anoInicial, mesInicial, 1)
  : new Date()

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

function render() {
  if (calendarEl) calendarEl.innerHTML = ""

  let y = current.getFullYear()
  let m = current.getMonth()

  if (monthTitle)  monthTitle.innerText  = `${months[m]} ${y}`
  if (monthImage)  monthImage.src        = `/img/${images[m]}.jpeg`
  if (monthNumber) monthNumber.innerText = String(m + 1).padStart(2, "0")
  if (monthName)   monthName.innerText   = months[m]

  if (!calendarEl) return

  let first = new Date(y, m, 1).getDay()
  let total = new Date(y, m + 1, 0).getDate()

  for (let i = 0; i < first; i++) {
    calendarEl.innerHTML += "<div></div>"
  }

  for (let d = 1; d <= total; d++) {
    let el = document.createElement("div")
    el.className = "day"
    el.innerText = d

    if (
      diaInput && mesInput && anoInput &&
      d == diaInput.value &&
      (m + 1) == mesInput.value &&
      y == anoInput.value
    ) {
      el.classList.add("active")
    }

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

function filtrarLembretes() {
  const texto = document.getElementById("searchInput")?.value.toLowerCase().trim() || ""
  const mes   = document.getElementById("searchMonth")?.value || ""

  const items   = document.querySelectorAll(".item")
  const headers = document.querySelectorAll(".month-group-header")

  items.forEach(item => {
    const matchTexto = item.dataset.texto?.includes(texto)
    const matchMes   = mes ? item.dataset.mes === mes : true
    item.style.display = matchTexto && matchMes ? "flex" : "none"
  })

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

if (nextBtn) nextBtn.onclick = () => { current.setMonth(current.getMonth() + 1); render() }
if (prevBtn) prevBtn.onclick = () => { current.setMonth(current.getMonth() - 1); render() }

render()

// Canvas — luz percorrendo a borda
const canvas = document.getElementById("borderLight")
if (canvas) {
  const ctx = canvas.getContext("2d")

  function resizeCanvas() {
    canvas.width  = canvas.parentElement.offsetWidth
    canvas.height = canvas.parentElement.offsetHeight
  }

  resizeCanvas()
  window.addEventListener("resize", resizeCanvas)

  let progress = 0

  function getPosOnBorder(offset, w, h) {
    const perimeter = 2 * (w + h)
    offset = ((offset % perimeter) + perimeter) % perimeter
    if (offset < w)          return { x: offset, y: 0 }
    else if (offset < w + h) return { x: w, y: offset - w }
    else if (offset < 2*w+h) return { x: w - (offset - w - h), y: h }
    else                     return { x: 0, y: h - (offset - 2*w - h) }
  }

  function drawBorder() {
    const w = canvas.width
    const h = canvas.height
    const perimeter = 2 * (w + h)

    ctx.clearRect(0, 0, w, h)

    const offsets = [
      progress % perimeter,
      (progress + perimeter / 2) % perimeter
    ]

    offsets.forEach(offset => {
      const { x, y } = getPosOnBorder(offset, w, h)

      for (let i = 0; i < 60; i++) {
        const tail  = getPosOnBorder(offset - i, w, h)
        const alpha = (1 - i / 60) * 0.8
        ctx.beginPath()
        ctx.arc(tail.x, tail.y, 2, 0, Math.PI * 2)
        ctx.fillStyle = `rgba(0, 170, 255, ${alpha})`
        ctx.fill()
      }

      ctx.beginPath()
      ctx.arc(x, y, 3, 0, Math.PI * 2)
      ctx.fillStyle = "rgba(255, 255, 255, 1)"
      ctx.fill()
    })

    progress += 4
    requestAnimationFrame(drawBorder)
  }

  drawBorder()
}