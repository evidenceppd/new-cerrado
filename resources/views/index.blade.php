@extends('layouts.master')

@section('title')
    Cerrado Seguros e Consórcios do Japonês | A parceria certa para alavancar seu negócio.
@endsection

@section('seo')
    <meta name="title" content="Cerrado Seguros e Consórcios do Japonês | A parceria certa para alavancar seu negócio." />
    <meta name="description"
        content="Oferecemos uma proteção completa e personalizada para você e toda a sua família. Com anos de experiência e um compromisso inabalável, garantimos tranquilidade, segurança e bem-estar em todos os momentos da sua vida." />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ route('index') }}" />
    <meta property="og:title"
        content="Cerrado Seguros e Consórcios do Japonês | A parceria certa para alavancar seu negócio." />
    <meta property="og:description"
        content="Oferecemos uma proteção completa e personalizada para você e toda a sua família. Com anos de experiência e um compromisso inabalável, garantimos tranquilidade, segurança e bem-estar em todos os momentos da sua vida." />
    <meta property="og:image" content="{{ route('index') }}/assets/images/home/2-man.jpg" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="{{ route('index') }}" />
    <meta property="twitter:title"
        content="Cerrado Seguros e Consórcios do Japonês | A parceria certa para alavancar seu negócio." />
    <meta property="twitter:description"
        content="Oferecemos uma proteção completa e personalizada para você e toda a sua família. Com anos de experiência e um compromisso inabalável, garantimos tranquilidade, segurança e bem-estar em todos os momentos da sua vida." />
    <meta property="twitter:image" content="{{ route('index') }}/assets/images/home/2-man.jpg" />
@endsection

@section('css')
@endsection

