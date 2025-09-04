@extends('layouts.admin')

@section('title')
    Editar Lead
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
                            {{ isset($lead->id) ? 'Editar Lead' : 'Adicionar Lead' }}</h4>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Painel de Controle</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('blog.index') }}">Leads</a></li>
                            <li class="breadcrumb-item active">{{ isset($lead->id) ? 'Editar' : 'Adicionar' }}</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form
                        action="{{ isset($lead) && isset($lead->id) ? route('leads.update', $lead->id) : route('leads.store') }}"
                        id="form-info-blog" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Nome:</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="name"><i
                                                        class="ri-user-line align-middle fs-18"></i></span>
                                                <input type="text" class="form-control" id="name"
                                                    aria-describedby="name" name="name" placeholder="Nome do produto"
                                                    value="{{ isset($lead) ? $lead->name : '' }}" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Telefone/WhatsApp:</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="telefone"><i
                                                        class="ri-phone-fill align-middle fs-18"></i></span>
                                                <input type="text" class="form-control" id="telefone"
                                                    aria-describedby="telefone" name="telefone"
                                                    placeholder="Telefone/WhatsApp" data-toggle="input-mask"
                                                    data-mask-format="(00) 00000-0000"
                                                    value="{{ isset($lead) ? $lead->telefone : '' }}" required>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Campos personalizados</h4>
                            </div>
                            <div class="card-body" id="customFields">
                                <div class="row">

                                </div>
                            </div>
                    </form>
                    <div class="mb-3 rounded">
                        <div class="row justify-content-end g-2">
                            <div class="col-lg-2">
                                <a href="{{ route('leads.index') }}"
                                    onclick="return isFormChanged = false confirm('Tem certeza que deseja cancelar?');"
                                    class="btn btn-outline-primary  w-100">Cancelar</a>
                            </div>
                            <div class="col-lg-2">
                                <a class="btn btn-danger w-100 btn-salvar-Produto" style="border: none">Salvar
                                    Lead</a>
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
    <script>
        var html = '';
        var data = @json(json_decode($lead->data, true));
        Object.entries(data).forEach(function([chave, valor]) {
            html +=
                `<div class="col-6"><div class="mb-3"><label for="${chave}" class="form-label" style="text-transform: capitalize;">${chave}:</label><div class="input-group"><span class="input-group-text" id="${chave}"><i class="ri-user-line align-middle fs-18"></i></span><input type="text" class="form-control" id="${chave}"aria-describedby="${chave}" value="${valor}" name="${chave}"></div></div></div>`;
        });
        $("#customFields .row").html(html);
    </script>
@endsection