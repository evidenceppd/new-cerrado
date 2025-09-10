@extends('layouts.admin')

@section('title')
    {{ isset($categorie) ? 'Editar categoria' : 'Criar categoria' }}
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
                            {{ isset($categorie->id) ? 'Editar Categoria' : 'Adicionar Categoria' }}</h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Painel de Controle</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('banner.index') }}">Categoria</a></li>
                            <li class="breadcrumb-item active">{{ isset($categorie->id) ? 'Editar' : 'Adicionar' }}</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form
                        action="{{ isset($categorie) && isset($categorie->id) ? route('categories.update', $categorie->id) : route('categories.store') }}"
                        id="form-info-blog" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Nome da Categoria</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="name"><i
                                                        class="ri-box-3-fill align-middle fs-18"></i></span>
                                                <input type="text" class="form-control" id="name"
                                                    aria-describedby="name" name="name" placeholder="Nome da categoria"
                                                    value="{{ isset($categorie) ? $categorie->name : '' }}" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label" data-bs-toggle="tooltip"
                                                data-bs-placement="right"
                                                data-bs-title="Descreva brevemente essa categoria de seguro..">Descrição
                                                da
                                                categoria<span><i class='bx bx-question-mark'></i></span>
                                            </label>
                                            <div class="input-group">
                                                <textarea id="description" name="description" class="editor-description form-control">{{ isset($categorie->description) ? $categorie->description : '' }}</textarea>
                                            </div>
                                        </div>
                                        {{-- <div class="mb-3">
                                            <label for="categorie_link" class="form-label" data-bs-toggle="tooltip"
                                                data-bs-placement="right" data-bs-title="Descreva a categoria.">Link de
                                                redirecionamento da categoria <span><i
                                                        class='bx bx-question-mark'></i></span>
                                            </label>
                                            <div class="input-group">
                                                <textarea id="categorie_link" name="categorie_link" class="editor-description form-control">{{ isset($categorie->link) ? $categorie->link : '' }}</textarea>
                                            </div>
                                        </div> --}}
                                        <div class="mb-3">
                                            <label for="categorie-type" class="form-label" data-bs-toggle="tooltip"
                                                data-bs-placement="right"
                                                data-bs-title="Diferencia em qual aba do site a categoria será exibida, sendo 'seguros para você', ou 'seguros para a sua empresa'.">Tipo
                                                de
                                                seguro <span><i class='bx bx-question-mark'></i></span>
                                            </label>
                                            <div class="input-group">
                                                <select name="type" id="type" class="form-control" required>
                                                    <option value="">Selecione uma opção</option>
                                                    <option
                                                        {{ isset($categorie) && $categorie->type == 'seguro_geral' ? 'selected' : '' }}
                                                        value="seguro_geral">Seguros Gerais (Para Você)</option>
                                                    <option
                                                        {{ isset($categorie) && $categorie->type == 'seguro_para_empresa' ? 'selected' : '' }}
                                                        value="seguro_para_empresa">Seguros para Empresas</option>
                                                    <option
                                                        {{ isset($categorie) && $categorie->type == 'consorcio' ? 'selected' : '' }}
                                                        value="consorcio">Consórcios</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-12 mb-3">
                                                    <label for="main_image" class="form-label" data-bs-toggle="tooltip"
                                                        data-bs-placement="right"
                                                        data-bs-title="Imagem principal da categoria, irá aparecer nas páginas principais.">Imagem
                                                        principal da categoria<span><i
                                                                class='bx bx-question-mark'></i></span>
                                                    </label>
                                                    <input type="file" name="main_image" class="form-control"
                                                        aria-label="file" accept="image/*"
                                                        {{ isset($categorie->main_image) ? '' : 'required=""' }}>
                                                </div>
                                                @if (isset($categorie->main_image))
                                                    <div class="col-12 col-lg-3 mb-3">
                                                        <img src="{{ $categorie->main_image }}"
                                                            alt="{{ $categorie->title }}" class="img-fluid rounded">
                                                    </div>
                                                    <input type="hidden" name="main_image_existing"
                                                        value="{{ $categorie->main_image }}">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        {{-- <div class="col-12 mb-3">
                                            <label for="icon_path" class="form-label" data-bs-toggle="tooltip"
                                                data-bs-placement="right"
                                                data-bs-title="Aqui você seleciona o ícone que irá aparecer no comunicado e no item do carrocel da página principal.">Ícone
                                                do seguro<span><i class='bx bx-question-mark'></i></span>
                                            </label>
                                            <input type="file" name="icon_path" class="form-control" aria-label="file">
                                        </div> --}}
                                        {{-- @if (isset($categorie->icon_path))
                                            <div class="col-12 col-lg-1 mb-3">
                                                <img style="min-width: 50%;" src="{{ $categorie->icon_path }}"
                                                    alt="{{ $categorie->title }}" class="img-fluid rounded">
                                            </div>
                                            <input type="hidden" name="icon_path_existing"
                                                value="{{ $categorie->icon_path }}">
                                        @endif --}}
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Visibilidade da categoria</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-lg-2">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input me-2" type="checkbox" role="switch"
                                                        id="flexSwitchCheckChecked" name="mostrar_categoria"
                                                        {{ isset($categorie->mostrar) && $categorie->mostrar == 0 ? '' : 'checked' }}>
                                                    <label class="form-check-label" for="flexSwitchCheckChecked"
                                                        data-bs-toggle="tooltip" data-bs-placement="right"
                                                        data-bs-title="Marque essa opção para exibir ou ocultar a categoria no site">Mostrar
                                                        categoria
                                                        <span><i class='bx bx-question-mark'></i></span></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Título do comunicado</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="name"><i
                                                        class="ri-box-3-fill align-middle fs-18"></i></span>
                                                <input type="text" class="form-control" id="name"
                                                    aria-describedby="name" name="comunicado_name"
                                                    placeholder="Nome da categoria"
                                                    value="{{ isset($categorie) && isset($categorie->comunicado) ? $categorie->comunicado->name : '' }}">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="comunicado_description" class="form-label"
                                                data-bs-toggle="tooltip" data-bs-placement="right"
                                                data-bs-title="Recado que aparece no comunicado.">Texto do
                                                comunicado <span><i class='bx bx-question-mark'></i></span>
                                            </label>
                                            <div class="input-group">
                                                <textarea id="comunicado_description" name="comunicado_description" class="editor-description form-control">{{ isset($categorie->comunicado->description) ? $categorie->comunicado->description : '' }}</textarea>
                                            </div>
                                        </div>
                                        {{-- <div class="mb-3">
                                            <label for="comunicado_link" class="form-label" data-bs-toggle="tooltip"
                                                data-bs-placement="right" data-bs-title="Descreva a categoria.">Link de
                                                redirecionamento do comunicado <span><i
                                                        class='bx bx-question-mark'></i></span>
                                            </label>
                                            <div class="input-group">
                                                <textarea id="comunicado_link" name="comunicado_link" class="editor-description form-control">{{ isset($categorie->comunicado->link) ? $categorie->comunicado->link : '' }}</textarea>
                                            </div>
                                        </div> --}}
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
                                                                name="mostrar_comunicado"
                                                                {{ isset($categorie->comunicado) && $categorie->comunicado->mostrar == 0 ? '' : 'checked' }}>
                                                            <label class="form-check-label" for="flexSwitchCheckChecked"
                                                                data-bs-toggle="tooltip" data-bs-placement="right"
                                                                data-bs-title="Marque essa opção para exibir ou ocultar o comunicado no site">Mostrar
                                                                comunicado
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

                        @if (isset($categorie))
                            <input type="hidden" name="categorie_id" value="{{ $categorie->id }}">
                        @endif

                    </form>
                    <div class="mb-3 rounded">
                        <div class="row justify-content-end g-2">
                            <div class="col-lg-2">
                                <a href="{{ route('categories.index') }}"
                                    onclick="return isFormChanged = false confirm('Tem certeza que deseja cancelar?');"
                                    class="btn btn-outline-primary  w-100">Cancelar</a>
                            </div>
                            <div class="col-lg-2">
                                <a class="btn btn-danger w-100 btn-salvar-Produto" style="border: none">Salvar
                                    Categoria</a>
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
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            const editor = Jodit.make("#content", {
                useSearch: false,
                height: 150,
                minHeight: 500,
                language: 'pt_br',
                uploader: {
                    url: '/admin/produtos/create/upload-image-content',
                    insertImageAsBase64URI: false,
                    imagesExtensions: ['jpg', 'png', 'jpeg', 'gif', 'svg', 'webp'],
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    format: 'json',

                    prepareData: function(formData) {
                        const file = formData.getAll('files[0]')[0];
                        formData.delete('files[]');
                        formData.append('files[]', file);
                        return formData;
                    },
                    isSuccess: function(resp) {
                        return resp.success;
                    },
                    getMessage: function(resp) {
                        return resp.message || '';
                    },
                    process: function(resp) {
                        return {
                            files: resp.files || resp.files,
                            path: resp.path,
                            baseurl: resp.baseurl,
                            error: resp.error,
                            message: resp.message
                        };
                    },
                    defaultHandlerSuccess: function(data) {
                        if (data.files && data.files.length) {
                            data.files.forEach(function(filename) {
                                this.selection.insertImage(filename.url ||
                                    filename);
                            }.bind(this));
                        }
                    }
                },
            });

            @if (isset($product->content))
                editor.value = '{!! str_replace(["\r", "\n"], '', $product->content[0]->content) !!}';
            @endif


            initJoditEditor("#description1");
            initJoditEditor("#description2");
            initJoditEditor("#description3");
            initJoditEditor("#description4");
        });

        function initJoditEditor(selector) {
            return Jodit.make(selector, {
                useSearch: false,
                height: 150,
                width: "100%",
                language: 'pt_br',
                buttons: "bold,italic,underline,strikethrough,eraser,ul,ol,font,fontsize,lineHeight,superscript,subscript,spellcheck,link,indent,outdent",
            });
        }
    </script>

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



        })
    </script>
@endsection
