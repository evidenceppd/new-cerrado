@extends('layouts.master')

@section('title')
    {{ $product->name }} | {{ env('APP_NAME') }}
@endsection

@section('seo')
    <meta name="title" content="{{ $product->name }} | {{ env('APP_NAME') }}" />
    <meta name="description" content="{{ $product->description }}" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:title" content="{{ $product->name }} | {{ env('APP_NAME') }}" />
    <meta property="og:description" content="{{ $product->description }}" />
    <meta property="og:image" content="{{ asset($product->main_image) }}" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="{{ url()->current() }}" />
    <meta property="twitter:title" content="{{ $product->name }} | {{ env('APP_NAME') }}" />
    <meta property="twitter:description" content="{{ $product->description }}" />
    <meta property="twitter:image" content="{{ asset($product->main_image) }}" />
@endsection

@section('css')
    <style>
        .container {
            margin-top: 5rem;
            width: 90%;
        }

        .img-seguro {
            width: 100%;
            max-height: 365px;
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: -1px 0px 48px -25px rgba(0, 0, 0, 0.75);
        }

        .img-seguro img {
            object-position: center;
            object-fit: cover;
            width: 100%;
        }

        .seguro-text {
            margin-top: 6rem;
        }

        .seguro-info-container a {
            text-decoration: none;
            border-radius: 2rem;
            color: #6d6e6d;
            transition: color .2s ease;
        }

        .seguro-info-container a:hover {
            color: #163c67;
        }

        .seguro-info-container h5 {
            text-decoration: none;
            margin-top: 2rem;
            font-size: 1.5rem;
        }

        .seguro-info-container {
            border: 2px solid #6d6E6D1f;
            background-color: #6d6E6D1f;
            border-radius: 2rem;
            padding: 1.5rem
        }

        .img-single-seguro {
            overflow: hidden;
            border-radius: 2rem;
            width: 100%
                /* border-bottom-left-radius: 0;
                                    border-bottom-right-radius: 0; */
        }

        .img-single-seguro img {
            width: 100%
        }

        .col-4 {
            padding: 1rem;
        }

        .seguro-content {
            padding: 2rem;
            margin: 6rem 0;
            border: 2px solid #6d6E6D1f;
            background-color: #6d6E6D1f;
            border-radius: 2rem;
        }

        .cta-seguro {
            background-color: #163c67;
            color: #fff;
            margin: 0;
            font-weight: 600;
            text-transform: uppercase;
            transition: .4s;
            margin: 0 auto;
            display: block;
            width: fit-content;
            padding: 1rem;
            line-height: 1;
            border-radius: 1rem;
            text-decoration: none
        }

        .cta-seguro:hover {
            color: #fff
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div class="img-seguro d-flex justify-content-center">
                    <img src="{{ $product->main_image }}" alt="{{ $product->name }}" class="img-fluid">
                </div>
            </div>

            <div class="col-12">
                <div class="seguro-text">
                    <h1 class="text-center">{{ $product->name }}</h1>
                    <h3 class="text-center">{{ $product->description }}</h3>
                </div>
                <div class="seguro-content">
                    {!! $product->content !!}
                    <a class="cta-seguro"
                        href="https://wa.me/556434130555?text=Olá,%20gostaria%20de%20saber%20mais%20sobre%20o%20{{ $product->name }}">
                        Entre em contato sobre o {{ $product->name }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container">
        <div class="row">
            @foreach ($product->products as $item)
                <div class="col-4">
                    <div class="seguro-info-container">
                        <a href="/seguro/{{ $item->slug }}">
                            <div class="img-single-seguro">
                                <img src="{{ $item->main_image }}" alt="{{ $item->name }}">
                            </div>

                            <div class="single-seguro-name">
                                <h5>
                                    {{ $item->name }}
                                </h5>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}
@endsection

@section('js')
@endsection
