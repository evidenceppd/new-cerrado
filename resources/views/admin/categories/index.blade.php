@extends('layouts.admin')

@section('title')
    Lista de categorias
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

        <!-- Start Container Fluid -->
        <div class="container-fluid">

            <!-- ========== Page Title Start ========== -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="d-flex align-items-center gap-2">
                            <h4 class="mb-0 fw-semibold">Lista de categorias</h4>
                            <a href="{{ route('categories.create') }}"
                                class=" btn btn-sm btn-outline-light rounded bg-green text-white">
                                <i class='bx bx-plus'></i> Adicionar
                            </a>
                        </div>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Painel de Controle</a></li>
                            <li class="breadcrumb-item active">Categorias</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- ========== Page Title End ========== -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center border-bottom">
                            <div>
                                <h4 class="card-title mb-0">Lista de todas as categorias</h4>
                            </div>
                        </div>
                        <div class="table-responsive">
                            @if (count($categories) < 1)
                                <div class="card-header d-flex justify-content-between align-items-center border-bottom">
                                    <div>
                                        <h4 class="card-title mb-0">Nenhum categoria cadastrado no sistema.</h4>
                                    </div>
                                </div>
                            @else
                                <table class="table align-middle text-nowrap table-hover table-centered mb-0">
                                    <thead class="bg-light-subtle">
                                        <tr>
                                            <th>Imagem e nome da categoria</th>
                                            <th>Visualizações dá página (esse mês)</th>
                                            <th>Quantidade de Produtos</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($categories as $categorie)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div>
                                                            <a data-fancybox="gallery" href="{{ $categorie->main_image }}"
                                                                class="avatar-md d-block rounded border border-light border-3 overflow-hidden">
                                                                <img onerror="this.onerror=null;this.src='/assets/images/image.jpg';"
                                                                    src="{{ $categorie->main_image != null ? $categorie->main_image : '/assets/images/image.jpg' }}"
                                                                    style="width: 100%; height: 100%; object-fit: cover;"
                                                                    alt="">
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a href="{{ route('categories.edit', $categorie->id) }}"
                                                                class="text-dark fw-medium fs-15">{{ $categorie->name }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="mb-0"><i class="ri-eye-line"></i>
                                                        {{ $categorie->analytics->sum('views') }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="mb-0">{{ $categorie->products->count() }}</p>
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <a href="{{ route('categories.show', $categorie->slug) }}"
                                                            class="btn btn-light btn-sm"><iconify-icon
                                                                icon="solar:eye-broken"
                                                                class="align-middle fs-18"></iconify-icon></a>
                                                        <a href="{{ route('categories.edit', $categorie->id) }}"
                                                            class="btn btn-soft-primary btn-sm"><iconify-icon
                                                                icon="solar:pen-2-broken"
                                                                class="align-middle fs-18"></iconify-icon></a>
                                                        <form style="display: inline"
                                                            action="{{ route('categories.delete', $categorie->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit"
                                                                onclick="return confirm('Tem certeza que deseja pagar essa categoria? \nEssa ação não pode ser desfeita.')"
                                                                class="btn btn-soft-danger btn-sm ml-10"><iconify-icon
                                                                    icon="solar:trash-bin-minimalistic-2-broken"
                                                                    class="align-middle fs-18"></iconify-icon></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        <!-- end table-responsive -->
                        @if ($categories->total() > 10)
                            <div class="card-footer">
                                {!! $categories->links() !!}
                            </div>
                        @endif
                    </div>
                </div>

            </div>


        </div>
        <!-- End Container Fluid -->

    </div>
@endsection
