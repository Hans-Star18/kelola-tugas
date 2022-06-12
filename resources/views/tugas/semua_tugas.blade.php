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

    <link rel="stylesheet" href="/vendor/libs/apex-charts/apex-charts.css" />
@endpush

@push('scripts')
    <!-- build:js assets/vendor/js/core.js -->
    <script src="/vendor/libs/swiper/swiper-bundle.min.js"></script>
    <script src="/vendor/libs/jquery/jquery.js"></script>
    <script src="/vendor/libs/popper/popper.js"></script>
    <script src="/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/vendor/js/bootstrap.js"></script>
    <script src="/vendor/js/menu.js"></script>

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
    <!-- Content -->
    <div class="container mt-4">
        <div class="bs-toast toast toast-placement-ex bg-success top-0 start-0 fade {{ session()->has('success') ? 'show' : '' }} m-2"
            role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="bx bx-bell me-2"></i>
                <div class="me-auto fw-semibold">Notifikasi</div>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('success') }}
            </div>
        </div>
        <div class="col-xl-12">
            <div class="nav-align-top mb-4">
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-justified-home" aria-controls="navs-justified-home" aria-selected="true">
                            <i class="tf-icons bx bx-check"></i> Selesai
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile"
                            aria-selected="false">
                            <i class="tf-icons bx bx-x"></i> Belum Selesai
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-justified-messages" aria-controls="navs-justified-messages"
                            aria-selected="false">
                            <i class="tf-icons bx bx-time"></i> Lewat Waktu
                        </button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
                        @include('tugas.kelola_tugas.tugas_selesai')
                    </div>
                    <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
                        @include('tugas.kelola_tugas.tugas_belum_selesai')
                    </div>
                    <div class="tab-pane fade" id="navs-justified-messages" role="tabpanel">
                        @include('tugas.kelola_tugas.tugas_lewat_waktu')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
