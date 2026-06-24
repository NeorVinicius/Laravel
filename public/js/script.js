const months = [
    "Janeiro", "Fevereiro", "Março", "Abril",
    "Maio", "Junho", "Julho", "Agosto",
    "Setembro", "Outubro", "Novembro", "Dezembro"
  ]
  
  const images = [
    "img/janeiro.jpg", "img/fevereiro.jpg", "img/marco.jpg",
    "img/abril.jpg", "img/maio.jpg", "img/junho.jpg",
    "img/julho.jpg", "img/agosto.jpg", "img/setembro.jpg",
    "img/outubro.jpg", "img/novembro.jpg", "img/dezembro.jpg"
  ]
  
  let current = new Date()
  let selectedDate = ""
  let editingKey = null
  let editingIndex = null
  
  const calendarEl   = document.getElementById("calendar")
  const monthTitle   = document.getElementById("monthTitle")
  const monthImage   = document.getElementById("monthImage")
  const monthNumber  = document.getElementById("monthNumber")
  const monthName    = document.getElementById("monthName")
  const selectedText = document.getElementById("selectedText")
  const textEl       = document.getElementById("text")
  const saveBtn      = document.getElementById("save")
  const cancelBtn    = document.getElementById("cancel")
  const savedEl      = document.getElementById("saved")
  const nextBtn      = document.getElementById("next")
  const prevBtn      = document.getElementById("prev")
  
  function render() {
    calendarEl.innerHTML = ""
  
    let y = current.getFullYear()
    let m = current.getMonth()
  
    monthTitle.innerText  = `${months[m]} ${y}`
    monthImage.src        = images[m]
    monthNumber.innerText = String(m + 1).padStart(2, "0")
    monthName.innerText   = months[m]
  
    let first = new Date(y, m, 1).getDay()
    let total = new Date(y, m + 1, 0).getDate()
  
    for (let i = 0; i < first; i++) {
      calendarEl.innerHTML += "<div></div>"
    }
  
    for (let d = 1; d <= total; d++) {
      let el = document.createElement("div")
      el.className = "day"
      el.innerText = d
      el.onclick = () => {
        document.querySelectorAll(".day").forEach(x => x.classList.remove("active"))
        el.classList.add("active")
        selectedDate = `${y}-${m + 1}-${d}`
        selectedText.innerText = `${d} de ${months[m]} de ${y}`
      }
      calendarEl.append(el)
    }
  }
  
  function loadAll() {
    savedEl.innerHTML = ""
  
    let allKeys = Object.keys(localStorage)
    let dateKeys = allKeys.filter(k => /^\d{4}-\d{1,2}-\d{1,2}$/.test(k))
  
    dateKeys.sort((a, b) => {
      let [ay, am, ad] = a.split("-").map(Number)
      let [by, bm, bd] = b.split("-").map(Number)
      return ay !== by ? ay - by : am !== bm ? am - bm : ad - bd
    })
  
    if (dateKeys.length === 0) {
      savedEl.innerHTML = "<p class='empty'>Nenhum lembrete salvo</p>"
      return
    }
  
    let groups = {}
    dateKeys.forEach(key => {
      let [y, m] = key.split("-").map(Number)
      let groupKey = `${y}-${m}`
      if (!groups[groupKey]) groups[groupKey] = []
      groups[groupKey].push(key)
    })
  
    Object.keys(groups).forEach(groupKey => {
      let [y, m] = groupKey.split("-").map(Number)
  
      let header = document.createElement("div")
      header.className = "month-group-header"
      header.innerText = `${months[m - 1]} ${y}`
      savedEl.appendChild(header)
  
      groups[groupKey].forEach(key => {
        let [ky, km, kd] = key.split("-").map(Number)
        let data = JSON.parse(localStorage.getItem(key)) || []
  
        data.forEach((item, index) => {
          let div = document.createElement("div")
          div.className = "item"
          div.innerHTML = `
            <small>${kd} de ${months[km - 1]} de ${ky}</small>
            <p class="item-text">${item}</p>
            <div class="item-actions">
              <button class="btn-edit" onclick="startEdit('${key}', ${index})">✏️ Editar</button>
              <button class="btn-remove" onclick="removeItem('${key}', ${index})">🗑️ Remover</button>
            </div>
          `
          savedEl.appendChild(div)
        })
      })
    })
  }
  
  function startEdit(key, index) {
    let data = JSON.parse(localStorage.getItem(key)) || []
    let [y, m, d] = key.split("-").map(Number)
  
    editingKey = key
    editingIndex = index
    selectedDate = key
  
    selectedText.innerText = `${d} de ${months[m - 1]} de ${y}`
    textEl.value = data[index]
    saveBtn.innerText = "Atualizar"
    cancelBtn.style.display = "block"
    textEl.focus()
  
    textEl.scrollIntoView({ behavior: "smooth", block: "center" })
  }
  
  function cancelEdit() {
    editingKey = null
    editingIndex = null
    textEl.value = ""
    saveBtn.innerText = "Salvar"
    cancelBtn.style.display = "none"
    selectedText.innerText = "Selecione um dia"
    selectedDate = ""
  }
  
  function removeItem(key, index) {
    if (!confirm("Remover este lembrete?")) return
  
    let data = JSON.parse(localStorage.getItem(key)) || []
    data.splice(index, 1)
  
    if (data.length === 0) {
      localStorage.removeItem(key)
    } else {
      localStorage.setItem(key, JSON.stringify(data))
    }
  
    if (editingKey === key && editingIndex === index) cancelEdit()
  
    loadAll()
  }
  
  saveBtn.onclick = () => {
    if (!selectedDate || !textEl.value.trim()) return
  
    if (editingKey !== null && editingIndex !== null) {
      let data = JSON.parse(localStorage.getItem(editingKey)) || []
      data[editingIndex] = textEl.value.trim()
      localStorage.setItem(editingKey, JSON.stringify(data))
      cancelEdit()
    } else {
      let data = JSON.parse(localStorage.getItem(selectedDate)) || []
      data.push(textEl.value.trim())
      localStorage.setItem(selectedDate, JSON.stringify(data))
      textEl.value = ""
    }
  
    loadAll()
  }
  
  cancelBtn.onclick = () => cancelEdit()
  
  nextBtn.onclick = () => { current.setMonth(current.getMonth() + 1); render() }
  prevBtn.onclick = () => { current.setMonth(current.getMonth() - 1); render() }
  
  render()
  loadAll()
  
  // Canvas — luz percorrendo a borda
  const canvas = document.getElementById("borderLight")
  const ctx = canvas.getContext("2d")
  
  function resizeCanvas() {
    const container = canvas.parentElement
    canvas.width = container.offsetWidth
    canvas.height = container.offsetHeight
  }
  
  resizeCanvas()
  window.addEventListener("resize", resizeCanvas)
  
  let progress = 0
  
  function getPosOnBorder(offset, w, h) {
    const perimeter = 2 * (w + h)
    offset = ((offset % perimeter) + perimeter) % perimeter
  
    if (offset < w) {
      return { x: offset, y: 0 }
    } else if (offset < w + h) {
      return { x: w, y: offset - w }
    } else if (offset < 2 * w + h) {
      return { x: w - (offset - w - h), y: h }
    } else {
      return { x: 0, y: h - (offset - 2 * w - h) }
    }
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
  
      // Cauda — rastro da luz
      for (let i = 0; i < 60; i++) {
        const tail = getPosOnBorder(offset - i, w, h)
        const alpha = (1 - i / 60) * 0.8
  
        ctx.beginPath()
        ctx.arc(tail.x, tail.y, 2, 0, Math.PI * 2)
        ctx.fillStyle = `rgba(0, 170, 255, ${alpha})`
        ctx.fill()
      }
  
      // Ponto de luz principal
      ctx.beginPath()
      ctx.arc(x, y, 3, 0, Math.PI * 2)
      ctx.fillStyle = "rgba(255, 255, 255, 1)"
      ctx.fill()
    })
  
    progress += 10
    requestAnimationFrame(drawBorder)
  }
  
  drawBorder()