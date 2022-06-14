@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <h5 class="card-header">Semua Tugas</h5>
            <div class="card-body pb-0">
                <div class="btn-group col-lg-2 my-1">
                    <button class="btn btn-outline-primary dropdown-toggle" type="button" id="defaultDropdown"
                        data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                        @if (request('mata_pelajaran'))
                            {{ request('mata_pelajaran') }}
                        @else
                            Semua
                        @endif
                    </button>
                    <ul class="dropdown-menu vertical-example" aria-labelledby="defaultDropdown" style="max-height: 200px">
                        <li>
                            @if (request('status'))
                                <a class="dropdown-item" href="/tugas?status={{ request('status') }}">
                                    Semua
                                </a>
                            @else
                                <a class="dropdown-item" href="/tugas">Semua</a>
                            @endif
                        </li>
                        @foreach ($mataPelajaran as $item)
                            <li>
                                @if (request('status'))
                                    <a class="dropdown-item"
                                        href="/tugas?mata_pelajaran={{ $item->mata_pelajaran }}&status={{ request('status') }}">
                                        {{ $item->mata_pelajaran }}
                                    </a>
                                @else
                                    <a class="dropdown-item" href="/tugas?mata_pelajaran={{ $item->mata_pelajaran }}">
                                        {{ $item->mata_pelajaran }}
                                    </a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="btn-group col-lg-2 my-1">
                    <button class="btn btn-outline-primary dropdown-toggle" type="button" id="defaultDropdown"
                        data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                        @if (request('status'))
                            {{ request('status') }}
                        @else
                            Semua
                        @endif
                    </button>
                    <ul class="dropdown-menu vertical-example" aria-labelledby="defaultDropdown" style="max-height: 200px">
                        <li>
                            @if (request('mata_pelajaran'))
                                <a class="dropdown-item" href="/tugas?mata_pelajaran={{ request('mata_pelajaran') }}">
                                    Semua
                                </a>
                            @else
                                <a class="dropdown-item" href="/tugas">Semua</a>
                            @endif
                        </li>
                        @foreach ($statuses as $item)
                            <li>
                                @if (request('mata_pelajaran'))
                                    <a class="dropdown-item"
                                        href="/tugas?mata_pelajaran={{ request('mata_pelajaran') }}&status={{ $item->status_name }}">
                                        {{ $item->status_name }}
                                    </a>
                                @else
                                    <a class="dropdown-item" href="/tugas?status={{ $item->status_name }}">
                                        {{ $item->status_name }}
                                    </a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
                @foreach ($tasks as $item)
                    <div id="accordionIcon" class="accordion mt-2 accordion-without-arrow">
                        <div class="accordion-item card">
                            <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconOne">
                                <button type="button" class="accordion-button collapsed " data-bs-toggle="collapse"
                                    data-bs-target="#accordionIcon-{{ $item->id }}"
                                    aria-controls="accordionIcon-{{ $item->id }}">
                                    {{ $item->judul_tugas }}
                                </button>
                                @if ($item->status_id == 1)
                                    <span class="badge bg-success"><i class='tf-icons bx bx-check'></i></span>
                                @elseif ($item->status_id == 0 && MyHelpers::strtodate($item->deadline_at)->diff()->invert == 1)
                                    <span class="badge bg-warning"> <i class='tf-icons bx bx-x'></i> </span>
                                @else
                                    <span class="badge bg-danger"><i class='tf-icons bx bx-time'></i></span>
                                @endif
                            </h2>

                            <div id="accordionIcon-{{ $item->id }}" class="accordion-collapse collapse"
                                data-bs-parent="#accordionIcon">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-lg-6 mb-2">
                                            <p>{{ $item->deskripsi_tugas }}</p>

                                            @if ($item->status_id == 0 && MyHelpers::strtodate($item->deadline_at)->diff()->invert == 1)
                                                <div class="badge bg-warning mb-2">{{ $item->status_name }}</div>
                                                <div class="text-warning">
                                                    Batas Waktu :
                                                    {{ MyHelpers::strtodate($item->deadline_at)->diffForHumans() }}
                                                </div>
                                            @elseif ($item->status_id == 0 && MyHelpers::strtodate($item->deadline_at)->diff()->invert == 0)
                                                <div class="badge bg-danger mb-2">Lewat Waktu</div>
                                                <div class="text-danger">
                                                    Tenggat Pada : {{ date('d - m - Y', strtotime($item->deadline_at)) }}
                                                </div>
                                            @else
                                                <div class="badge bg-success mb-2">{{ $item->status_name }}</div>
                                                <div class="text-success">
                                                    Dikumpul Pada :
                                                    {{ date('d - m - Y', strtotime($item->tanggal_dikumpul)) }}
                                                </div>
                                            @endif
                                            <div class="badge bg-secondary mt-2">{{ $item->mata_pelajaran }}</div>
                                        </div>
                                        <a href="/tugas/{{ $item->id }}">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if ($tasks->count() == 0)
                    <div class="text-center">
                        <h4>Tidak Ada Tugas</h4>
                    </div>
                @endif

                <div class="d-flex flex-wrap justify-content-center align-items-center mt-4 ">
                    <small>{{ $tasks->onEachSide(0)->links() }}</small>
                </div>
            </div>
        </div>
    </div>
@endsection
