@extends('layouts.main')

@section('content')
    <!-- Content -->
    <div class="container mt-4">
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
