<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title Meta -->
    <meta charset="utf-8" />
    <title>@yield('title') | {{ env('APP_NAME') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="/favicon.ico">

    <!-- Vendor css (Require in all Page) -->
    <link href="/assets_admin/css/vendor.min.css" rel="stylesheet" type="text/css" />

    <!-- Icons css (Require in all Page) -->
    <link href="/assets_admin/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- App css (Require in all Page) -->
    <link href="/assets_admin/css/app.min.css" rel="stylesheet" type="text/css" />

    <!-- Theme Config js (Require in all Page) -->
    <script src="/assets_admin/js/config.min.js"></script>

    @yield('css')
</head>

<body>

    <!-- START Wrapper -->
    <div class="wrapper">

        <!-- ========== Topbar Start ========== -->
        <header class="">
            <div class="topbar">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <div class="d-flex align-items-center gap-2">
                            <!-- Menu Toggle Button -->
                            <div class="topbar-item">
                                <button type="button" class="button-toggle-menu topbar-button">
                                    <i class="ri-menu-2-line fs-24"></i>
                                </button>
                            </div>

                            <!-- App Search-->
                            <form action="{{ route('product.search') }}" class="app-search d-none d-md-block me-auto">
                                <div class="position-relative">
                                    <input type="search" class="form-control border-0" style="width: 135%"
                                        placeholder="Digite o título para procurar..." autocomplete="off"
                                        name="busca">
                                    <i class="ri-search-line search-widget-icon"></i>
                                </div>
                            </form>
                        </div>

                        <div class="d-flex align-items-center gap-1">
                            <!-- Theme Color (Light/Dark) -->
                            <div class="topbar-item">
                                <button type="button" class="topbar-button" id="light-dark-mode">
                                    <i class="ri-moon-line fs-24 light-mode"></i>
                                    <i class="ri-sun-line fs-24 dark-mode"></i>
                                </button>
                            </div>

                            <!-- Category -->
                            <div class="dropdown topbar-item d-none d-lg-flex">
                                <button type="button" class="topbar-button" data-toggle="fullscreen">
                                    <i class="ri-fullscreen-line fs-24 fullscreen"></i>
                                    <i class="ri-fullscreen-exit-line fs-24 quit-fullscreen"></i>
                                </button>
                            </div>

                            <!-- Notification -->

                            <!-- Theme Setting -->
                            <div class="topbar-item d-none d-md-flex">
                                <button type="button" class="topbar-button" id="theme-settings-btn"
                                    data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas"
                                    aria-controls="theme-settings-offcanvas">
                                    <i class="ri-settings-4-line fs-24"></i>
                                </button>
                            </div>

                            <!-- User -->
                            <div class="dropdown topbar-item">
                                <a type="button" class="topbar-button" id="page-header-user-dropdown"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="d-flex align-items-center">
                                        <img class="rounded-circle" width="32"
                                            src="/assets_admin/images/users/avatar.ico" alt="avatar-3">
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <h6 class="dropdown-header">Bem-vindo,
                                        {{ isset(Auth::user()->name) ? Auth::user()->name : 'usuário' }}!</h6>

                                    <a class="dropdown-item" href="{{ route('admin.index') }}">
                                        <i class="ri-dashboard-2-line align-middle me-2 fs-18"></i><span
                                            class="align-middle">Painel</span>
                                    </a>
                                    <a class="dropdown-item" href="{{ route('banner.index') }}">
                                        <i class="ri-flag-fill align-middle me-2 fs-18"></i><span
                                            class="align-middle">Banners</span>
                                    </a>
                                    {{-- <a class="dropdown-item" href="{{ route('blog.index') }}">
                                        <i class="ri-news-line align-middle me-2 fs-18"></i><span
                                            class="align-middle">Blog</span>
                                    </a> --}}
                                    <a class="dropdown-item" href="{{ route('product.index') }}">
                                        <i class="ri-box-3-fill align-middle me-2 fs-18"></i><span
                                            class="align-middle">Seguros e Consórcios</span>
                                    </a>
                                    <a class="dropdown-item" href="{{ route('categories.index') }}">
                                        <i class="ri-book-shelf-fill align-middle me-2 fs-18"></i><span
                                            class="align-middle">Categorias</span>
                                    </a>
                                    <a class="dropdown-item" href="{{ route('corretores.index') }}">
                                        <i class="ri-user-fill align-middle me-2 fs-18"></i><span
                                            class="align-middle">Corretores</span>
                                    </a>
                                    <a class="dropdown-item" href="{{ route('leads.index') }}">
                                        <i class="ri-group-fill align-middle me-2 fs-18"></i><span
                                            class="align-middle">Leads</span>
                                    </a>


                                    <div class="dropdown-divider my-1"></div>

                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="ri-logout-box-r-line align-middle me-2 fs-18"></i><span
                                                class="align-middle">Sair</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Right Sidebar (Theme Settings) -->
        <div>
            <div class="offcanvas offcanvas-end border-0 rounded-start-4 overflow-hidden" tabindex="-1"
                id="theme-settings-offcanvas">
                <div class="d-flex align-items-center bg-primary p-3 offcanvas-header">
                    <h5 class="text-white m-0">Personalizar menu</h5>
                    <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>

                <div class="offcanvas-body p-0">
                    <div data-simplebar class="h-100">
                        <div class="p-3 settings-bar">

                            <div>
                                <h5 class="mb-3 font-16 fw-semibold">Color Scheme</h5>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-bs-theme"
                                        id="layout-color-light" value="light">
                                    <label class="form-check-label" for="layout-color-light">Light</label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-bs-theme"
                                        id="layout-color-dark" value="dark">
                                    <label class="form-check-label" for="layout-color-dark">Dark</label>
                                </div>
                            </div>

                            <div>
                                <h5 class="my-3 font-16 fw-semibold">Cor da barra superior</h5>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-topbar-color"
                                        id="topbar-color-light" value="light">
                                    <label class="form-check-label" for="topbar-color-light">Clara</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-topbar-color"
                                        id="topbar-color-dark" value="dark">
                                    <label class="form-check-label" for="topbar-color-dark">Escura</label>
                                </div>
                            </div>


                            <div>
                                <h5 class="my-3 font-16 fw-semibold">Cor do Menu</h5>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-menu-color"
                                        id="leftbar-color-light" value="light">
                                    <label class="form-check-label" for="leftbar-color-light">
                                        Claro
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-menu-color"
                                        id="leftbar-color-dark" value="dark">
                                    <label class="form-check-label" for="leftbar-color-dark">
                                        Escuro
                                    </label>
                                </div>
                            </div>

                            <div>
                                <h5 class="my-3 font-16 fw-semibold">Modos da barra lateral</h5>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-menu-size"
                                        id="leftbar-size-default" value="default">
                                    <label class="form-check-label" for="leftbar-size-default">
                                        Padrão
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-menu-size"
                                        id="leftbar-size-small" value="condensed">
                                    <label class="form-check-label" for="leftbar-size-small">
                                        Condesada
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-menu-size"
                                        id="leftbar-hidden" value="hidden">
                                    <label class="form-check-label" for="leftbar-hidden">
                                        Oculta
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-menu-size"
                                        id="leftbar-size-small-hover-active" value="sm-hover-active">
                                    <label class="form-check-label" for="leftbar-size-small-hover-active">
                                        Pequena quando passar o mouse
                                    </label>
                                </div>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="data-menu-size"
                                        id="leftbar-size-small-hover" value="sm-hover">
                                    <label class="form-check-label" for="leftbar-size-small-hover">
                                        Pequena Hover
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ========== Topbar End ========== -->

        <!-- ========== App Menu Start ========== -->
        <div class="main-nav">
            <!-- Sidebar Logo -->
            <a href="/dashboard">
                <div class="logo-box">
                    <div class="flex align-items-center space-x-3"
                        style=" display: flex; align-items: center; gap: 10px;">
                        <div class="relative h-8 w-8" style="width: 2rem; position: relative;">
                            <div style="position: absolute;width: 2rem;top: -50%;transform: translateY(-50%);display: flex;justify-content: center;"
                                class="inset-0 flex items-center justify-center"><img
                                    src="/assets_admin/images/logo-icon.ico" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="text-lg font-bold text-white" style="font-size: 1.125rem; font-weight: 700">
                            <span>Cerrado Consórcios</span>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Menu Toggle Button (sm-hover) -->
            <button type="button" class="button-sm-hover" aria-label="Show Full Sidebar">
                <i class="ri-menu-2-line fs-24 button-sm-hover-icon"></i>
            </button>

            <div class="scrollbar" data-simplebar>

                <ul class="navbar-nav" id="navbar-nav">

                    <li class="menu-title">Menu</li>

                    <li class="nav-item">
                        <a class="nav-link" href={{ route('admin.index') }}>
                            <span class="nav-icon">
                                <i class="ri-dashboard-2-line"></i>
                            </span>
                            <span class="nav-text">Painel de Controle</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-arrow" href="#sidebarBanners" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarBanners">
                            <span class="nav-icon">
                                <i class="ri-flag-fill"></i>
                            </span>
                            <span class="nav-text"> Banners </span>
                        </a>
                        <div class="collapse" id="sidebarBanners">
                            <ul class="nav sub-navbar-nav">
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="{{ route('banner.create') }}">Adicionar novo
                                        banner</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="{{ route('banner.index') }}">Ver todos os
                                        banners</a>
                                </li>
                            </ul>
                        </div>
                    </li> <!-- end Pages Menu -->

                    <li class="nav-item">
                        <a class="nav-link menu-arrow" href="#sidebarProducts" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarProducts">
                            <span class="nav-icon">
                                <i class="ri-box-3-fill"></i>
                            </span>
                            <span class="nav-text"> Seguros e Consórcios </span>
                        </a>
                        <div class="collapse" id="sidebarProducts">
                            <ul class="nav sub-navbar-nav">
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="{{ route('product.create') }}">Adicionar novo <br>
                                        Seguro / Consórcio</a>
                                </li>

                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="{{ route('product.index') }}">Ver todos os <br>
                                        Seguros / Consórcios</a>
                                </li>
                                {{-- <li class="sub-nav-item disabled">
                                    <a class="sub-nav-link" href="property-details.html">Estátisicas dos Seguros</a>
                                </li> --}}
                            </ul>
                        </div>
                    </li> <!-- end Pages Menu -->

                    <li class="nav-item">
                        <a class="nav-link menu-arrow" href="#sidebarCategories" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarCategories">
                            <span class="nav-icon">
                                <i class="ri-book-shelf-fill"></i>
                            </span>
                            <span class="nav-text"> Categorias </span>
                        </a>
                        <div class="collapse" id="sidebarCategories">
                            <ul class="nav sub-navbar-nav">
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="{{ route('categories.create') }}">Adicionar nova
                                        categoria</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="{{ route('categories.index') }}">Ver todos as
                                        categorias</a>
                                </li>
                                <li class="sub-nav-item disabled">
                                    <a class="sub-nav-link" href="property-details.html">Estátisicas dos Seguros</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="menu-title">Corretores e Leads</li>

                    <li class="nav-item">
                        <a class="nav-link menu-arrow" href="#sidebarcorretores" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarcorretores">
                            <span class="nav-icon">
                                <i class="ri-user-fill"></i>
                            </span>
                            <span class="nav-text"> Corretores </span>
                        </a>
                        <div class="collapse" id="sidebarcorretores">
                            <ul class="nav sub-navbar-nav">
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="{{ route('corretores.create') }}">Adicionar novo
                                        corretor</a>
                                </li>
                                <li class="sub-nav-item">
                                    <a class="sub-nav-link" href="{{ route('corretores.index') }}">Ver todos os
                                        corretores</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href={{ route('leads.index') }}>
                            <span class="nav-icon">
                                <i class="ri-group-fill"></i>
                            </span>
                            <span class="nav-text">Leads</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        @yield('content')
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> &copy; - Desenvolvido por <a href="https://agenciaevidence.com.br"
                            target="_blank">Agência
                            Evidence</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Vendor Javascript (Require in all Page) -->
    <script src="/assets_admin/js/vendor.js"></script>

    <!-- App Javascript (Require in all Page) -->
    <script src="/assets_admin/js/app.js"></script>

    <!-- Vector Map Js -->
    <script src="/assets_admin/vendor/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="/assets_admin/vendor/jsvectormap/maps/world-merc.js"></script>
    <script src="/assets_admin/vendor/jsvectormap/maps/world.js"></script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css">
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>

    <script>
        Fancybox.bind("[data-fancybox]", {
            scrollLock: true,
            Thumbs: {
                autoStart: true,
            },
            image: {
                fit: "contain",
            },
            video: {
                fit: "contain",
            },
        });
    </script>
    @yield('js')
</body>

</html>
