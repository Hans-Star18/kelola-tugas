@extends('layouts.main')

@push('styles')
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="/vendor/libs/swiper/swiper-bundle.min.css">

    <!-- Core CSS -->
    <link rel="stylesheet" href="/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/css/demo.css" />
    <link rel="stylesheet" href="/css/style.css">

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
@endpush

@push('scripts')
    <!-- build:js assets/vendor/js/core.js -->
    <script src="/vendor/libs/swiper/swiper-bundle.min.js"></script>
    <script src="/vendor/libs/jquery/jquery.js"></script>
    <script src="/vendor/libs/popper/popper.js"></script>
    <script src="/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/vendor/js/bootstrap.js"></script>

    <script src="/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Main JS -->
    <script src="/js/script.js"></script>
    <script src="/js/main.js"></script>
@endpush

@push('footer')
    @include('partials.footer')
@endpush

@push('modals')
    @include('tugas.partials.modals')
@endpush

@push('aside')
    @include('partials.aside')
@endpush

@push('navbar')
    @include('partials.navbar')
@endpush

@section('content')
    <div class="container mt-4">
        <div class="row">
            @if (session('errors') || session('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    Jawaban gagal dikumpulkan, ada yang error! — <a href='' data-bs-toggle="modal"
                        data-bs-target="#modalCenter">Cek error!</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @foreach ($tasks as $task)
                <div class="col-lg-3 col-md-4 mb-3">
                    <div
                        class="card text-center border {{ MyHelpers::strtodate($task->deadline_at)->diff()->invert == 1 ? 'border-warning' : 'border-danger' }}">
                        <div class="card-header">
                            {{ MyHelpers::strtodate($task->deadline_at)->diff()->invert == 0 ? 'Lewat Waktu' : 'Belum Selesai' }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $task->mata_pelajaran }}</h5>
                            <p class="card-text">{{ $task->judul_tugas }}</p>
                            <a href="" class="btn btn-primary tombol-kumpulkan" data-bs-toggle="modal"
                                data-bs-target="#modalCenter" data-id={{ $task->id }}>Kumpulkan</a>
                        </div>
                        <div class="card-footer text-muted">
                            {{ MyHelpers::strtodate($task->deadline_at)->diffForHumans() }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
