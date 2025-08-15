@extends('layouts.master')

@section('title')
    Nome do seguro - Cerrado Seguros e Consórcios
@endsection

@section('seo')
@endsection

@section('css')
    <style>
        main {
            padding-bottom: 80px;
            padding-top: 20px;
        }

        h2.secure_title {
            font-size: 28px;
            font-family: 'Titillium Web', sans-serif;
            font-weight: 900;
            color: #163c67;
        }

        @media(min-width: 1024px) {
            .main_image {
                float: left;
                margin-right: 1.5rem;
            }

            main {
                padding: 80px 0px;
            }

            h2.secure_title {
                font-size: 32px;
            }
        }
    </style>
@endsection

@section('content')
    <main role="main">
        <div class="entry-content">
            <div class="container">
                <div class="col-xs-12">
                    <div class="panel-group" id="custom-collapse-0">
                        <img src="/assets/images/seguros/1.jpg" style="max-width: 600px;  width: 100%;"
                            class="mb-2 mt-4 rounded-3 main_image" alt="">
                        <h2 class="secure_title" class="mt-4">Nome do seguro</h2>
                        O Seguro de Vida garante segurança financeira para você e aqueles que mais ama, oferecendo suporte
                        em momentos inesperados. Com coberturas flexíveis e benefícios exclusivos, você tem a tranquilidade
                        de saber que sua família estará amparada caso algo aconteça.
                        <br>
                        <br>
                        <br>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <a class=" " data-toggle="collapse" data-parent="#custom-collapse-0"
                                        href="#diferenciais" aria-expanded="false">
                                        Proteção financeira para sua família </a>
                                </h3>
                                <p><a class="" data-toggle="collapse" data-parent="#custom-collapse-0"
                                        href="#diferenciais" aria-expanded="true"></a>
                                </p>

                            </div>
                            <div id="diferenciais" class="panel-collapse collapse in" aria-expanded="true" style="">
                                <div class="panel-body">
                                    Em caso de falecimento do segurado, os beneficiários recebem uma indenização que pode
                                    ser usada para cobrir despesas essenciais, como moradia, educação, dívidas e outras
                                    necessidades. Assim, sua família mantém a estabilidade financeira mesmo na sua ausência.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <a class=" " data-toggle="collapse" data-parent="#custom-collapse-0"
                                        href="#coberturas" aria-expanded="false">
                                        Cobertura para invalidez total ou parcial </a>
                                </h3>
                                <p><a class="" data-toggle="collapse" data-parent="#custom-collapse-0"
                                        href="#coberturas" aria-expanded="false"></a>
                                </p>

                            </div>
                            <div id="coberturas" class="panel-collapse collapse" aria-expanded="true" style="">
                                <div class="panel-body">
                                    Se você sofrer um acidente ou for diagnosticado com uma doença que cause invalidez
                                    permanente, poderá contar com uma indenização que ajudará a cobrir despesas médicas,
                                    adaptações na residência e outras necessidades, garantindo mais segurança e qualidade de
                                    vida.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>
                                </h4>
                                <h3 class="panel-title">
                                    <a class=" " data-toggle="collapse" data-parent="#custom-collapse-0"
                                        href="#coberturas-segmentadas" aria-expanded="false">
                                        Assistência funeral para sua família </a>
                                </h3>
                                <p><a class="" data-toggle="collapse" data-parent="#custom-collapse-0"
                                        href="#coberturas-segmentadas" aria-expanded="false"></a>
                                </p>

                            </div>
                            <div id="coberturas-segmentadas" class="panel-collapse collapse" aria-expanded="true"
                                style="">
                                <div class="panel-body">
                                    Evite preocupações financeiras e burocráticas em momentos difíceis. Nossa cobertura de
                                    assistência funeral garante todo o suporte necessário, incluindo despesas com velório,
                                    traslado e sepultamento ou cremação, proporcionando tranquilidade para seus familiares.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>
                                </h4>
                                <h3 class="panel-title">
                                    <a class=" " data-toggle="collapse" data-parent="#custom-collapse-0"
                                        href="#assistencias-24-horas" aria-expanded="false">
                                        Possibilidade de resgate antecipado </a>
                                </h3>
                                <p><a class="" data-toggle="collapse" data-parent="#custom-collapse-0"
                                        href="#assistencias-24-horas" aria-expanded="false"></a>
                                </p>

                            </div>
                            <div id="assistencias-24-horas" class="panel-collapse collapse" aria-expanded="true"
                                style="">
                                <div class="panel-body">
                                    Algumas opções do seguro permitem o resgate parcial do valor acumulado em situações
                                    específicas, como diagnósticos de doenças graves. Isso garante um apoio financeiro para
                                    tratamento médico, sem comprometer seu planejamento financeiro.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>
                                </h4>
                                <h3 class="panel-title">
                                    <a class=" " data-toggle="collapse" data-parent="#custom-collapse-0"
                                        href="#top-service" aria-expanded="false">
                                        Planos acessíveis para todos os perfis </a>
                                </h3>
                                <p><a class="" data-toggle="collapse" data-parent="#custom-collapse-0"
                                        href="#top-service" aria-expanded="false"></a>
                                </p>

                            </div>
                            <div id="top-service" class="panel-collapse collapse" aria-expanded="true" style="">
                                <div class="panel-body">
                                    Oferecemos diversas opções de cobertura e pagamento, permitindo que você escolha um
                                    plano que se encaixe no seu orçamento sem comprometer sua qualidade de vida. Com
                                    mensalidades flexíveis, você garante proteção sem pesar no bolso.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('js')
@endsection
