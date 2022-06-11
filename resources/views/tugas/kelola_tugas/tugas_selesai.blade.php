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
                @if ($tugas_selesai->total() == 0)
                    <h3 class="text-center ">Data Tugas Tidak Ada</h3>
                @else
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>Judul Tugas</th>
                        <th>Dikumpul Pada</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                @endif
            </thead>
            <tbody>
                @foreach ($tugas_selesai as $item)
                    <tr>
                        <th scope="row">{{ $loop->index + $tugas_selesai->firstItem() }}</th>
                        <td>
                            <span class="" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                data-bs-placement="right" data-bs-html="true" title="{{ $item->mata_pelajaran }}">
                                {{ $item->judul_tugas }}
                            </span>
                        </td>
                        <td>
                            <div class="text-success">
                                {{ date('d - m - Y', strtotime($item->tanggal_dikumpul)) }}
                            </div>
                        </td>
                        <td>
                            <div class="badge bg-success">{{ $item->status_name }}</div>
                        </td>
                        <td>
                            <a href="tugas/{{ $item->id }}" class="badge bg-info">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="d-flex justify-content-center mt-3">
    {{ $tugas_selesai->links() }}
</div>
