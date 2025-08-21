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

    <link href="
    https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css
    " rel="stylesheet">
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

                <span class="text cerrado">Cerrado</span>

                @if (count($banners) > 0)
                    <section class="splide banners-slide" aria-label="Basic Structure Example"
                        style="position: relative; z-index: 2;">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach ($banners as $item)
                                    <li class="splide__slide">
                                        <a @if (isset($item->link)) href="{{ $item->link }}" @endif>
                                            <picture>
                                                <source media="(max-width: 768px)" srcset="{{ $item->banner_mobile }}">
                                                <source media="(min-width: 769px)" srcset="{{ $item->foto_banner }}">
                                                <img src="{{ $item->foto_banner }}" alt="Banner" style="width: 100%;">
                                            </picture>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </section>
                @else
                    <div style="height: 145px"></div>
                @endif

                <span class="text seguros">Seguros</span>
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


                                    </div> 
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
    </main>
@endsection

@section('js')
    <script src=" https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
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

    <script>
        var bannerCarousel = new Splide('.banners-slide', {
            type: 'loop',
            perPage: 1,
            autoplay: true,
        });

        bannerCarousel.mount();

        const banner = document.getElementById('banner-container');
        const img = document.createElement('img');
        img.src = window.innerWidth <= 768 ? 'banner-mobile.jpg' : 'banner-desktop.jpg';
        banner.appendChild(img);
    </script>
@endsection
