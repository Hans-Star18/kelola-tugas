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

    <!-- Main JS -->
    <script src="/js/script.js"></script>
    <script src="/js/main.js"></script>
@endpush

@push('footer')
    @include('partials.footer')
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

        <div class="card">
            <h5 class="card-header">Tambah Tugas Baru</h5>
            <div class="card-body">
                <form action="/tugas" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="status" name="status_id" value="0">
                    <input type="hidden" id="create" name="tanggal_dibuat" value="{{ date('d-m-Y h:i:s') }}">
                    <input type="hidden" id="update" name="tanggal_dikumpul" value="{{ date('d-m-Y h:i:s') }}">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <label for="pilihMataPelajaran" class="form-label">Mata Pelajaran</label>
                        <select class="form-select @error('mata_pelajaran_id') is-invalid @enderror" id="pilihMataPelajaran"
                            aria-label="Default select example" name="mata_pelajaran_id">
                            <option selected>Pilih Mata Pelajaran</option>
                            @foreach ($mataPelajaran as $MP)
                                <option value="{{ $MP->id }}">{{ $MP->mata_pelajaran }}</option>
                            @endforeach
                        </select>
                        @error('mata_pelajaran_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <label for="deadline" class="form-label">Tanggal Dikumpul</label>
                        <input class="form-control @error('deadline_at') is-invalid @enderror" type="datetime-local"
                            id="deadline" name="deadline_at" value="{{ old('deadline_at') }}" />
                        @error('deadline_at')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="judulTugas" class="form-label">Judul Tugas</label>
                        <input type="text" class="form-control @error('judul_tugas') is-invalid @enderror" id="judulTugas"
                            placeholder="Tugas Integral" name="judul_tugas" value="{{ old('judul_tugas') }}" />
                        @error('judul_tugas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="deskripsiTugas" class="form-label">Deskripsi Tugas</label>
                        <textarea class="form-control" id="deskripsiTugas" rows="3" name="deskripsi_tugas"
                            placeholder="Kerjakan tugas integral yang ada di halaman 25 di kertas lempiran."></textarea>

                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="row justify-content-between">
                            <div class="col">
                                <label for="inputFile" class="form-label">Upload Tugas (png, jpg, jpeg, pdf)</label>
                            </div>
                            <div class="col">
                                <a href="javascript:void(0);" class="float-end tombol-multiple">
                                    <i class='bx bx-plus'></i>
                                </a>
                            </div>
                        </div>
                        <div class="form-input-media" id="inputMedia">
                            <input class="form-control {{ session('error') ? 'is-invalid' : '' }} mb-1" type="file"
                                id="inputFile" name="media_tugas" />
                            @if (session('error'))
                                <div class="invalid-feedback">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Tambah</button>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
