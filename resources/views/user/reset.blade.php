@extends('tugas.layouts.main')
@push('styles')
    <link rel="stylesheet" href="/vendor/css/pages/page-auth.css" />
@endpush

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">
                <!-- Forgot Password -->
                <div class="card">
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                {{ session()->get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session()->has('error_email'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                {{ session()->get('error_email') }}
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
                        <!-- /Logo -->
                        <h4 class="mb-2">Buat Password Baru</h4>
                        <p class="mb-4">Password Baru Untuk : {{ request('email') }}</p>
                        <form id="formAuthentication" class="mb-3" action="/user/reset" method="POST">
                            @csrf
                            <input type="hidden" name="email" value="{{ request('email') }}">
                            <input type="hidden" name="token" value="{{ request('token') }}">
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password_baru">Password Baru</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password_baru"
                                        class="form-control @error('password_baru') is-invalid @enderror"
                                        name="password_baru"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    @error('password_baru')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password_baru_repeat">Password Repeat</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password_baru_repeat"
                                        class="form-control @error('password_baru_repeat') is-invalid @enderror"
                                        name="password_baru_repeat"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    @error('password_baru_repeat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <button class="btn btn-primary d-grid w-100">Reset Password</button>
                        </form>
                    </div>
                </div>
                <!-- /Forgot Password -->
            </div>
        </div>
    </div>
@endsection
