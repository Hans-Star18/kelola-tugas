@extends('tugas.layouts.main')

@section('content')
    @if ($task->status_id == 0 && MyHelpers::strtodate($task->deadline_at)->diff()->invert == 1)
        <div class="mt-5 col-lg-8 shadow-none bg-transparent border border-warning rounded">
        @elseif($task->status_id == 0 && MyHelpers::strtodate($task->deadline_at)->diff()->invert == 0)
            <div class="mt-5 col-lg-8 shadow-none bg-transparent border border-danger rounded">
            @else
                <div class="mt-5 col-lg-8 shadow-none bg-transparent border border-success rounded">
    @endif

    <div class="card ">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <h5 class="card-title">{{ $task->judul_tugas }}</h5>
                    <p class="card-text">{{ $task->deskripsi_tugas }}</p>

                    @if ($task->status_id == 0 && MyHelpers::strtodate($task->deadline_at)->diff()->invert == 1)
                        <div class="badge bg-warning mb-2">{{ $task->status_name }}</div>
                        <div class="text-warning">
                            Batas Waktu : {{ MyHelpers::strtodate($task->deadline_at)->diffForHumans() }}
                        </div>
                    @elseif ($task->status_id == 0 && MyHelpers::strtodate($task->deadline_at)->diff()->invert == 0)
                        <div class="badge bg-danger mb-2">Lewat Waktu</div>
                        <div class="text-danger">
                            Tenggat Pada : {{ date('d - m - Y', strtotime($task->deadline_at)) }}
                        </div>
                    @else
                        <div class="badge bg-success mb-2">{{ $task->status_name }}</div>
                        <div class="text-success">
                            Dikumpul Pada : {{ date('d - m - Y', strtotime($task->tanggal_dikumpul)) }}
                        </div>
                    @endif
                    <br>
                    <div class="badge bg-secondary">{{ $task->mata_pelajaran }}</div>
                </div>
                @if ($task->media_tugas != null)
                    <div class="col-lg-6 mb-4">
                        <h5 class="card-title">Media Tugas</h5>
                        @foreach (json_decode($task->media_tugas) as $media)
                            @php
                                $namaMedia = explode('.', $media);
                            @endphp
                            @if ($namaMedia[1] == 'jpg' || $namaMedia[1] == 'jpeg')
                                <a href="/tugas/{{ $task->id }}?content_type=image/jpeg&media={{ $media }}"
                                    class="d-block">
                                    Gambar
                                </a>
                            @elseif($namaMedia[1] == 'png')
                                <a href="/tugas/{{ $task->id }}?content_type=image/png&media={{ $media }}"
                                    class="d-block">
                                    Gambar
                                </a>
                            @elseif ($namaMedia[1] == 'pdf')
                                <a href="/tugas/{{ $task->id }}?content_type=application/pdf&media={{ $media }}"
                                    class="d-block">
                                    Dokumen
                                </a>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="">
                <hr>
                <a href="/tugas" class="card-link">Kembali</a>
                <a href="javascript:void(0)" class="card-link text-danger">Hapus</a>
                @if ($task->status_id == 1)
                    <a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                        aria-controls="collapseExample" class="card-link text-success">Jawaban</a>
                @endif
            </div>
            <div class="collapse" id="collapseExample">
                <div class="d-grid d-sm-flex p-2">
                    <div class="col-md">
                        <div id="accordionIcon" class="accordion mt-3 accordion-without-arrow">
                            <div class="accordion-item card">
                                <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconOne">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#accordionIcon-1" aria-controls="accordionIcon-1">
                                        Jawaban
                                    </button>
                                </h2>

                                <div id="accordionIcon-1" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionIcon">
                                    <div class="accordion-body">
                                        @if ($answer === null || $answer->isi_jawaban === null)
                                            <h5>Tidak Ada Jawaban Yang Tersedia</h5>
                                        @else
                                            {!! $answer->isi_jawaban !!}
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconTwo">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#accordionIcon-2" aria-controls="accordionIcon-2">
                                        Komentar
                                    </button>
                                </h2>
                                <div id="accordionIcon-2" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionIcon">
                                    <div class="accordion-body">
                                        @if ($answer === null || $answer->komentar === null)
                                            <h5>Tidak Ada Media Yang Tersedia</h5>
                                        @else
                                            {{ $answer->komentar }}
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item card">
                                <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconTwo">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#accordionIcon-3" aria-controls="accordionIcon-3">
                                        Media
                                    </button>
                                </h2>
                                <div id="accordionIcon-3" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionIcon">
                                    <div class="accordion-body">
                                        @if ($answer === null || $answer->media_jawaban === [])
                                            <h5>Tidak Ada Media Yang Tersedia</h5>
                                        @else
                                            @foreach (json_decode($answer->media_jawaban) as $media)
                                                @php
                                                    $namaMedia = explode('.', $media);
                                                @endphp
                                                @if ($namaMedia[1] == 'jpg' || $namaMedia[1] == 'jpeg')
                                                    <a href="/tugas/{{ $task->id }}?content_type=image/jpeg&media={{ $media }}"
                                                        class="d-block">
                                                        Gambar
                                                    </a>
                                                @elseif($namaMedia[1] == 'png')
                                                    <a href="/tugas/{{ $task->id }}?content_type=image/png&media={{ $media }}"
                                                        class="d-block">
                                                        Gambar
                                                    </a>
                                                @elseif ($namaMedia[1] == 'pdf')
                                                    <a href="/tugas/{{ $task->id }}?content_type=application/pdf&media={{ $media }}"
                                                        class="d-block">
                                                        Dokumen
                                                    </a>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
