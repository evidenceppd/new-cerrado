@extends('layouts.master')

@section('title')
    Nossos Seguros | {{ env('APP_NAME') }}
@endsection

@section('seo')
@endsection

@section('css')
    <style>
        .container {
            margin-top: 5rem;
            width: 90%;
        }

        h3 {
            font-weight: 400;
        }

        .img-seguro {
            min-width: 100%;
            max-height: 365px;
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: -1px 0px 48px -25px rgba(0, 0, 0, 0.75);
        }

        .img-seguro img {
            object-position: center;
            object-fit: cover
        }

        .seguro-info-container a {
            text-decoration: none;
            border-radius: 2rem;
            color: #6d6e6d;
            transition: color .2s ease;
            width: 100%;
        }

        .seguro-info-container a:hover {
            color: #163c67;
        }

        .seguro-info-container h5 {
            text-decoration: none;
            margin: 0rem;
            font-size: 1.5rem;
        }

        .single-seguro-name {
            height: 20%;
            display: flex;
            align-items: center;
            width: 100%
        }

        .seguro-info-container {
            border: 2px solid #6d6E6D1f;
            background-color: #6d6E6D1f;
            border-radius: 2rem;
            padding: 1rem;
            padding-bottom: 0;
            aspect-ratio: 1.45 / 1;
            display: flex;
        }

        .img-single-seguro {
            overflow: hidden;
            border-radius: 2rem;
            width: 100%;
            height: 80%;
            /* border-bottom-left-radius: 0;
                                                        border-bottom-right-radius: 0; */
        }

        .img-single-seguro img {
            width: 100%;
            object-fit: cover;
            object-position: center;
            min-height: 100%;
        }

        .col-xl-4,
        .col-lg-6,
        .col-12 {
            padding: 1rem;
        }

        @media (max-width: 1199px) {
            h1 {
                font-size: 3rem;
            }
        }

        @media (min-width: 992px) and (max-width: 1199px) {
            .col-12 {
                width: 50% !important
            }
        }

        @media (max-width: 991px) {
            .seguro-text {
                padding-left: 0rem;
                text-align: center
            }
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">

            <div class="seguro-text">
                @if ($type == 'consorcio')
                    <h1>Confira os nossos consórcios</h1>

                    <h3>Explore nossas opções de Consórcios!</h3>
                @else
                    <h1>Nossos seguros {{ $type == 'para_empresa' ? 'para a sua empresa' : '' }}</h1>

                    <h3>Confira os nossos seguros {{ $type == 'para_empresa' ? 'para a sua corporação!' : '' }}</h3>
                @endif
            </div>

        </div>
    </div>

    <div class="container mb-5">
        <div class="row">
            @foreach ($categories_selecionada as $item)
                <div class="col-12 col-xl-4">
                    <div class="seguro-info-container">
                        <a href="/seguros/{{ $item->slug }}">
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
    </div>
@endsection
