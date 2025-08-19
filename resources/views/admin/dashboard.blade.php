@extends('layouts.admin')

@section('title')
    Painel de Controle
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="mb-0 fw-semibold">Painel de Controle</h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Painel de Controle</a></li>
                            <li class="breadcrumb-item active">Início</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-3">
                                    <div class="avatar-md bg-light bg-opacity-10 rounded">
                                        <i class="ri-eye-line fs-32 text-primary avatar-title"></i>
                                    </div>

                                </div>
                                <div class="col-9">
                                    <p class="text-muted mt-0 mb-0">Quantidade de Visualizações <b>(hoje)</b></p>
                                    <h3 class="text-dark fw-bold d-flex align-items-center gap-2 mb-0">
                                        {{ $analytics['viewsToday']['allViews'] }}
                                        @php
                                            $percentage = $analytics['viewTodayPercentage'];
                                            $isPositive = $percentage >= 0;
                                        @endphp

                                        <span
                                            class="badge fs-12 {{ $isPositive ? 'text-success bg-success-subtle' : 'text-danger bg-danger-subtle' }}">
                                            <i class="{{ $isPositive ? 'ri-arrow-up-line' : 'ri-arrow-down-line' }}"></i>
                                            {{ abs($percentage) }}% semana passada
                                        </span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-3">
                                    <div class="avatar-md bg-light bg-opacity-10 rounded">
                                        <i class="ri-news-line fs-32 text-primary avatar-title"></i>
                                    </div>

                                </div>
                                <div class="col-9">
                                    <p class="text-muted mt-0 mb-0">Total de Seguros</p>
                                    <h3 class="text-dark fw-bold d-flex align-items-center gap-2 mb-0">
                                        {{ $products->total() }}
                                        <span class="badge text-success bg-success-subtle fs-12">ativos</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-3">
                                    <div class="avatar-md bg-light bg-opacity-10 rounded">
                                        <i class="ri-macbook-line fs-32 text-primary avatar-title"></i>
                                    </div>

                                </div>
                                <div class="col-9">
                                    <p class="text-muted mt-0 mb-0">Acessos desktop <b>(hoje)</b></p>
                                    <h3 class="text-dark fw-bold d-flex align-items-center gap-2 mb-0">
                                        {{ $analytics['viewsToday']['viewsDesktop'] }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-3">
                                    <div class="avatar-md bg-light bg-opacity-10 rounded">
                                        <i class="ri-smartphone-line fs-32 text-primary avatar-title"></i>
                                    </div>

                                </div>
                                <div class="col-9">
                                    <p class="text-muted mt-0 mb-0">Acessos mobile <b>(hoje)</b></p>
                                    <h3 class="text-dark fw-bold d-flex align-items-center gap-2 mb-0">
                                        {{ $analytics['viewsToday']['viewsMobile'] }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Visualizações Semanais</h4>
                        </div>
                        <div class="card-body">
                            <div id="sales_funnel" class="apex-charts mt-4"></div>
                        </div>
                        <div class="card-footer border-top d-flex align-items-center justify-content-between">
                            <p class="text-muted fw-medium fs-15 mb-0"><span class="text-dark me-1">Total de visitais nesse
                                    mês:</span>{{ $analytics['viewsMonth'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="card-title">Seguros mais vistos</h4>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table align-middle text-nowrap table-hover table-centered mb-0">
                                    <thead class="bg-light-subtle">
                                        <tr>
                                            <th>#</th>
                                            <th>Título</th>
                                            <th><i class="ri-eye-line fs-18 text-primary avatar-title"></i></th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($moreViewSecures as $index => $post)
                                            <tr>
                                                <td>
                                                    {{ ++$index }}°
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div>
                                                            <img src="{{ isset($post->main_image) ? $post->main_image : '/assets_admin/images/product/placeholder.jpg' }}"
                                                                data-fancybox="gallery" alt=""
                                                                class="avatar-md rounded border"
                                                                style="cursor: pointer; object-fit:cover;">
                                                        </div>
                                                        <div
                                                            style="max-width: 100px; text-overflow:ellipsis; overflow: hidden;">
                                                            <a href="{{ route('product.show', $post->slug) }}"
                                                                class="text-dark fw-medium fs-15">{{ $post->name }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $post->analytics->sum('views') }}</td>
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <a href="{{ route('product.show', $post->slug) }}" target="_blank"
                                                            class="btn btn-light btn-sm"><iconify-icon
                                                                icon="solar:eye-broken"
                                                                class="align-middle fs-18"></iconify-icon></a>
                                                        <a href="{{ route('product.edit', $post->slug) }}"
                                                            class="btn btn-soft-primary btn-sm"><iconify-icon
                                                                icon="solar:pen-2-broken"
                                                                class="align-middle fs-18"></iconify-icon></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="card-title">Últimos Seguros adicionados</h4>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table align-middle text-nowrap table-hover table-centered mb-0">
                                    <thead class="bg-light-subtle">
                                        <tr>
                                            <th>Imagem e nome do Seguro</th>
                                            <th>Categorias</th>
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div>
                                                            <a data-fancybox="gallery" href="{{ $product->main_image }}"
                                                                class="avatar-md d-block rounded border border-light border-3 overflow-hidden">
                                                                <img src="{{ $product->main_image }}"
                                                                    alt="{{ $product->name }}"
                                                                    style="width: 100%; height: 100%; object-fit: cover;">
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a href="{{ route('product.edit', $product->id) }}"
                                                                class="text-dark fw-medium fs-15">{{ $product->name }}</a>
                                                        </div>
                                                    </div>

                                                </td>
                                                <td>{!! $product->categories->pluck('name')->implode('<br>') !!}</td>
                                                <td> <span
                                                        class="badge {{ $product->published == 1 ? 'bg-success-subtle text-success' : 'bg-warning-subtle text-warning' }} py-1 px-2 fs-13">{{ $product->published == 1 ? 'Ativo' : 'Rascunho' }}</span>
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <a href="{{ route('product.show', $product->slug) }}"
                                                            target="_blank" class="btn btn-light btn-sm"><iconify-icon
                                                                icon="solar:eye-broken"
                                                                class="align-middle fs-18"></iconify-icon></a>
                                                        <a href="{{ route('product.edit', $product->id) }}"
                                                            class="btn btn-soft-primary btn-sm"><iconify-icon
                                                                icon="solar:pen-2-broken"
                                                                class="align-middle fs-18"></iconify-icon></a>
                                                        <form style="display: inline"
                                                            action="{{ route('product.delete', $product->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit"
                                                                onclick="return confirm('Tem certeza que deseja pagar esse Seguro? \nEssa ação não pode ser desfeita.')"
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
                            </div>
                            <!-- end table-responsive -->
                            @if ($products->total() > 10)
                                <div class="card-footer">
                                    {!! $products->links() !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection

    @section('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Toastify({
                    text: "Dados carregados com sucesso!",
                    gravity: "top",
                    position: "center",
                    duration: 3000,
                    close: true,
                    backgroundColor: "#5cc184",
                }).showToast();
            });

            const weekViews = @json($analytics['viewsWeek']['views']);
            const labels = @json($analytics['viewsWeek']['labels']);
        </script>



        <!-- Dashboard Js -->
        <script src="/assets_admin/js/pages/dashboard-analytics.js"></script>
    @endsection
