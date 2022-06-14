@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <h5 class="card-header">Kumpulkan Tugas</h5>
            <div class="card-body">
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
        </div>

    </div>
@endsection
@include('tugas.partials.modals')
