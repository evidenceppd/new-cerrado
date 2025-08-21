@extends('layouts.admin')

@section('title')
    Lista de banner
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
                            <h4 class="mb-0 fw-semibold">Lista de banner</h4>
                            <a href="{{ route('banner.create') }}"
                                class=" btn btn-sm btn-outline-light rounded bg-green text-white">
                                <i class='bx bx-plus'></i> Adicionar
                            </a>
                        </div>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Painel de Controle</a></li>
                            <li class="breadcrumb-item active">banner</li>
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
                                <h4 class="card-title mb-0">Lista de todas as banner</h4>
                            </div>
                        </div>
                        <div class="table-responsive">
                            @if (count($banners) < 1)
                                <div class="card-header d-flex justify-content-between align-items-center border-bottom">
                                    <div>
                                        <h4 class="card-title mb-0">Nenhum banner cadastrado no sistema.</h4>
                                    </div>
                                </div>
                            @else
                                <table class="table align-middle text-nowrap table-hover table-centered mb-0">
                                    <thead class="bg-light-subtle">
                                        <tr>
                                            <th>Imagem do banner</th>
                                            {{-- <th>Visualizações dá página (esse mês)</th> --}}
                                            <th>Imagem do banner para celulares</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($banners as $banner)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div>
                                                            <a data-fancybox="gallery" href="{{ $banner->foto_banner }}"
                                                                class="avatar-md d-block rounded border border-light border-3 overflow-hidden" style="width: 70%; height:auto">
                                                                <img onerror="this.onerror=null;this.src='/assets/images/image.jpg';"
                                                                    src="{{ $banner->foto_banner != null ? $banner->foto_banner : '/assets/images/image.jpg' }}"
                                                                    style="width: 100%; height: 100%; object-fit: cover;"
                                                                    alt="">
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a href="{{ route('banner.edit', $banner->id) }}"
                                                                class="text-dark fw-medium fs-15">{{ $banner->name }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div>
                                                            <a data-fancybox="gallery" href="{{ $banner->banner_mobile }}"
                                                                class="avatar-md d-block rounded border border-light border-3 overflow-hidden" style="width: 50%; height:auto">
                                                                <img onerror="this.onerror=null;this.src='/assets/images/image.jpg';"
                                                                    src="{{ $banner->banner_mobile != null ? $banner->banner_mobile : '/assets/images/image.jpg' }}"
                                                                    style="width: 100%; height: 100%; object-fit: cover;"
                                                                    alt="">
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a href="{{ route('banner.edit', $banner->id) }}"
                                                                class="text-dark fw-medium fs-15">{{ $banner->name }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                {{-- <td>
                                                    <p class="mb-0"><i class="ri-eye-line"></i>
                                                        {{ $banner->analytics->sum('views') }}
                                                    </p>
                                                </td> --}}
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        {{-- <a href="{{ route('banner.show', $banner->slug) }}"
                                                            class="btn btn-light btn-sm"><iconify-icon
                                                                icon="solar:eye-broken"
                                                                class="align-middle fs-18"></iconify-icon></a> --}}
                                                        <a href="{{ route('banner.edit', $banner->id) }}"
                                                            class="btn btn-soft-primary btn-sm"><iconify-icon
                                                                icon="solar:pen-2-broken"
                                                                class="align-middle fs-18"></iconify-icon></a>
                                                        <form style="display: inline"
                                                            action="{{ route('banner.delete', $banner->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit"
                                                                onclick="return confirm('Tem certeza que deseja pagar essa banner? \nEssa ação não pode ser desfeita.')"
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
                        @if (count($banners) > 10)
                            <div class="card-footer">
                                {!! $banners->links() !!}
                            </div>
                        @endif
                    </div>
                </div>

            </div>


        </div>
        <!-- End Container Fluid -->

    </div>
@endsection
