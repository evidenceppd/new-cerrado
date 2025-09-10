@extends('layouts.master')

@section('title')
    Termos e condições | Cerrado Consórcios
@endsection

@section('css')
    <style>
        h2 {
            font-family: 'Magistral', 'Titillium Web', sans-serif;
            color: #163c67;
            font-size: 4rem;
            font-weight: 700
        }

        p {
            font-size: 2rem
        }

        @media (max-width: 510px) {
            h2 {
                font-size: 3.5rem;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container" style="margin: 8rem auto">
        <h2> Termo de Consentimento para Uso de Dados Pessoais</h2>

        <p class="mt-5 mb-5">
            Agradecemos o seu interesse! Para que possamos oferecer a você as melhores opções de consórcios e seguros,
            precisaremos
            utilizar alguns dos seus dados pessoais.
        </p>

        <p> Essas informações serão utilizadas exclusivamente para atender à sua solicitação de consórcio e seguro, com base
            no seu
            consentimento e no legítimo interesse da Cerrado Seguros e Consórcios, sempre respeitando a legislação vigente
            de
            proteção de dados, em especial a Lei Geral de Proteção de Dados (LGPD).</p>
    </div>
@endsection
