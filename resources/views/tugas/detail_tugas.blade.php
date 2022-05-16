@extends('tugas.layouts.main')

@section('content')
    @if ($task->status_id == 0 && StrToDate::strtodate($task->deadline_at)->diff()->invert == 1)
        <div class="mt-5 col-lg-8 shadow-none bg-transparent border border-warning rounded">
        @elseif($task->status_id == 0 && StrToDate::strtodate($task->deadline_at)->diff()->invert == 0)
            <div class="mt-5 col-lg-8 shadow-none bg-transparent border border-danger rounded">
            @else
                <div class="mt-5 col-lg-8 shadow-none bg-transparent border border-success rounded">
    @endif

    <div class="card ">
        <div class="card-body">
            <h5 class="card-title">{{ $task->judul_tugas }}</h5>
            <p class="card-text">{{ $task->deskripsi_tugas }}</p>

            @if ($task->status_id == 0 && StrToDate::strtodate($task->deadline_at)->diff()->invert == 1)
                <div class="badge bg-warning mb-2">{{ $task->status_name }}</div>
                <div class="text-warning">
                    Batas Waktu : {{ StrToDate::strtodate($task->deadline_at)->diffForHumans() }}
                </div>
            @elseif ($task->status_id == 0 && StrToDate::strtodate($task->deadline_at)->diff()->invert == 0)
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
        <div class="card-body">
            <a href="/semua_tugas" class="card-link">Kembali</a>
            <a href="javascript:void(0)" class="card-link">Download</a>
        </div>
    </div>
    </div>
@endsection
