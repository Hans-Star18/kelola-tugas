@extends('layouts.main_without_menu')

@push('navbar')
    @include('partials.navbar')
@endpush

@section('content')
    <div class="container mt-4">
        <div class="card px-5">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <img src="/media/profil.png" class="img-thumbnail" width="250px">
                    </div>
                    <div class="col-lg-9 col-md-6 information">
                        <h1 class="fw-bold d-inline">{{ auth()->user()->name }}</h1>
                        <span class="location"><i class='bx bx-map'></i> Tebuana, Taro, Tegallalang</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
