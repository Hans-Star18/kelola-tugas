<div class="card">
    <h5 class="ms-3 mt-3 mb-2">Tugas Sudah Selesai</h5>
    <div class="btn-group col-lg-2 col-md-4 col-sm-4 com-xs-4 mx-3">
        <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            @if (request('mata_pelajaran'))
                {{ request('mata_pelajaran') }}
            @else
                Semua
            @endif
        </button>
        <ul class="dropdown-menu vertical-example" style="max-height: 200px;">
            <li>
                <a class="dropdown-item" href="tugas">
                    Semua
                </a>
            </li>
            @foreach ($mataPelajaran as $mp)
                <li>
                    <a class="dropdown-item" href="tugas?mata_pelajaran={{ $mp->mata_pelajaran }}">
                        {{ $mp->mata_pelajaran }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="table-responsive text-nowrap horizontal-example">
        <table class="table table-striped">
            <thead>
                <tr class="text-nowrap">
                    <th>#</th>
                    <th>Judul Tugas</th>
                    <th>Dikumpul Pada</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                    $count = collect([]);
                @endphp
                @foreach ($tasks as $task)
                    @if ($task->status_id == 1)
                        @php
                            $count[] = $task;
                        @endphp
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>
                                <span class="" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                    data-bs-placement="right" data-bs-html="true" title="{{ $task->mata_pelajaran }}">
                                    {{ $task->judul_tugas }}
                                </span>
                            </td>
                            <td>
                                <div class="text-success">
                                    {{ date('d - m - Y', strtotime($task->tanggal_dikumpul)) }}
                                </div>
                            </td>
                            <td>
                                <div class="badge bg-success">{{ $task->status_name }}</div>
                            </td>
                            <td>
                                <a href="tugas/{{ $task->id }}" class="badge bg-info">Detail</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
                @if ($count->isEmpty())
                    <h3 class="text-center ">Data Tugas Tidak Ada</h3>
                @endif
            </tbody>
        </table>
    </div>
</div>
