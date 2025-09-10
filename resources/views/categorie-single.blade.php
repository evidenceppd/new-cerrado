@extends('layouts.master')

@section('title')
    {{ $categorie->name }} | {{ env('APP_NAME') }}
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
            object-fit: cover;
            min-width: 100%;
        }

        .seguro-text {
            padding-left: 5rem
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

    <link rel="stylesheet" href="/assets/css/modal.css">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="img-seguro">
                    <img src="{{ $categorie->main_image }}" alt="{{ $categorie->name }}" class="img-fluid">
                </div>
            </div>

            <div class="col-lg-6 col-12">
                <div class="seguro-text">
                    <h1>{{ $categorie->name }}</h1>

                    <h3>{{ $categorie->description }}</h3>

                    @if ($categorie->type == 'consorcio')
                        <button type="button" class="simular-modal" data-bs-toggle="modal" data-bs-target="#modalSimule">
                            Simule já!
                        </button>

                        <!-- Estrutura do Modal -->
                        <div class="modal fade" id="modalSimule" tabindex="-1" aria-hidden="true" style="overflow: hidden">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">

                                        <div class="modal-header_text">
                                            <h3 class="modal-title">Descubra algo incrível</h3>
                                            <p>Insira seus dados e simule seu consórcio de forma rápida, prática e
                                                totalmente online.</p>
                                        </div>

                                        <form id="form-simular" action="{{ route('enviarContato') }}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="Nome Completo">

                                                <div class="text-danger small error-msg" id="error-name"></div>
                                            </div>
                                            <div class="mb-3">
                                                <input type="email" class="form-control" name="email" id="email"
                                                    placeholder="E-mail">

                                                <div class="text-danger small error-msg" id="error-email"></div>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" name="celular" id="celular"
                                                    placeholder="Telefone Celular">

                                                <div class="text-danger small error-msg" id="error-celular"></div>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" name="cidade" id="cidade"
                                                    placeholder="Cidade">

                                                <div class="text-danger small error-msg" id="error-cidade"></div>
                                            </div>
                                            <div class="mb-3">
                                                <select name="estado" id="estado" class="form-control">
                                                    <option value="">Selecione o estado</option>
                                                    <option value="Acre">Acre</option>
                                                    <option value="Alagoas">Alagoas</option>
                                                    <option value="Amapá">Amapá</option>
                                                    <option value="Amazonas">Amazonas</option>
                                                    <option value="Bahia">Bahia</option>
                                                    <option value="Ceará">Ceará</option>
                                                    <option value="Distrito Federal">Distrito Federal</option>
                                                    <option value="Espírito Santo">Espírito Santo</option>
                                                    <option value="Goiás">Goiás</option>
                                                    <option value="Maranhão">Maranhão</option>
                                                    <option value="Mato Grosso">Mato Grosso</option>
                                                    <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                                                    <option value="Minas Gerais">Minas Gerais</option>
                                                    <option value="Pará">Pará</option>
                                                    <option value="Paraíba">Paraíba</option>
                                                    <option value="Paraná">Paraná</option>
                                                    <option value="Pernambuco">Pernambuco</option>
                                                    <option value="Piauí">Piauí</option>
                                                    <option value="Rio de Janeiro">Rio de Janeiro</option>
                                                    <option value="Rio Grande do Norte">Rio Grande do Norte
                                                    </option>
                                                    <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                                                    <option value="Rondônia">Rondônia</option>
                                                    <option value="Roraima">Roraima</option>
                                                    <option value="Santa Catarina">Santa Catarina</option>
                                                    <option value="São Paulo">São Paulo</option>
                                                    <option value="Sergipe">Sergipe</option>
                                                    <option value="Tocantins">Tocantins</option>
                                                </select>

                                                <div class="text-danger small error-msg" id="error-estado"></div>
                                            </div>
                                            <div class="mb-3">
                                                <select name="tipoConsorcio" id="tipoConsorcio" class="form-control">
                                                    <option value="{{ $categorie->name }}">{{ $categorie->name }}</option>
                                                </select>

                                                <div class="text-danger small error-msg" id="error-tipoConsorcio">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" name="valor_credito"
                                                    id="valor-credito" placeholder="Valor do crédito">

                                                <div class="text-danger small error-msg" id="error-valor-credito">
                                                </div>
                                            </div>
                                            <div class="mb-3 form-check">
                                                <input type="checkbox" class="form-check-input" id="terms-check"
                                                    name="terms">

                                                <label class="form-check-label" for="terms-check">Aceito os
                                                    <a href="{{ route('terms') }}" target="_blank">termos e
                                                        condições</a></label>

                                                <div class="text-danger small error-msg" id="error-check"></div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="simular-modal"
                                            data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" id="simular-modal" class="simular-modal">Enviar
                                            Contato</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row">
            @foreach ($categorie->products as $item)
                <div class="col-12 col-xl-4">
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
    </div>
@endsection

@section('js')
    @if ($categorie->type == 'consorcio')
        <script>
            $(document).ready(function() {
                console.log("modal")
                $('#celular').mask('(00) 00000-0000');
                $('#cep').mask('00000-000');
                $('#valor-credito').maskMoney({
                    prefix: 'R$ ',
                    allowNegative: false,
                    thousands: '.',
                    decimal: ',',
                    affixesStay: true,
                    allowZero: true
                });
            });
        </script>



        <script>
            $('#form-simular').on('submit', function(e) {
                e.preventDefault();
                $('#simular-modal').prop('disabled', true).text('Enviando...');
                $('.error-msg').text('');

                let hasError = false;

                let valorCredito = $('#valor-credito').maskMoney('unmasked')[0];

                if ($('#name').val().trim() === '') {
                    $('#error-name').text('O nome é obrigatório.');
                    hasError = true;
                }

                let email = $('#email').val().trim();
                if (email === '') {
                    $('#error-email').text('O e-mail é obrigatório.');
                    hasError = true;
                } else if (!/^\S+@\S+\.\S+$/.test(email)) {
                    $('#error-email').text('Digite um e-mail válido.');
                    hasError = true;
                }
                if ($('#celular').val().trim() === '') {
                    $('#error-celular').text('O telefone é obrigatório.');
                    hasError = true;
                }
                if ($('#cidade').val().trim() === '') {
                    $('#error-cidade').text('A cidade é obrigatória.');
                    hasError = true;
                }
                if ($('#estado').val().trim() === '') {
                    $('#error-estado').text('Selecione um estado.');
                    hasError = true;
                }
                if ($('#tipoConsorcio').val() === '') {
                    $('#error-tipoConsorcio').text('Selecione o tipo de consórcio.');
                    hasError = true;
                }
                if (valorCredito == '' || valorCredito <= 0) {
                    $('#error-valor-credito').text('O valor do crédito é obrigatório.');
                    hasError = true;
                }
                if (!$('#terms-check').is(':checked')) {
                    $('#error-check').text('Você precisa aceitar os termos.');
                    hasError = true;
                }


                if (hasError) {
                    $('#simular-modal').prop('disabled', false).text('Enviar Contato');
                    return;
                }


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {


                        Toastify({
                            text: "Formulario enviado com sucesso!",
                            gravity: "top",
                            position: "center",
                            duration: 3000,
                            close: true,
                            backgroundColor: "#5cc184",
                        }).showToast();


                        $('#form-simular')[0].reset();
                        var modalEl = document.getElementById('modalSimule');
                        var modal = bootstrap.Modal.getInstance(modalEl);
                        if (!modal) {
                            modal = new bootstrap.Modal(modalEl);
                        }
                        modal.hide();

                        $('#simular-modal').prop('disabled', false).text('Enviar Contato');

                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            $('.error-msg').text('');
                            for (let field in errors) {
                                $('#error-' + field).text('Este campo não pode ser vazio!');
                            }

                            $('#simular-modal').prop('disabled', false).text('Enviar Contato');
                        } else {
                            Toastify({
                                text: "Não foi possível enviar o formulário, tente novamente mais tarde...",
                                gravity: "top",
                                position: "center",
                                duration: 6000,
                                close: true,
                                backgroundColor: "#f44336",
                            }).showToast();

                            $('#simular-modal').prop('disabled', false).text('Enviar Contato');
                        }
                    }
                });
            });
        </script>
    @endif
@endsection
