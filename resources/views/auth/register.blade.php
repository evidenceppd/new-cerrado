@extends('layouts.guest')

@section('title')
    Registrar | {{ env('APP_NAME') }}
@endsection

@section('content')
    <div class="col-xl-5">
        <div class="card auth-card">
            <div class="card-body px-3 py-4">
                <div class="mx-auto mb-4 text-center auth-logo">
                    <a href="index.html" class="logo-dark">
                        <img src="/assets_admin/images/logo.png" height="100" class="img-fluid" alt="logo dark">
                    </a>

                    <a href="index.html" class="logo-light">
                        <img src="/assets_admin/images/logo.webp" height="100" class="img-fluid" alt="logo light">
                    </a>
                </div>

                <p class="text-muted text-center mt-1 mb-4">Registre-se para acessar o painel.</p>

                <div class="px-4">
                    <form method="POST" action="{{ route('register') }}" class="authentication-form">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="nome">Nome</label>
                            <input type="name" id="nome" name="name"
                                class="form-control bg-opacity-50 border-light py-2" placeholder="Insira seu nome">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="example-email">E-mail</label>
                            <input type="email" id="example-email" name="email"
                                class="form-control bg-opacity-50 border-light py-2" placeholder="Insira seu e-mail">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="example-password">Senha</label>
                            <input type="password" id="example-password" name="password"
                                class="form-control bg-opacity-50 border-light py-2" placeholder="Insira sua senha">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password_confirmation">Confirmação de senha</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control bg-opacity-50 border-light py-2" placeholder="Confirme a sua senha">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="remember" id="checkbox-signin">
                                <label class="form-check-label" for="checkbox-signin">Lembrar de mim</label>
                            </div>
                        </div>

                        <div class="mb-1 text-center d-grid">
                            <button class="btn btn-danger py-2 fw-medium" type="submit">Login</button>
                        </div>
                    </form>

                </div> <!-- end col -->
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
@endsection
