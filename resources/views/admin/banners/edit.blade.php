@extends('layouts.admin')

@section('title')
    {{ isset($banner) ? 'Editar banner' : 'Criar banner' }}
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
                            {{ isset($banner->id) ? 'Editar banner' : 'Adicionar banner' }}</h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Painel de Controle</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('banner.index') }}">banner</a></li>
                            <li class="breadcrumb-item active">{{ isset($banner->id) ? 'Editar' : 'Adicionar' }}</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form
                        action="{{ isset($banner) && isset($banner->id) ? route('banner.update', $banner->id) : route('banner.store') }}"
                        id="form-info-blog" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-12 mb-3">
                                                    <label for="foto_banner" class="form-label" data-bs-toggle="tooltip"
                                                        data-bs-placement="right"
                                                        data-bs-title="Imagem principal da banner, irá aparecer nas páginas principais.">Imagem
                                                        do banner<span><i class='bx bx-question-mark'></i></span>
                                                    </label>
                                                    <input type="file" name="foto_banner" class="form-control"
                                                        aria-label="file" accept="image/*">
                                                </div>
                                                @if (isset($banner->foto_banner))
                                                    <div class="col-12 col-lg-3 mb-3">
                                                        <img src="{{ $banner->foto_banner }}" alt="{{ $banner->title }}"
                                                            class="img-fluid rounded">
                                                    </div>
                                                    <input type="hidden" name="foto_banner_existing"
                                                        value="{{ $banner->foto_banner }}">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-12 mb-3">
                                                    <label for="banner_mobile" class="form-label" data-bs-toggle="tooltip"
                                                        data-bs-placement="right"
                                                        data-bs-title="Imagem em versão para celulares do banner">Imagem
                                                        do banner para celulares<span><i class='bx bx-question-mark'></i></span>
                                                    </label>
                                                    <input type="file" name="banner_mobile" class="form-control"
                                                        aria-label="file" accept="image/*">
                                                </div>
                                                @if (isset($banner->banner_mobile))
                                                    <div class="col-12 col-lg-3 mb-3">
                                                        <img src="{{ $banner->banner_mobile }}" alt="{{ $banner->title }}"
                                                            class="img-fluid rounded">
                                                    </div>
                                                    <input type="hidden" name="banner_mobile_existing"
                                                        value="{{ $banner->banner_mobile }}">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Link do banner</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="link_banner"><i
                                                class="ri-box-3-fill align-middle fs-18"></i></span>
                                        <input type="text" class="form-control" id="link_banner" aria-describedby="link_banner"
                                            name="link_banner" placeholder="Caso o banner tenha algum link de redirecionamento (ex: instagram, facebook, etc), cole o link aqui."
                                            value="{{ isset($banner) ? $banner->link : '' }}">
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Visibilidade da banner</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-lg-2">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input me-2" type="checkbox" role="switch"
                                                        id="flexSwitchCheckChecked" name="mostrar_banner"
                                                        {{ isset($banner->mostrar) && $banner->mostrar == 0 ? '' : 'checked' }}>
                                                    <label class="form-check-label" for="flexSwitchCheckChecked"
                                                        data-bs-toggle="tooltip" data-bs-placement="right"
                                                        data-bs-title="Marque essa opção para exibir ou ocultar o banner no site">Mostrar
                                                        banner
                                                        <span><i class='bx bx-question-mark'></i></span></label>
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
                                <a href="{{ route('banner.index') }}"
                                    onclick="return isFormChanged = false confirm('Tem certeza que deseja cancelar?');"
                                    class="btn btn-outline-primary  w-100">Cancelar</a>
                            </div>
                            <div class="col-lg-2">
                                <a class="btn btn-danger w-100 btn-salvar-Produto" style="border: none">Salvar
                                    banner</a>
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
