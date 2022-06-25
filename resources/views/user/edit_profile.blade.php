@extends('layouts.main_without_menu')

@push('navbar')
    @include('partials.navbar')
@endpush

@section('content')
    <div class="container mt-4">
        <div class="nav-align-top mb-4">
            <ul class="nav nav-pills mb-3" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home" aria-selected="true">
                        Edit Biodata
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile"
                        aria-selected="false">
                        Edit Profile
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-top-password" aria-controls="navs-pills-top-password"
                        aria-selected="false">
                        Ubah Password
                    </button>
                </li>
            </ul>
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ session()->get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="tab-content">
                <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
                    @include('user.partials.edit_biodata')
                </div>
                <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
                    @include('user.partials.edit_profile')
                </div>
                <div class="tab-pane fade" id="navs-pills-top-password" role="tabpanel">
                    @include('user.partials.ubah_password')
                </div>
            </div>
        </div>
    </div>
@endsection
