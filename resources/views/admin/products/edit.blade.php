@extends('layouts.admin')

@section('title')
    {{ isset($product) ? 'Editar Seguro' . $product->name : 'Criar Seguro' }}
@endsection

@section('css')
    <link rel="stylesheet" href="/assets_admin/vendor/jodit/jodit.fat.min.css" />
    <style>
        .dz-progress {
            display: none !important;
        }
    </style>
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
                            {{ isset($product->id) ? 'Editar seguro - Layout 1' : 'Adicionar seguro - Layout 1' }}</h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Painel de Controle</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('product.index') }}">seguro</a></li>
                            <li class="breadcrumb-item active">{{ isset($product->id) ? 'Editar' : 'Adicionar' }}</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form
                        action="{{ isset($product) && isset($product->id) ? route('product.update', $product->id) : route('product.store') }}"
                        id="form-info-blog" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Nome do seguro</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="name"><i
                                                        class="ri-box-3-fill align-middle fs-18"></i></span>
                                                <input type="text" class="form-control" id="name"
                                                    aria-describedby="name" name="name" placeholder="Nome do seguro"
                                                    value="{{ isset($product) ? $product->name : '' }}" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label" data-bs-toggle="tooltip"
                                                data-bs-placement="right"
                                                data-bs-title="Aparece logo a baixo do nome do seguro.">Descrição
                                                <span><i class='bx bx-question-mark'></i></span></label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="description"><i
                                                        class="ri-align-justify align-middle fs-18"></i></span>
                                                <input type="text" class="form-control" id="description"
                                                    aria-describedby="description" name="description"
                                                    placeholder="Breve descriçao do seguro"
                                                    value="{{ isset($product) ? $product->description : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- @for ($i = 1; $i <= 4; $i++)
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="title{{ $i }}" class="form-label">Título
                                                    {{ $i }}</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="title{{ $i }}"><i
                                                            class="ri-box-3-fill align-middle fs-18"></i></span>
                                                    <input type="text" class="form-control"
                                                        id="title{{ $i }}" name="title{{ $i }}"
                                                        placeholder="Título {{ $i }}"
                                                        value="{{ isset($product->content[$i]->title) ? $product->content[$i]->title : '' }}">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="description{{ $i }}" class="form-label"
                                                    data-bs-toggle="tooltip" data-bs-placement="right"
                                                    data-bs-title="Aparece logo a baixo do nome do seguro.">
                                                    Descrição {{ $i }} <span><i
                                                            class='bx bx-question-mark'></i></span>
                                                </label>
                                                <div class="input-group">
                                                    <textarea id="description{{ $i }}" name="description{{ $i }}"
                                                        class="editor-description form-control">
                                                        {{ isset($product->content[$i]->description) ? $product->content[$i]->description : '' }}
                                                        </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor --}}

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <label for="content" class="mb-2">Conteúdo</label>
                                    <div class="col-12 mb-3">
                                        <textarea id="content" name="content" class="content form-control w-full"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">
                                    Categorias
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button fw-medium" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                    Selecione uma categoria
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse show"
                                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    @if ($categories->count())
                                                        <div class="form-check mb-1">
                                                            @foreach ($categories as $category)
                                                                <div class="checkbox">
                                                                    <label class="form-check-label fs-16">
                                                                        <input type="checkbox" class="form-check-input"
                                                                            name="categorie[]" value="{{ $category->id }}"
                                                                            {{ isset($product) && in_array($category->id, $product->checked_boxes ?? []) ? 'checked' : '' }} />
                                                                        &nbsp; {{ $category->name }}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Imagem principal do seguro</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <input type="file" name="main_image" class="form-control" aria-label="file"
                                            accept="image/*" {{ isset($product->main_image) ? '' : 'required=""' }}>
                                    </div>
                                    @if (isset($product->main_image))
                                        <div class="col-12 col-lg-3 mb-3">
                                            <img src="{{ $product->main_image }}" alt="{{ $product->title }}"
                                                class="img-fluid rounded">
                                        </div>
                                        <input type="hidden" name="main_image_existing"
                                            value="{{ $product->main_image }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{-- <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Outras imagens para o seguro</h4>
                            </div>
                            <input type="file" id="imagesProduct" name="images[]" multiple style="display: none;">
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    Dropzone.autoDiscover = false;

                                    const inputImagem = document.getElementById('imagesProduct');

                                    const dropzone = new Dropzone("#imagesProductDropZone", {
                                        url: "/", // Ignorado
                                        autoProcessQueue: false,
                                        uploadMultiple: true,
                                        acceptedFiles: "image/*",
                                        addRemoveLinks: true,
                                        dictDefaultMessage: "Solte seus arquivos aqui ou clique para fazer upload",
                                        dictRemoveFile: "Remover",
                                        init: function() {
                                            const dropzoneInstance = this;

                                            // Armazena os arquivos adicionados
                                            const arquivos = [];

                                            this.on("error", function(file, errorMessage) {
                                                // Silencia erros
                                            });

                                            this.on("addedfile", function(file) {
                                                arquivos.push(file);
                                                atualizarInputFiles();
                                            });

                                            this.on("removedfile", function(file) {
                                                const index = arquivos.indexOf(file);
                                                if (index > -1) {
                                                    arquivos.splice(index, 1);
                                                }
                                                atualizarInputFiles();

                                                // Se for imagem existente, faz requisição AJAX para deletar
                                                if (file.existing && file.serverPath) {
                                                    $.ajax({
                                                        url: "/admin/seguros/delete-image",
                                                        type: "POST",
                                                        data: JSON.stringify({
                                                            path: file.serverPath
                                                        }),
                                                        headers: {
                                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                                                'content')
                                                        },
                                                        success: function(data) {
                                                            console.log.log(data);
                                                            if (data.success) {
                                                                console.log("Imagem removida com sucesso.");
                                                            } else {
                                                                console.error(
                                                                    "Erro ao remover imagem do servidor."
                                                                );
                                                            }
                                                        },
                                                        error: function(xhr, status, error) {
                                                            console.error("Erro na requisição AJAX:",
                                                                error);
                                                        }
                                                    });
                                                }
                                            });


                                            function atualizarInputFiles() {
                                                const dataTransfer = new DataTransfer();

                                                // Verifica se todos são arquivos reais antes de processar
                                                const arquivosReais = arquivos.filter(file => file instanceof File ||
                                                    file instanceof Blob);

                                                if (arquivosReais.length === 0) {
                                                    inputImagem.value = '';
                                                    return;
                                                }

                                                let arquivosProcessados = 0;

                                                arquivosReais.forEach(function(file) {
                                                    const reader = new FileReader();
                                                    reader.onload = function(event) {
                                                        const blob = new Blob([event.target.result], {
                                                            type: file.type
                                                        });
                                                        const novoFile = new File([blob], file.name, {
                                                            type: file.type
                                                        });
                                                        dataTransfer.items.add(novoFile);
                                                        arquivosProcessados++;

                                                        // Só atualiza input quando todos estiverem processados
                                                        if (arquivosProcessados === arquivosReais.length) {
                                                            inputImagem.files = dataTransfer.files;
                                                        }
                                                    };
                                                    reader.readAsArrayBuffer(file);
                                                });
                                            }

                                        }
                                    });

                                    @if (isset($product) && count($product->images) > 0)
                                        const imagensExistentes = @json($product->images);
                                        imagensExistentes.forEach(function(imagem) {
                                            let mockFile = {
                                                name: imagem.path.split('/').pop(),
                                                size: 211131,
                                                accepted: true,
                                                status: Dropzone.ADDED,
                                                existing: true,
                                                serverPath: imagem.path
                                            };

                                            setTimeout(() => {
                                                dropzone.emit("addedfile", mockFile);
                                                dropzone.emit("thumbnail", mockFile, window.location.origin + imagem.path);
                                                dropzone.emit("complete", mockFile);
                                                dropzone.files.push(mockFile);
                                            }, 200);

                                            setTimeout(() => {
                                                if (mockFile.previewElement) {
                                                    const thumbnailElement = mockFile.previewElement
                                                        .querySelector("img");

                                                    if (thumbnailElement) {
                                                        const fancyLink = document.createElement("a");
                                                        fancyLink.href = window.location.origin + imagem.path;
                                                        fancyLink.setAttribute("data-fancybox", "gallery");

                                                        const parent = thumbnailElement.parentNode;
                                                        parent.replaceChild(fancyLink, thumbnailElement);
                                                        fancyLink.appendChild(thumbnailElement);
                                                    }
                                                }
                                            }, 300);
                                        });
                                    @endif
                                });
                            </script>

                            <div class="card-body">
                                <div class="dropzone bg-light-subtle py-5 dz-clickable" id="imagesProductDropZone">
                                    <div class="dz-message needsclick">
                                        <i class="ri-upload-cloud-2-line fs-48 text-primary"></i>
                                        <h3 class="mt-4">Solte aqui ou <span class="text-primary">clique para
                                                navegar</span></h3>
                                        <span class="text-muted fs-13">Apenas uma imagem PNG ou JPG.</span>
                                    </div>
                                </div>
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
                                            <input class="form-check-input me-2" type="checkbox" role="switch"
                                                id="flexSwitchCheckChecked" name="published"
                                                {{ isset($product) && $product->published == 0 ? '' : 'checked' }}>
                                            <label class="form-check-label" for="flexSwitchCheckChecked"
                                                data-bs-toggle="tooltip" data-bs-placement="right"
                                                data-bs-title="Marque essa opção para mostrar o seguro no site.">Publicar
                                                <span><i class='bx bx-question-mark'></i></span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>



                    <div class="mb-3 rounded">
                        <div class="row justify-content-end g-2">
                            <div class="col-lg-2">
                                <a href="{{ route('product.index') }}"
                                    onclick="return isFormChanged = false confirm('Tem certeza que deseja cancelar?');"
                                    class="btn btn-outline-primary  w-100">Cancelar</a>
                            </div>
                            <div class="col-lg-2">
                                <a class="btn btn-danger w-100 btn-salvar-seguro" style="border: none">Salvar
                                    seguro</a>
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
                    url: '/admin/seguros/create/upload-image-content',
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
                editor.value = '{!! str_replace(["\r", "\n"], '', $product->content) !!}';
            @endif

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
            $('.btn-salvar-seguro').click(function(e) {
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
