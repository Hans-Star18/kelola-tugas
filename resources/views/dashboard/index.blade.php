@extends('layouts.main')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Selamat datang Agus Suardiasa!</h5>
                                <p class="mb-4">
                                    kamu memiliki <span class="fw-bold">{{ $tasks->get()->count() }}</span> tugas,
                                    dengan
                                    tugas yang sudah selesai berjumlah
                                    {{ $tasks->get()->where('status_id', 1)->count() }}.
                                    Jadi masih
                                    {{ $tasks->get()->where('status_id', 0)->count() }} tugas lagi yang belum
                                    terselesaikan.
                                </p>

                                <a href="/tugas" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User"
                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-1 mb-4 overflow-hidden">
                <div class="row card-slider swiper overflow-hidden">
                    <div class="col-lg-6 col-sm-3 col-6 swiper-wrapper">
                        <div class="swiper-slide mx-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <img src="/img/icons/unicons/cc-primary.png" alt="cc primary"
                                                class="rounded" />
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="cardOpt3"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                                    data-bs-target="#modal-total-tugas">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                    <marquee behavior="" direction="">
                                        <span class="fw-semibold d-block mb-1">Total Tugas</span>
                                    </marquee>
                                    <h3 class="card-title mb-2">{{ $tasks->get()->count() }}</h3>
                                    <small class="text-success fw-semibold"><i class="bx bx-plus"></i>
                                        + {{ $tugasDibuatMingguIni->count() }}</small>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide mx-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <img src="/img/icons/unicons/cc-warning.png" alt="cc warning"
                                                class="rounded" />
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="cardOpt3"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                                <a class="dropdown-item " href="javascript:void(0);" data-bs-toggle="modal"
                                                    data-bs-target="#modal-tugas-belum-selesai">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                    <marquee behavior="" direction="">
                                        <span class="fw-semibold d-block mb-1">Tugas Belum Selesai</span>
                                    </marquee>
                                    <h3 class="card-title mb-2">{{ $tasks->get()->where('status_id', 0)->count() }}</h3>
                                    <small class="text-success fw-semibold"><i class="bx bx-plus"></i>
                                        {{ $belumSelesaiMingguIni->count() }}</small>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide mx-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <img src="/img/icons/unicons/cc-success.png" alt="cc success"
                                                class="rounded" />
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="cardOpt3"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                                <a class="dropdown-item " href="javascript:void(0);" data-bs-toggle="modal"
                                                    data-bs-target="#modal-tugas-sudah-selesai">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                    <marquee behavior="" direction="">
                                        <span class="fw-semibold d-block mb-1">Tugas Sudah Selesai</span>
                                    </marquee>
                                    <h3 class="card-title mb-2">{{ $tasks->get()->where('status_id', 1)->count() }}</h3>
                                    <small class="text-success fw-semibold"><i class="bx bx-plus"></i>
                                        + {{ $sudahSelesaiMingguIni->count() }}</small>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide mx-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <img src="/img/icons/unicons/chart-success.png" alt="chart success"
                                                class="rounded" />
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="cardOpt3"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                                <a class="dropdown-item " href="javascript:void(0);" data-bs-toggle="modal"
                                                    data-bs-target="#modal-tenggat-minggu-ini">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                    <marquee behavior="" direction="">
                                        <span class="fw-semibold d-block mb-1">Tenggat Minggu Ini</span>
                                    </marquee>
                                    <h3 class="card-title mb-2">{{ $tenggatMingguIni->count() }}</h3>
                                    <small class="text-success fw-semibold"><i class="bx bx-plus"></i>
                                        + {{ $tenggatMingguIni->count() }}</small>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide mx-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <img src="/img/icons/unicons/chart.png" alt="chart" class="rounded" />
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="cardOpt3"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                                <a class="dropdown-item " href="javascript:void(0);" data-bs-toggle="modal"
                                                    data-bs-target="#modal-tugas-lewat-waktu">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                    <marquee behavior="" direction="">
                                        <span class="fw-semibold d-block mb-1">Tugas Lewat Waktu</span>
                                    </marquee>
                                    <h3 class="card-title mb-2">{{ $tugasLewatWaktu->count() }}</h3>
                                    <small class="text-success fw-semibold"><i class="bx bx-plus"></i>
                                        + {{ $tugasLewatWaktuMingguIni->count() }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Revenue -->
            <div class="col-12 col-md-8 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card overflow-hidden" style="height: 376px">
                    <h5 class="card-header m-0 mb-0 pb-0">Semua Tugas</h5>
                    <div class="card-body mt-0 vertical-example">
                        <div class="demo-inline-spacing">
                            <div class="list-group">
                                @foreach ($tasks->get() as $task)
                                    <a href="javascript:void(0);"
                                        class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex justify-content-between w-100">
                                            <h6>{{ $task->judul_tugas }}</h6>
                                            <small>{{ $task->deadline_at->diffForHumans() }}</small>
                                        </div>
                                        <p class="mb-1">
                                            {{ $task->deskripsi_tugas }}
                                        </p>
                                        <div class="d-flex justify-content-between w-100">
                                            <small>{{ $task->mataPelajaran->mata_pelajaran }}</small>
                                            @if ($task->status_id == 1)
                                                <span class="badge badge-center rounded-pill bg-success ms-2"
                                                    data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right"
                                                    data-bs-html="true" title="Sudah Selesai">
                                                    <i class='tf-icons bx bx-check'></i>
                                                </span>
                                            @elseif ($task->status_id == 0 && $task->deadline_at->diff()->invert == 1)
                                                <span class="badge badge-center rounded-pill bg-warning ms-2"
                                                    data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right"
                                                    data-bs-html="true" title="Belum Selesai">
                                                    <i class='tf-icons bx bx-x'></i>
                                                </span>
                                            @else
                                                <span class=" badge badge-center rounded-pill bg-danger ms-2"
                                                    data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="right"
                                                    data-bs-html="true" title="Lewat Waktu">
                                                    <i class='tf-icons bx bx-time'></i>
                                                </span>
                                            @endif
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4 order-3 order-md-2 mb-4">
                <div class="card overflow-hidden" style="height: 376px">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Info Mingguan</h5>
                        </div>
                    </div>
                    <div class="card-body vertical-example">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex flex-column align-items-center gap-1">
                                <h2 class="mb-2 total-info">
                                    {{ $sudahSelesaiMingguIni->count() + $tugasDibuatMingguIni->count() + $tenggatMingguIni->count() }}
                                </h2>
                                <span>Info Minggu Ini</span>
                            </div>
                            <div id="infoStatistics"></div>
                        </div>
                        <ul class="p-0 m-0">
                            <li class="d-flex mb-2 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-success"><i
                                            class='bx bxs-calendar-check'></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0 info-mingguan">Tugas Selesai</h6>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold tugas-selesai tugas-nilai">
                                            {{ $sudahSelesaiMingguIni->count() }}
                                        </small>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-2 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-primary"><i
                                            class='bx bxs-calendar-plus'></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0 info-mingguan">Tugas Nambah</h6>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold tugas-nambah tugas-nilai">
                                            {{ $tugasDibuatMingguIni->count() }}
                                        </small>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-danger"><i
                                            class='bx bxs-calendar-exclamation'></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0 info-mingguan">Tenggat Minggu Ini</h6>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold tugas-tenggat tugas-nilai">
                                            {{ $tenggatMingguIni->count() }}
                                        </small>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
@include('partials.modals')
