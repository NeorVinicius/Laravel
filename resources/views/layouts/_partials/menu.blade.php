<!-- <div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <a href="{{ route('principal') }}">Principal</a>
        </div>
        <div class="col-3">
            <a href="route('sobre')">Sobre</a>
        </div>
        <div class="col-3">
            <a href="route('produtos')">Produtos</a>
        </div>
        <div class="col-3">
            <a href="route('')">Contato</a>
        </div>
    </div>
</div> -->


<style>
        /* Estilização personalizada baseada em Preto e Vermelho */
        .navbar-custom {
            background-color: #0b0b0b; /* Preto profundo */
            border-bottom: 3px solid #e50914; /* Vermelho vibrante */
            padding: 15px 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
        }

        .navbar-custom .nav-link-custom {
            color: #e0e0e0; /* Cinza claro para boa leitura */
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: block;
            text-align: center;
            padding: 10px;
            border-radius: 6px;
            transition: all 0.3s ease-in-out;
            position: relative;
        }

        /* Efeito ao passar o mouse */
        .navbar-custom .nav-link-custom:hover {
            color: #ffffff;
            background-color: rgba(229, 9, 20, 0.15); /* Fundo vermelho translúcido */
            transform: translateY(-2px);
        }

        /* Linha indicadora elegante no hover */
        .navbar-custom .nav-link-custom::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 5px;
            left: 50%;
            background-color: #e50914;
            transition: all 0.3s ease-in-out;
            transform: translateX(-50%);
        }

        .navbar-custom .nav-link-custom:hover::after {
            width: 60%;
        }
    </style>
</head>
<body class="bg-light">

    <div class="container-fluid navbar-custom">
        <div class="row text-center align-items-center">
            <div class="col-3">
                <a href="{{ route('principal') }}" class="nav-link-custom">Principal</a>
            </div>
            <div class="col-3">
                <a href="{{ route('sobre') }}" class="nav-link-custom">Sobre</a>
            </div>
            <div class="col-3">
                <a href="{{ route('produtos') }}" class="nav-link-custom">Produtos</a>
            </div>
            <div class="col-3">
                <a href="{{ route('contato') }}" class="nav-link-custom">Contato</a>
            </div>
        </div>
    </div>