<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EduTech - Nossos Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .hero-section {
        background: #f8f9fa;
        padding: 60px 0;
      }
      .card-img-top {
        height: 200px;
        object-fit: cover;
      }
    </style>
  </head>
  <body>

  <section id="contato" class="py-5">
  <div class="container">
    <h2 class="text-center fw-bold mb-5">Entre em Contato</h2>
    <div class="row g-5">
      
      <div class="col-md-7">
        <form>
          <div class="mb-3">
            <label for="nome" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" id="nome" placeholder="Seu nome aqui">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" placeholder="nome@exemplo.com">
          </div>
          <div class="mb-3">
            <label for="assunto" class="form-label">Curso de Interesse</label>
            <select class="form-select" id="assunto">
              <option selected>Selecione um curso...</option>
              <option value="1">Desenvolvimento de Sistemas</option>
              <option value="2">Administração</option>
              <option value="3">Farmácia</option>
              <option value="4">Meio Ambiente</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="mensagem" class="form-label">Mensagem</label>
            <textarea class="form-control" id="mensagem" rows="4" placeholder="Como podemos ajudar?"></textarea>
          </div>
          <button type="submit" class="btn btn-dark w-100 py-2">Enviar Mensagem</button>
        </form>
      </div>

      <div class="col-md-5">
        <div class="bg-dark text-white p-4 rounded h-100">
          <h4 class="mb-4">Informações</h4>
          <div class="mb-4">
            <p class="mb-1 fw-bold">📍 Endereço</p>
            <p class="text-secondary">Av. Paulista, 1000 - São Paulo, SP</p>
          </div>
          <div class="mb-4">
            <p class="mb-1 fw-bold">📞 Telefone</p>
            <p class="text-secondary">(11) 4002-8922</p>
          </div>
          <div class="mb-4">
            <p class="mb-1 fw-bold">✉️ E-mail</p>
            <p class="text-secondary">contato@edutech.com.br</p>
          </div>
          <hr class="border-secondary">
          <h5 class="mt-4">Horário de Atendimento</h5>
          <p class="text-secondary mb-0">Segunda a Sexta: 08:00 às 22:00</p>
          <p class="text-secondary">Sábado: 09:00 às 13:00</p>
        </div>
      </div>

    </div>
  </div>
</section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>