@extends('layouts.admin')

@section('title')
    Adicionar Post
@endsection

@section('css')
    {{-- <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" /> --}}
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
                            {{ isset($post->id) ? 'Editar Post' : 'Adicionar Post' }}</h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Painel de Controle</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('blog.index') }}">Post</a></li>
                            <li class="breadcrumb-item active">{{ isset($post->id) ? 'Editar' : 'Adicionar' }}</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form
                        action="{{ isset($post) && isset($post->id) ? route('blog.update', $post->id) : route('blog.store') }}"
                        id="form-info-blog" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="uuid" id="uuid_input">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Título</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="title"><i
                                                        class="ri-news-line align-middle fs-18"></i></span>
                                                <input type="text" class="form-control" id="title"
                                                    aria-describedby="title" name="title"
                                                    value="{{ isset($post) ? $post->title : '' }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="autor" class="form-label" data-bs-toggle="tooltip"
                                                data-bs-placement="right"
                                                data-bs-title="Se deixar em branco, será usado o usuário autenticado como autor.">Autor
                                                <span><i class='bx bx-question-mark'></i></span></label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="autor"><i
                                                        class="ri-user-line align-middle fs-18"></i></span>
                                                <input type="text" class="form-control" id="autor"
                                                    aria-describedby="autor" name="author"
                                                    {{ isset($post) ? $post->autor : '' }}>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="content" class="mb-2">Conteúdo</label>
                                        <textarea id="content" name="content" class="form-control" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Imagem principal da postagem</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <input type="file" name="main_image" class="form-control" aria-label="file"
                                            accept="image/*" {{ isset($post->main_image) ? '' : 'required=""' }}>
                                    </div>
                                    @if (isset($post->main_image))
                                        <div class="col-12 col-lg-3 mb-3">
                                            <img src="{{ $post->main_image }}" alt="{{ $post->title }}"
                                                class="img-fluid rounded">
                                        </div>
                                        <input type="hidden" name="main_image_existing" value="{{ $post->main_image }}">
                                    @endif
                                </div>


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
                                            <input class="form-check-input me-2" type="checkbox" role="switch"
                                                id="flexSwitchCheckChecked" name="published"
                                                {{ isset($post) && $post->published == 0 ? '' : 'checked' }}>
                                            <label class="form-check-label" for="flexSwitchCheckChecked"
                                                data-bs-toggle="tooltip" data-bs-placement="right"
                                                data-bs-title="Marque essa opção para mostrar o post no site.">Publicar
                                                <span><i class='bx bx-question-mark'></i></span></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-check form-switch">
                                            <label class="form-check-label" for="datetime-datepicker"
                                                data-bs-toggle="tooltip" data-bs-placement="right"
                                                data-bs-title="Selecione a data de programação do post. Se deixar em branco será publicado na imediatamente.">Programar
                                                <span><i class='bx bx-question-mark'></i></span></label>
                                            <input type="text" id="datetime-datepicker" class="form-control"
                                                placeholder="Data e hora de publicação">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>



                    <div class="mb-3 rounded">
                        <div class="row justify-content-end g-2">
                            <div class="col-lg-2">
                                <a href="{{ route('blog.index') }}"
                                    onclick="return isFormChanged = false confirm('Tem certeza que deseja cancelar?');"
                                    class="btn btn-outline-primary  w-100">Cancelar</a>
                            </div>
                            <div class="col-lg-2">
                                <a class="btn btn-danger w-100 btn-salvar-post" style="border: none">Salvar
                                    post</a>
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
            $('#preco-aluguel, #preco-venda, #iptu').mask('#.##0,00', {
                reverse: true
            });
            const content = `{!! isset($post->content) ? str_replace(["\r", "\n"], '', $post->content) : '' !!}`;
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            const editor = Jodit.make("#content", {
                useSearch: false,
                height: 150,
                minHeight: 500,
                language: 'pt_br',
                uploader: {
                    url: '/admin/blog/create/upload-image-content',
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

            @if (isset($post->content))
                editor.value = '{!! str_replace(["\r", "\n"], '', $post->content) !!}';
            @endif
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.btn-salvar-post').click(function(e) {
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

            // Inicializa o flatpickr e guarda a instância
            const fp = flatpickr("#datetime-datepicker", {
                enableTime: true,
                dateFormat: "d/m/Y H:i",
            });

            // Alterna o estado com base no switch
            $('#flexSwitchCheckChecked').change(function() {
                const isChecked = $(this).is(":checked");
                const flatpickrInput = fp.input;

                if (isChecked) {
                    // Desabilita o flatpickr e o input
                    fp.set("clickOpens", false); // Impede que o calendário abra ao clicar
                    flatpickrInput.setAttribute("disabled", "disabled");
                    fp.close(); // Fecha o calendário se estiver aberto
                } else {
                    // Reabilita o flatpickr e o input
                    fp.set("clickOpens", true); // Permite que o calendário abra novamente
                    flatpickrInput.removeAttribute("disabled");
                }
            });


        })
    </script>
@endsection
