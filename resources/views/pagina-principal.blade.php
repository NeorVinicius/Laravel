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

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">EduTech</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="#cursos">Cursos</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Sobre</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Contato</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="hero-section text-center">
      <div class="container">
        <h1 class="display-4 fw-bold">Invista no seu Futuro</h1>
        <p class="lead">Cursos técnicos especializados com foco no mercado de trabalho.</p>
        <a href="#cursos" class="btn btn-primary btn-lg">Conhecer Cursos</a>
      </div>
    </header>

    <section id="cursos" class="container py-5">
      <h2 class="text-center mb-5">Nossas Áreas</h2>
      <div class="row g-4">
        
        <div class="col-md-6 col-lg-3">
          <div class="card h-100 shadow-sm">
            <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="Desenvolvimento">
            <div class="card-body text-center">
              <h5 class="card-title">Desenvolvimento de Sistemas</h5>
              <p class="card-text text-muted">Aprenda a criar softwares, sites e aplicativos com as tecnologias mais atuais.</p>
              <a href="#" class="btn btn-outline-dark">Ver mais</a>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="card h-100 shadow-sm">
            <img src="https://images.unsplash.com/photo-1454165833767-02750800600a?auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="Administração">
            <div class="card-body text-center">
              <h5 class="card-title">Administração</h5>
              <p class="card-text text-muted">Gestão estratégica, finanças e processos para liderar no mundo corporativo.</p>
              <a href="#" class="btn btn-outline-dark">Ver mais</a>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="card h-100 shadow-sm">
            <img src="https://images.unsplash.com/photo-1576602976047-174e57a47881?auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="Farmácia">
            <div class="card-body text-center">
              <h5 class="card-title">Farmácia</h5>
              <p class="card-text text-muted">Foco em manipulação, controle de medicamentos e assistência farmacêutica.</p>
              <a href="#" class="btn btn-outline-dark">Ver mais</a>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="card h-100 shadow-sm">
            <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="Meio Ambiente">
            <div class="card-body text-center">
              <h5 class="card-title">Meio Ambiente</h5>
              <p class="card-text text-muted">Estudo de sustentabilidade, leis ambientais e preservação de ecossistemas.</p>
              <a href="#" class="btn btn-outline-dark">Ver mais</a>
            </div>
          </div>
        </div>

      </div>
    </section>

    <footer class="bg-dark text-white text-center py-4">
      <p>&copy; 2026 EduTech Cursos - Todos os direitos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>