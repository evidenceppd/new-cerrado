@extends('layouts.admin')

@section('title')
    {{ isset($customer) ? 'Editar Cliente' : 'Criar Cliente' }}
@endsection

@section('css')
    <link rel="stylesheet" href="/assets_admin/vendor/jodit/jodit.fat.min.css" />
@endsection

@section('content')
    @if (\Session::has('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Toastify({
                    text: "{{ \Session::get('error') }}",
                    gravity: "top",
                    position: "center",
                    duration: 3000,
                    close: true,
                    backgroundColor: "#f44336",
                }).showToast();
            });
        </script>
    @endif
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="mb-0 fw-semibold">
                            {{ isset($customer->id) ? 'Editar Cliente' : 'Adicionar Cliente' }}</h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Painel de Controle</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('blog.index') }}">Cliente</a></li>
                            <li class="breadcrumb-item active">{{ isset($customer->id) ? 'Editar' : 'Adicionar' }}</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form
                        action="{{ isset($customer) && isset($customer->id) ? route('customers.update', $customer->id) : route('customers.store') }}"
                        id="form-info-blog" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Nome da Cliente</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="name"><i
                                                        class="ri-box-3-fill align-middle fs-18"></i></span>
                                                <input type="text" class="form-control" id="name"
                                                    aria-describedby="name" name="name" placeholder="Nome da Cliente"
                                                    value="{{ isset($customer) ? $customer->name : '' }}" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Link:</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="link"><i
                                                        class="ri-box-3-fill align-middle fs-18"></i></span>
                                                <input type="text" class="form-control" id="link"
                                                    aria-describedby="link" name="link" placeholder="Link"
                                                    value="{{ isset($customer) ? $customer->link : '' }}">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-12 mb-3">
                                                    <label for="path_media" class="form-label" data-bs-toggle="tooltip"
                                                        data-bs-placement="right"
                                                        data-bs-title="Imagem principal dod Cliente, irá aparecer nas páginas principais.">Imagem
                                                        Cliente/Logo<span><i class='bx bx-question-mark'></i></span>
                                                    </label>
                                                    <input type="file" name="path_media" class="form-control"
                                                        aria-label="file" accept="image/*"
                                                        {{ isset($customer->path_media) ? '' : 'required=""' }}>
                                                </div>
                                                @if (isset($customer->path_media))
                                                    <div class="col-12 col-lg-3 mb-3">
                                                        <img src="{{ $customer->path_media }}" alt="{{ $customer->name }}"
                                                            class="img-fluid rounded">
                                                    </div>
                                                    <input type="hidden" name="path_media_existing"
                                                        value="{{ $customer->path_media }}">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    <div class="mb-3 rounded">
                        <div class="row justify-content-end g-2">
                            <div class="col-lg-2">
                                <a href="{{ route('customers.index') }}"
                                    onclick="return isFormChanged = false confirm('Tem certeza que deseja cancelar?');"
                                    class="btn btn-outline-primary  w-100">Cancelar</a>
                            </div>
                            <div class="col-lg-2">
                                <a class="btn btn-danger w-100 btn-salvar-Produto" style="border: none">Salvar
                                    Cliente</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="/assets_admin/vendor/jodit/jodit.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.btn-salvar-Produto').click(function(e) {
                e.preventDefault();

                let isValid = true;

                $('#form-info-blog [required]').each(function() {
                    if (!$(this).val()) {
                        isValid = false;

                        $(this).addClass('is-invalid');

                        if (isValid === false && !$("[autofocus-invalid]").length) {
                            $(this).attr('autofocus-invalid', true).focus();
                        }
                    } else {
                        $(this).removeClass('is-invalid');
                    }
                });

                if (isValid) {
                    isFormChanged = false;
                    $('#form-info-blog').submit();
                } else {
                    alert('Por favor, preencha todos os campos obrigatórios.');
                }
            });


            document.querySelectorAll('input, textarea, select').forEach(el => {
                el.addEventListener('change', () => {
                    isFormChanged = true;
                });
            });

            window.addEventListener('beforeunload', function(e) {
                if (isFormChanged) {
                    e.preventDefault();
                    e.returnValue = '';
                }
            });

            initJoditEditor("#description");

            function initJoditEditor(selector) {
                return Jodit.make(selector, {
                    useSearch: false,
                    height: 150,
                    width: "100%",
                    language: 'pt_br',
                    buttons: "bold,italic,underline,strikethrough,eraser,ul,ol,font,fontsize,lineHeight,superscript,subscript,spellcheck,link,indent,outdent",
                });
            }
        })
    </script>
@endsection
