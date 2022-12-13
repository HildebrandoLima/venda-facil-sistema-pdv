<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/logo.png') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'/>
        <script type="text/javascript" src={{ asset('js/abrirModalAutomaticamente.js') }}></script>
        <script type="text/javascript" src={{ asset('js/atalhosTeclado.js') }}></script>
        <script type="text/javascript" src={{ asset('js/exibirInput.js') }}></script>
        <script type="text/javascript" src={{ asset('js/menu.js') }}></script>
        <script type="text/javascript" src={{ asset('js/relogio.js') }}></script>
        <link rel="stylesheet" href="{{ asset('css/background-image.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/barra-vertical.css') }}" type="text/css">
        <script type="text/javascript" src={{ asset('js/scriptLoading') }}></script>
    </head>
    <body>

        <div class="container mt-3">
          <div class="row">
            <div class="col-sm-3">
              <div class="d-flex flex-column flex-shrink-0 p-3 text-dark bg-dark" style="width: 280px;">
                <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                  <span class="fs-4">VENDA FÁCIL - PDV</span>
                </a>
                <hr />
                <ul class=" mw-100 nav nav-pills flex-column mb-auto">
                  <li class="nav-item">
                    <a href="#" class="nav-link active" aria-current="page">
                      <span class="px-md-1 icon fa fa-folder"></span>
                      Dashboard
                    </a>
                  </li>
                  <li>
                    <a class="nav-link text-white align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-sale" aria-expanded="false">
                      <span class="px-md-1 icon fa fa-money"></span>
                      Vendas
                    </a>
                    <div class="collapse" id="dashboard-sale">
                      <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li class="px-md-5 mt-2">
                          <a href="#" title="Movimentação" style="text-decoration:none;" class="text-white rounded">
                            <span class="px-md-1 icon fa fa-bars"></span>
                            Movimentação
                          </a>
                        </li>
                        <li class="px-md-5 mt-2">
                          <a href="#" title="Sangria" style="text-decoration:none;" class="text-white rounded">
                            <span class="px-md-1 icon fa fa-money"></span>
                            Sangria
                          </a>
                        </li>
                        <li class="px-md-5 mt-2">
                          <a href="#" title="Troca" style="text-decoration:none;" class="text-white rounded">
                            <span class="px-md-1 icon fa fa-money"></span>
                            Troca
                          </a>
                        </li>
                        <li class="px-md-5 mt-2">
                          <a href="#" title="Devolução" style="text-decoration:none;" class="text-white rounded">
                            <span class="px-md-1 icon fa fa-money"></span>
                            Devolução
                          </a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li>
                    <a class="nav-link text-white align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-registers" aria-expanded="false">
                      <span class="px-md-1 icon fa fa-plus"></span>
                      Cadastros
                    </a>
                    <div class="collapse" id="dashboard-registers">
                      <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li class="px-md-5 mt-2">
                          <a href="#" title="Categoria" style="text-decoration:none;" class="text-white rounded">
                            <span class="px-md-1 icon fa fa-barcode"></span>
                            Categoria
                          </a>
                        </li>
                        <li class="px-md-5 mt-2">
                          <a href="#" title="Produto" title="Produto" style="text-decoration:none;" class="text-white rounded">
                            <span class="px-md-1 icon fa fa-barcode"></span>
                            Produto
                          </a>
                        </li>
                        <li class="px-md-5 mt-2">
                          <a href="#" title="Estoque" style="text-decoration:none;" class="text-white rounded">
                            <span class="px-md-1 icon fa fa-check"></span>
                            Estoque
                          </a>
                        </li>
                        <li class="px-md-5 mt-2">
                          <a href="#" title="Cliente" style="text-decoration:none;" class="text-white rounded">
                            <span class="px-md-1 icon fa fa-user"></span>
                            Cliente
                          </a>
                        </li>
                        <li class="px-md-5 mt-2">
                          <a href="#" title="Fornecedor" style="text-decoration:none;" class="text-white rounded">
                            <span class="px-md-1 icon fa fa-user"></span>
                            Fornecedor
                          </a>
                        </li>
                      </ul>
                    </div>
                  </li>
                </ul>
                <hr />
                <div class="dropdown">
                  <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="#" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>+</strong>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="#">Configurações</a></li>
                    <li><a class="dropdown-item" href="#">Meu Perfil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Sair</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-sm-9">
              @yield('body')
            </div>
          </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>