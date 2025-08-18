@extends('layouts.admin')

@section('title')
    {{ isset($corretor) ? 'Editar Corretor' : 'Criar Corretor' }}
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
                            {{ isset($corretor->id) ? 'Editar Corretor' : 'Adicionar Corretor' }}</h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Painel de Controle</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('blog.index') }}">Corretor</a></li>
                            <li class="breadcrumb-item active">{{ isset($corretor->id) ? 'Editar' : 'Adicionar' }}</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form
                        action="{{ isset($corretor) && isset($corretor->id) ? route('corretores.update', $corretor->id) : route('corretores.store') }}"
                        id="form-info-blog" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Nome do corretor(a)</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="name"><i
                                                        class="ri-box-3-fill align-middle fs-18"></i></span>
                                                <input type="text" class="form-control" id="name"
                                                    aria-describedby="name" name="name" placeholder="Nome do corretor(a)"
                                                    value="{{ isset($corretor) ? $corretor->name : '' }}" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Telefone Celular</label>
                                            <div class="input-group">
                                                <input required type="text" class="form-control" id="phone"
                                                    aria-describedby="phone" name="phone"
                                                    placeholder="Telefone (WhatsApp) de contato / (99) 99999-9999"
                                                    value="{{ isset($corretor) ? $corretor->phone : '' }}">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Especialidade</label>
                                            <div class="input-group">
                                                <input required type="text" class="form-control" id="especialidade"
                                                    aria-describedby="especialidade" name="especialidade"
                                                    placeholder="Digite a especialidade (cargo) do corretor"
                                                    value="{{ isset($corretor) ? $corretor->especialidade : '' }}">
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Visibilidade</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-2">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input me-2" type="checkbox"
                                                                role="switch" id="flexSwitchCheckChecked"
                                                                name="mostrar_corretor"
                                                                {{ isset($corretor) && $corretor->mostrar == 0 ? '' : 'checked' }}>
                                                            <label class="form-check-label" for="flexSwitchCheckChecked"
                                                                data-bs-toggle="tooltip" data-bs-placement="right"
                                                                data-bs-title="Marque essa opção para exibir o corretor no site">Exibir corretor
                                                                <span><i class='bx bx-question-mark'></i></span></label>
                                                        </div>
                                                    </div>
                                                </div>
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
                                <a href="{{ route('corretores.index') }}"
                                    onclick="return isFormChanged = false confirm('Tem certeza que deseja cancelar?');"
                                    class="btn btn-outline-primary  w-100">Cancelar</a>
                            </div>
                            <div class="col-lg-2">
                                <a class="btn btn-danger w-100 btn-salvar-Produto" style="border: none">Salvar
                                    Corretor</a>
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
            $('#phone').mask('(00) 00000-0000');

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
