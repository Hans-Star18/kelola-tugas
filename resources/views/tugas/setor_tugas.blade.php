@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <div class="row">
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
                            <a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modalCenter">Kumpulkan</a>
                        </div>
                        <div class="card-footer text-muted">{{ MyHelpers::strtodate($task->deadline_at)->diffForHumans() }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@include('tugas.partials.modals')
