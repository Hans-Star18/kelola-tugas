@extends('tugas.layouts.main')
@push('styles')
    <link rel="stylesheet" href="/vendor/css/pages/page-auth.css" />
@endpush

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card overflow-hidden">
                    <div class="card-body ">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                {{ session()->get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session()->has('loginError'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                {{ session()->get('loginError') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="javascript:void(0)" class="app-brand-link gap-2">
                                <span class="app-brand-text demo text-body fw-bolder">Kelola Tugas</span>
                            </a>
                        </div>
                        <form id="formAuthentication" class="mb-3" action="/user/login" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email or Username</label>
                                <input type="text"
                                    class="form-control {{ session()->has('loginError') ? 'is-invalid' : '' }}"
                                    id="email" name="email_username" placeholder="Enter your email or username"
                                    autofocus value="{{ old('email_username') }}" />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                    <a href="">
                                        <small>Forgot Password?</small>
                                    </a>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password"
                                        class="form-control {{ session()->has('loginError') ? 'is-invalid' : '' }}"
                                        name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me" name="remember" />
                                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                            </div>
                        </form>

                        <p class="text-center">
                            <span>Belum punya akun?</span>
                            <a href="/user/registrasi">
                                <span>Buat akun.</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>
@endsection