@section('content')
    <main class="wrapper">
        <section class="banner-home-index">
            <div class="container">
                <div class="conteudo">
                    <div class="header-container">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h1 class="title">Proteja o que<br><span>realmente importa!</span></h1>
                                <p class="subtitle">Soluções completas em segurança e conforto para sua família, residência
                                    e
                                    patrimônio.</p>
                                <div class="boxs">
                                    <div class="item-box"><img src="/assets/images/icons/casa.svg" alt="Ícone da Casa">
                                    </div>
                                    <div class="item-box"><img src="/assets/images/icons/family.svg"
                                            alt="Ícone de uma família"></div>
                                    <div class="item-box"><img src="/assets/images/icons/cap.svg"
                                            alt="Ícone de um capacete"></div>
                                    <div class="item-box"><img src="/assets/images/icons/car.svg" alt="Ícone de um carro">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box-right">
                                    <div class="box-header">
                                        <h3>+ segurança e Conforto</h3>
                                    </div>
                                    <div class="box-content">
                                        <p>Oferecemos uma proteção completa e personalizada para você e toda a sua família.
                                            Com anos de experiência e um compromisso inabalável, garantimos tranquilidade,
                                            segurança e bem-estar em todos os momentos da sua vida.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="carrossel-title">
                <div class="text">Cerrado <br> Seguros</div>
                <swiper-container style="margin-top: -255px;" class="mySwiper" init="false">
                    <swiper-slide><img src="/assets/images/seguros/1.png" alt=""></swiper-slide>
                    <swiper-slide><img src="/assets/images/seguros/2.png" alt=""></swiper-slide>
                    <swiper-slide><img src="/assets/images/seguros/3.png" alt=""></swiper-slide>
                    <swiper-slide><img src="/assets/images/seguros/4.png" alt=""></swiper-slide>
                    <swiper-slide><img src="/assets/images/seguros/5.png" alt=""></swiper-slide>
                    <swiper-slide><img src="/assets/images/seguros/6.png" alt=""></swiper-slide>
                    <swiper-slide><img src="/assets/images/seguros/7.png" alt=""></swiper-slide>
                    <swiper-slide><img src="/assets/images/seguros/8.png" alt=""></swiper-slide>
                    <swiper-slide><img src="/assets/images/seguros/5.png" alt=""></swiper-slide>
                </swiper-container>
            </div>
        </section>

        <section data="pessoal" class="banner-home-topo">
            <div class="container">
                <div class="conteudo">
                    <div class="header-container">
                        <div class="row">
                            <div class="col-md-5">
                                <hr>
                                <h1 style="font-family: 'Titillium Web', sans-serif;" class="title">CERRADO SEGUROS E
                                    CONSÓRCIOS</h1>
                                <p class="subtitle">Conheça nossas opções,<br>e contrate agora mesmo seu seguro.</p>

                                <div class="toggle-container">
                                    <span>Para Você</span>
                                    <div aria-label="Alternar topo" class="toggle"></div>
                                    <span>Para sua Empresa</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="cards-container">
                        <div class="conteudo">

                            <div index="1" class="cards cards-pessoal active primeiro">
                                <img aria-label="Voltar" class="seta-slider seta-slider-esq"
                                    src="/assets/images/icons/seta-slider.svg" />
                                <img aria-label="Avançar" class="seta-slider seta-slider-dir"
                                    src="/assets/images/icons/seta-slider.svg" />

                                <div class="slider slider-nav">
                                    @foreach ($categories_geral as $item)
                                        <div class="card-banner">
                                            <a draggable="false" href="{{ $item->link }}"
                                                class="item-link-produto utm_cotacao" target=""
                                                rel="noopener noreferrer" style="text-decoration: none;" role="button"
                                                aria-expandedaria-label="Cotar {{ $item->name }}"
                                                alt="{{ $item->name }}" title="Acessar {{ $item->name }}">

                                                <div class="card-nova-home">
                                                    <div class="card-logo">
                                                        @if ($item->icon_path != 'Nada enviado')
                                                            <img class="icone" src="{{ $item->icon_path }}"
                                                                class="img-lazy-loading" src=""
                                                                alt="{{ $item->name }}"
                                                                title="assets/icons/home/icon-seguro-residencial.svg">
                                                        @endif

                                                    </div>
                                                    <div>
                                                        <h2 class="card-txt">{{ $item->name }}</h2>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach


                                    {{-- <div class="card-banner">
                                        <a draggable="false" href="/seguro" class="item-link-produto utm_cotacao"
                                            target="" rel="noopener noreferrer" style="text-decoration: none;"
                                            role="button" aria-expandedaria-label="Cotar Seguro Viagem"
                                            alt="Seguro Viagem" title="Acessar Seguro Viagem">

                                            <div class="card-nova-home">
                                                <div class="card-logo">
                                                    <img class="icone" src="/assets/images/icons/Viagem.png"
                                                        class="img-lazy-loading" src="" alt="Seguro Viagem"
                                                        title="/assets/icons/home/land.svg">
                                                </div>
                                                <div>
                                                    <h2 class="card-txt">Seguro Viagem</h2>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-banner">
                                        <a draggable="false" href="" class="item-link-produto utm_cotacao"
                                            target="" rel="noopener noreferrer" style="text-decoration: none;"
                                            role="button" aria-expandedaria-label="Cotar Seguro Vida" alt="Seguro Vida"
                                            title="Acessar Seguro Vida">

                                            <div class="card-nova-home">
                                                <div class="card-logo">
                                                    <img class="icone" src="/assets/images/icons/Vida.png"
                                                        class="img-lazy-loading" src="" alt="Seguro Vida"
                                                        title="/assets/icons/home/icon-seguro-vida.svg">
                                                </div>
                                                <div>
                                                    <h2 class="card-txt">Seguro Vida</h2>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-banner">
                                        <a draggable="false" href="/seguro" class="item-link-produto utm_cotacao"
                                            target="" rel="noopener noreferrer" style="text-decoration: none;"
                                            role="button" aria-expandedaria-label="Cotar Seguro Funeral +"
                                            alt="Seguro Funeral +" title="Acessar Seguro Funeral +">

                                            <div class="card-nova-home">
                                                <div class="card-logo">
                                                    <img class="icone" src="/assets/images/icons/Funeral.png"
                                                        class="img-lazy-loading" src="" alt="Seguro Funeral +"
                                                        title="images\home-icon\home-cards-seguro-vida-funeral-branco.svg">
                                                </div>
                                                <div>
                                                    <h2 class="card-txt">Seguro Funeral +</h2>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-banner">
                                        <a draggable="false" href="" class="item-link-produto utm_cotacao"
                                            target="" rel="noopener noreferrer" style="text-decoration: none;"
                                            role="button" aria-expandedaria-label="Cotar Seguro Auto" alt="Seguro Auto"
                                            title="Acessar Seguro Auto">

                                            <div class="card-nova-home">
                                                <div class="card-logo">
                                                    <img class="icone" src="/assets/images/icons/Auto.png"
                                                        class="img-lazy-loading" src="" alt="Seguro Auto"
                                                        title="assets/icons/home/icon-carro.svg">
                                                </div>
                                                <div>
                                                    <h2 class="card-txt">Seguro Auto</h2>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-banner">
                                        <a draggable="false" href="" class="item-link-produto utm_cotacao"
                                            target="" rel="noopener noreferrer" style="text-decoration: none;"
                                            role="button" aria-expandedaria-label="Cotar Seguro de Moto"
                                            alt="Seguro de Moto" title="Acessar Seguro de Moto">

                                            <div class="card-nova-home">
                                                <div class="card-logo">
                                                    <img class="icone" src="/assets/images/icons/Moto3.png"
                                                        class="img-lazy-loading" src="" alt="Seguro de Moto"
                                                        title="assets/icons/home/icon-seguro-moto.svg">
                                                </div>
                                                <div>
                                                    <h2 class="card-txt">Seguro de Moto</h2>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-banner">
                                        <a draggable="false" href="" class="item-link-produto utm_cotacao"
                                            target="" rel="noopener noreferrer" style="text-decoration: none;"
                                            role="button" aria-expandedaria-label="Cotar Seguro Aluguel"
                                            alt="Seguro Aluguel" title="Acessar Seguro Aluguel">

                                            <div class="card-nova-home">
                                                <div class="card-logo">
                                                    <img class="icone" src="/assets/images/icons/Aluguel-1.png"
                                                        class="img-lazy-loading" src="" alt="Seguro Aluguel"
                                                        title="/assets/icons/home/icon-seguro-aluguel.svg">
                                                </div>
                                                <div>
                                                    <h2 class="card-txt">Seguro Aluguel</h2>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-banner">
                                        <a draggable="false" href="" class="item-link-produto utm_cotacao"
                                            target="" rel="noopener noreferrer" style="text-decoration: none;"
                                            role="button" aria-expandedaria-label="Cotar Seguro Estagiário"
                                            alt="Seguro Estagiário" title="Acessar Seguro Estagiário">

                                            <div class="card-nova-home">
                                                <div class="card-logo">
                                                    <img class="icone" src="/assets/images/icons/Estagiario.png"
                                                        class="img-lazy-loading" src="" alt="Seguro Estagiário"
                                                        title="assets/icons/home/icon-seguro-acidentes-estagiario.svg">
                                                </div>
                                                <div>
                                                    <h2 class="card-txt">Seguro Estagiário</h2>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-banner">
                                        <a draggable="false" href="" class="item-link-produto utm_cotacao"
                                            target="" rel="noopener noreferrer" style="text-decoration: none;"
                                            role="button" aria-expandedaria-label="Cotar Seguro Acidentes Pessoais"
                                            alt="Seguro Acidentes Pessoais" title="Acessar Seguro Acidentes Pessoais">

                                            <div class="card-nova-home">
                                                <div class="card-logo">
                                                    <img class="icone" src="/assets/images/icons/Acidentes-Pessoais.png"
                                                        class="img-lazy-loading" src=""
                                                        alt="Seguro Acidentes Pessoais"
                                                        title="assets/icons/home/icon-seguro-acidentes-pessoais.svg">
                                                </div>
                                                <div>
                                                    <h2 class="card-txt">Seguro Acidentes Pessoais</h2>
                                                </div>
                                            </div>
                                        </a>
                                    </div> --}}
                                </div>
                            </div>

                            <div index="1" class="cards cards-empresarial primeiro">
                                <img aria-label="Voltar" class="seta-slider seta-slider-esq"
                                    src="/assets/images/icons/seta-slider.svg" />
                                <img aria-label="Avançar" class="seta-slider seta-slider-dir"
                                    src="/assets/images/icons/seta-slider.svg" />

                                <div class="slider slider-nav">
                                    @foreach ($categories_para_empresa as $item)
                                        <div class="card-banner">
                                            <a draggable="false" href="{{ $item->link }}"
                                                class="item-link-produto utm_cotacao" target=""
                                                rel="noopener noreferrer" style="text-decoration: none;"
                                                alt="{{ $item->name }}" title="Acessar {{ $item->name }}">

                                                <div class="card-nova-home">
                                                    <div class="card-logo">
                                                        @if ($item->icon_path != 'Nada enviado')
                                                            <img class="icone" src="{{ $item->icon_path }}"
                                                                class="img-lazy-loading" src=""
                                                                alt="{{ $item->name }}" title="">
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <h2 class="card-txt">{{ $item->name }}</h2>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach


                                    {{-- <div class="card-banner">
                                        <a draggable="false" href="" class="item-link-produto utm_cotacao"
                                            target="" rel="noopener noreferrer" style="text-decoration: none;"
                                            alt="Seguro Aluguel" title="Acessar Seguro Aluguel">

                                            <div class="card-nova-home">
                                                <div class="card-logo">
                                                    <img class="icone" src="/assets/images/icons/Aluguel.png"
                                                        class="img-lazy-loading" src="" alt="Seguro Aluguel"
                                                        title="">
                                                </div>
                                                <div>
                                                    <h2 class="card-txt">Seguro Aluguel</h2>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-banner">
                                        <a draggable="false" href="" class="item-link-produto utm_cotacao"
                                            target="" rel="noopener noreferrer" style="text-decoration: none;"
                                            alt="Seguro Condomínio" title="Acessar Seguro Condomínio">

                                            <div class="card-nova-home">
                                                <div class="card-logo">
                                                    <img class="icone" src="/assets/images/icons/Condominio.png"
                                                        class="img-lazy-loading" src="" alt="Seguro Condomínio"
                                                        title="">
                                                </div>
                                                <div>
                                                    <h2 class="card-txt">Seguro Condomínio</h2>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-banner">
                                        <a draggable="false" href="" class="item-link-produto utm_cotacao"
                                            target="" rel="noopener noreferrer" style="text-decoration: none;"
                                            alt="Seguro Transportes" title="Acessar Seguro Transportes">

                                            <div class="card-nova-home">
                                                <div class="card-logo">
                                                    <img class="icone" src="/assets/images/icons/Transportes.png"
                                                        class="img-lazy-loading" src="" alt="Seguro Transportes"
                                                        title="">
                                                </div>
                                                <div>
                                                    <h2 class="card-txt">Seguro Transportes</h2>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-banner">
                                        <a draggable="false" href="" class="item-link-produto utm_cotacao"
                                            target="" rel="noopener noreferrer" style="text-decoration: none;"
                                            alt="Riscos de Engenharia" title="Acessar Riscos de Engenharia">

                                            <div class="card-nova-home">
                                                <div class="card-logo">
                                                    <img class="icone" src="/assets/images/icons/Engenharia2.png"
                                                        class="img-lazy-loading" src=""
                                                        alt="Riscos de Engenharia" title="">
                                                </div>
                                                <div>
                                                    <h2 class="card-txt">Riscos de Engenharia</h2>
                                                </div>
                                            </div>
                                        </a>
                                    </div> --}}
                                </div>
                            </div>

                            <div class="arrow-down toggle-arrow">
                                <a aria-label="Rolar para baixo" href="#acesse-de-forma-rapida-os-serviços">
                                    <svg width="38" height="21" viewBox="0 0 38 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M1.34191 2.58095C1.07695 2.2966 0.932708 1.92051 0.939564 1.5319C0.94642 1.1433 1.10384 0.772533 1.37867 0.497707C1.6535 0.222881 2.02427 0.0654559 2.41287 0.0585994C2.80147 0.051743 3.17756 0.195991 3.46191 0.460951L19.4619 16.4609L34.9019 0.460949C35.1863 0.195989 35.5624 0.0517415 35.951 0.0585979C36.3396 0.0654544 36.7103 0.22288 36.9852 0.497706C37.26 0.772532 37.4174 1.1433 37.4243 1.5319C37.4311 1.9205 37.2869 2.2966 37.0219 2.58095L19.4619 20.4239L1.34191 2.58095Z"
                                            fill="white" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="banner-seguro-vida"></section>
        <section class="acesse-de-forma-rapida-os-serviços" id="acesse-de-forma-rapida-os-serviços"
            style="background: #f4f6f5;">
            <div class="container">
                <hr>
                <h2 class="title">Acesse de forma rápida os serviços.</h2>
                <p class="text">Escolha abaixo o que você precisa e acesse os principais serviços e assistências.
                    Estamos aqui para facilitar o seu dia a dia.</p>

                <div class="row">
                    <div class="col-12  col-md-5">
                        <img loading="lazy" class="celular" alt="Acesse de forma rápida os serviços"
                            title="Conheça nossos serviços  e Acesse de forma rápida" src="/assets/images/home/1-man.jpg"
                            style="border-radius: 16px;" alt="">
                    </div>
                    <div class="col-12 col-md-7" id="menubar" aria-orientation="vertical" aria-controls="menu"
                        role="listbox">
                        <ul id="menu-home-area-cliente" class="menu-area-cliente">
                            {{-- <li id="menu-item-52869"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-52869">
                                <a target="_blank" href="/seguro">Seguro de Vida</a>
                                <ul class="sub-menu">
                                    <li id="menu-item-59502"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-59502">
                                        <a href="/seguro">Seguro de Saúde</a>
                                    </li>
                                    <li id="menu-item-59505"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-59505">
                                        <a href="/seguro">Vidros</a>
                                    </li>
                                    <li id="menu-item-59503"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-59503">
                                        <a href="/seguro">Martelinho e Para-choque</a>
                                    </li>
                                    <li id="menu-item-59506"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-59506">
                                        <a href="/seguro">Roda, Pneu e Suspensão</a>
                                    </li>
                                    <li id="menu-item-59504"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-59504">
                                        <a href="/seguro">Lataria e Pintura</a>
                                    </li>
                                </ul>
                            </li> --}}
                            {{-- <li id="menu-item-42492"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-42492">
                                <a target="_blank" href="/seguro">Seguro de Saúde</a>
                            </li>
                            <li id="menu-item-41515"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-41515">
                                <a target="_blank" rel="nofollow" href="/seguro">Seguro de Automóvel</a>
                            </li>
                            <li id="menu-item-59821"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-59821">
                                <a href="/seguro">Seguro Residencial</a>
                            </li>
                            <li id="menu-item-59819"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-59819">
                                <a href="/seguro">Seguro Empresarial</a>
                            </li>
                            <li id="menu-item-41525"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-41525">
                                <a target="_blank" href="/seguro">Seguro de Responsabilidade Civil</a>
                            </li>
                            <li id="menu-item-41528"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-41528">
                                <a href="/seguro">Seguro Viagem</a>
                            </li>
                            <li id="menu-item-41530"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-41530">
                                <a href="/seguro">Seguro Educacional</a>
                            </li>
                            <li id="menu-item-41516"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-41516">
                                <a target="_blank" href="/seguro"
                                    title="Instalação de Rastreador &#8211; Clique para acessar">Seguro de Equipamentos</a>
                            </li>
                            <li id="menu-item-41532"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-41532">
                                <a href="/seguro">Seguro de Crédito</a>
                            </li>
                            <li id="menu-item-41517"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-41517">
                                <a target="_blank" href="/seguro">Seguro Previdenciário</a>
                            </li>
                            <li id="menu-item-41534"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-41534">
                                <a href="/seguro">Seguro Náutico</a>
                            </li>
                            <li id="menu-item-51773"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-51773">
                                <a href="/seguro">Seguro Rural</a>
                            </li> --}}
                            @foreach ($categories as $item)
                                <li class="menu-item menu-item-type-custom menu-item-object-custom">
                                    <a href="{{ $item->link }}">{{ $item->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section id="banner-carro">

        </section>

        <section class="um-super-app-para-resolver-a-sua-vida">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <hr>
                        <h3 class="title">
                            Fale com quem<br> entende do assunto.
                        </h3>

                        <p class="text">
                            Tem dúvidas sobre qual é a melhor opção para você? Nossa equipe de especialistas está pronta
                            para ajudar! Seja para esclarecer detalhes, encontrar a melhor solução ou tirar qualquer dúvida,
                            estamos aqui para oferecer um atendimento personalizado e eficiente.
                        </p>


                    </div>

                    <div class="col-md-6">
                        <img loading="lazy" alt="Um Super APP para resolver sua vida"
                            title="Um Super APP Cerrado Consórcios e Seguros para resolver sua vida"
                            src="/assets/images/home/2-man.jpg" style="border-radius: 16px;">
                    </div>
                </div>
            </div>
            </div>
        </section>


        {{-- <section class="banner-home-footer">
            <div class="banner-home-footer-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a title="Seguro Viagem Nacional" role="banner"
                            href="https://www.tokiomarine.com.br/seguro-viagem/seguro-viagem-nacional/?utm_source=Marketing&utm_medium=BannerSite&utm_campaign=Viagem&utm_content=Nacional"
                            target="_self">
                            <picture>
                                <source media="(max-width: 767px)"
                                    srcset="https://www.tokiomarine.com.br/wp-content/uploads/2025/01/Banner-360x296-02-mobile.png" />
                                <source media="(min-width: 768px)"
                                    srcset="https://www.tokiomarine.com.br/wp-content/uploads/2025/01/Banner-1920x429-desktop.png" />

                                <img loading="lazy" alt="Seguro Viagem Nacional" title="Seguro Viagem Nacional"
                                    src="https://www.tokiomarine.com.br/wp-content/uploads/2025/01/Banner-1920x429-desktop.png" />
                            </picture>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a title="Atenção!" role="banner"
                            href="https://blog.tokiomarine.com.br/auto/fique-atento-a-golpes-cobranca-indevida-de-valores-relativa-a-falsa-instalacao-de-rastreadores/?_gl=1*t6rhx0*_ga*MzQ4ODY4NTk5LjE3MjU5MjAwNTc.*_ga_M3GQZ9PQWS*MTczNzM4MDU5MS4zMS4xLjE3MzczODA2MjIuMjkuMC4w*_gcl_au*ODUzNzYzODEuMTczNDk5MDc1MA..*_ga_1CFCMLD6NJ*MTczNzM4MDU5MS4yMy4xLjE3MzczODA2MTguMzMuMC4w"
                            target="_self">
                            <picture>

                                <img loading="lazy" alt="Atenção!" title="Atenção!"
                                    src="https://www.tokiomarine.com.br/wp-content/uploads/2025/01/2-Banner-Site-Tokio-Marine-Clientes.png" />
                            </picture>
                        </a>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </section> --}}


    </main>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <script>
        const swiperEl = document.querySelector('swiper-container')
        Object.assign(swiperEl, {
            loop: true,
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 8,
                    spaceBetween: 20,
                },
            },
        });
        swiperEl.initialize();
    </script>
@endsection
