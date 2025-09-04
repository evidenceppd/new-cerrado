@extends('layouts.admin')

@section('title')
    Lista de leads
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
    <!-- ==================================================== -->
    <!-- Start right Content here -->
    <!-- ==================================================== -->
    <div class="page-content">

        <!-- Start Container Fluid -->
        <div class="container-fluid">

            <!-- ========== Page Title Start ========== -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="d-flex align-items-center gap-2">
                            <h4 class="mb-0 fw-semibold">Lista de Leads</h4>
                        </div>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Painel de Controle</a></li>
                            <li class="breadcrumb-item active">Leads</li>
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
                                <h4 class="card-title mb-0">Lista de Leads</h4>
                            </div>
                        </div>
                        <div class="table-responsive">
                            @if (count($leads) < 1)
                                <div class="card-header d-flex justify-content-between align-items-center border-bottom">
                                    <div>
                                        <h4 class="card-title mb-0">Nenhum lead cadastrado no sistema.</h4>
                                    </div>
                                </div>
                            @else
                                <table class="table align-middle text-nowrap table-hover table-centered mb-0">
                                    <thead class="bg-light-subtle">
                                        <tr>
                                            <th>Nome</th>
                                            <th>Referência</th>
                                            <th>Data de registro</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($leads as $lead)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div>
                                                            <div class="avatar-sm bg-light bg-opacity-10 rounded">
                                                                <i class="ri-user-line fs-18 text-primary avatar-title"></i>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <a href="{{ route('leads.edit', $lead->id) }}"
                                                                class="text-dark fw-medium fs-15">{{ $lead->name }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="mb-0">
                                                        @switch($lead->typeRegister)
                                                            @case(1)
                                                                Donwload Catálogo
                                                            @break

                                                            @case(2)
                                                                Formulário
                                                            @break
                                                        @endswitch
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="mb-0">
                                                        {{ date_format(date_create($lead->created_at), 'd/m/Y à\s H:i:s') }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <a href="" class="btn btn-light btn-sm"><iconify-icon
                                                                icon="solar:eye-broken"
                                                                class="align-middle fs-18"></iconify-icon></a>
                                                        <a href="{{ route('leads.edit', $lead->id) }}"
                                                            class="btn btn-soft-primary btn-sm"><iconify-icon
                                                                icon="solar:pen-2-broken"
                                                                class="align-middle fs-18"></iconify-icon></a>
                                                        <form style="display: inline"
                                                            action="{{ route('leads.delete', $lead->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit"
                                                                onclick="return confirm('Tem certeza que deseja pagar esse lead? \nEssa ação não pode ser desfeita.')"
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
                        @if ($leads->total() > 10)
                            <div class="card-footer">
                                {!! $leads->links() !!}
                            </div>
                        @endif
                    </div>
                </div>

            </div>


        </div>
        <!-- End Container Fluid -->

    </div>
@endsection