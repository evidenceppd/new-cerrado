@extends('layouts.admin')

@section('title')
    Grade de posts
@endsection

@section('content')
    @if (\Session::has('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Toastify({
                    text: "{{ \Session::get('success') }}",
                    gravity: "top",
                    position: "center",
                    duration: 3000,
                    close: true,
                    backgroundColor: "#5cc184",
                }).showToast();
            });
        </script>
    @elseif(\Session::has('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Toastify({
                    text: "{{ \Session::get('success') }}",
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
                        <div class="d-flex align-items-center gap-2">
                            <h4 class="mb-0 fw-semibold">Grade de posts</h4>
                            <a href="{{ route('blog.create') }}"
                                class=" btn btn-sm btn-outline-light rounded bg-green text-white">
                                <i class='bx bx-plus'></i> Adicionar
                            </a>
                        </div>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Painel de Controle</a></li>
                            <li class="breadcrumb-item active">Grade de posts</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        @if (count($posts) < 1)
                            <div class="col-12">
                                <h5 class="mb-0 fw-semibold">Nenhum post cadastrado no sistema.</h4>
                            </div>
                        @endif
                        @foreach ($posts as $post)
                            <div class="col-lg-3 col-md-6">
                                <a href="{{ route('blog.edit', $post->id) }}">
                                    <div class="card overflow-hidden">
                                        <div class="position-relative card-image">
                                            <img src="{{ isset($post->main_image) ? $post->main_image : '/assets_admin/images/product/placeholder.jpg' }}"
                                                alt="" class="img-fluid rounded-top">
                                            <span class="position-absolute top-0 start-0 p-1">
                                            </span>


                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <a href="{{ route('blog.edit', $post->id) }}"
                                                        class="text-dark fw-medium fs-16">{{ $post->title }}</a>
                                                </div>
                                            </div>
                                            <span class="mt-2 d-flex">Visualizações</span>
                                            <div class="d-flex flex-direction-row gap-2 ">
                                                <span class="badge bg-light-subtle text-muted border fs-12">
                                                    <span class="fs-16"><i class="ri-macbook-line"></i></span>
                                                    {{ $viewsMobile = $post->analytics->where('deviceType', 2)->sum('views') }}
                                                    Desktop
                                                </span>
                                                <span class="badge bg-light-subtle text-muted border fs-12">
                                                    <span class="fs-16"><i class="ri-smartphone-line"></i></span>
                                                    {{ $viewsMobile = $post->analytics->where('deviceType', 1)->sum('views') }}
                                                    Mobile
                                                </span>
                                                <span class="badge bg-light-subtle text-muted border fs-12">
                                                    <span class="fs-16"><i class="ri-eye-line"></i></span>
                                                    {{ $post->analytics->sum('views') }} Total
                                                </span>
                                            </div>

                                        </div>
                                        <div
                                            class="card-footer bg-light-subtle d-flex justify-content-end align-items-center border-top">
                                            <div>
                                                <a href="{{ route('blog.show', $post->url) }}" target="_blank"
                                                    class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken"
                                                        class="align-middle fs-18"></iconify-icon></a>
                                                <a href="{{ route('blog.edit', $post->id) }}"
                                                    class="btn btn-soft-primary btn-sm"><iconify-icon
                                                        icon="solar:pen-2-broken"
                                                        class="align-middle fs-18"></iconify-icon></a>
                                                <form style="display: inline"
                                                    action="{{ route('blog.delete', $post->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        onclick="return confirm('Tem certeza que deseja pagar esse post? \nEssa ação não pode ser desfeita.')"
                                                        class="btn btn-soft-danger btn-sm ml-10"><iconify-icon
                                                            icon="solar:trash-bin-minimalistic-2-broken"
                                                            class="align-middle fs-18"></iconify-icon></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    @if (Route::is('blog.search') != true)
                        <div class="p-3 border-top">
                            {!! $posts->links() !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
