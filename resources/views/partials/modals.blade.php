{{-- modal-total-tugas --}}
<div class="modal fade" id="modal-total-tugas" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-total-tugasTitle">Total Tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="divider">
                        <div class="divider-text">Tugas Yang Dibuat Minggu Ini</div>
                    </div>
                    @foreach ($tugasDibuatMingguIni as $TMI)
                        <div class="col-lg-6 col-md-6">
                            <div class="card my-1 me-1">
                                <div class="card-body ">
                                    <h5 class="card-title">{{ $TMI->judul_tugas }}</h5>
                                    <div class="card-subtitle text-muted mb-3 me-1">
                                        {{ $TMI->mataPelajaran->mata_pelajaran }}
                                    </div>
                                    <p class="card-text">
                                        {{ $TMI->deskripsi_tugas }}
                                    </p>
                                    <a href="/tugas/{{ $TMI->id }}" class="card-link">Lebih Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="divider">
                        <div class="divider-text">Semua Tugas</div>
                    </div>
                    @foreach ($tasks->get() as $task)
                        <div class="col-lg-6 col-md-6">
                            <div class="card my-1 me-1">
                                <div class="card-body ">
                                    <h5 class="card-title">{{ $task->judul_tugas }}</h5>
                                    <div class="card-subtitle text-muted mb-3 me-1">
                                        {{ $task->mataPelajaran->mata_pelajaran }}
                                    </div>
                                    <p class="card-text">
                                        {{ $task->deskripsi_tugas }}
                                    </p>
                                    <a href="/tugas/{{ $task->id }}" class="card-link">Lebih Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modal-tugas-belum-selesai --}}
<div class="modal fade" id="modal-tugas-belum-selesai" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-tugas-belum-selesaiTitle">Tugas Belum Selesai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="divider">
                        <div class="divider-text">Tugas Belum Selesai Minggu Ini</div>
                    </div>
                    @foreach ($belumSelesaiMingguIni as $BSMI)
                        <div class="col-lg-6 col-md-6">
                            <div class="card my-1 me-1">
                                <div class="card-body ">
                                    <h5 class="card-title">{{ $BSMI->judul_tugas }}</h5>
                                    <div class="card-subtitle text-muted mb-3 me-1">
                                        {{ $BSMI->mataPelajaran->mata_pelajaran }}
                                    </div>
                                    <p class="card-text">
                                        {{ $BSMI->deskripsi_tugas }}
                                    </p>
                                    <a href="/tugas/{{ $BSMI->id }}" class="card-link">Lebih Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="divider">
                        <div class="divider-text">Semua Tugas Yang Belum Selesai</div>
                    </div>
                    @foreach ($tasks->get()->where('status_id', 0) as $task)
                        <div class="col-lg-6 col-md-6">
                            <div class="card my-1 me-1">
                                <div class="card-body ">
                                    <h5 class="card-title">{{ $task->judul_tugas }}</h5>
                                    <div class="card-subtitle text-muted mb-3 me-1">
                                        {{ $task->mataPelajaran->mata_pelajaran }}
                                    </div>
                                    <p class="card-text">
                                        {{ $task->deskripsi_tugas }}
                                    </p>
                                    <a href="/tugas/{{ $task->id }}" class="card-link">Lebih Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modal-tugas-sudah-selesai --}}
<div class="modal fade" id="modal-tugas-sudah-selesai" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-tugas-sudah-selesaiTitle">Tugas Sudah Selesai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="divider">
                        <div class="divider-text">Tugas Selesai Minggu Ini</div>
                    </div>
                    @foreach ($sudahSelesaiMingguIni as $SSMI)
                        <div class="col-lg-6 col-md-6">
                            <div class="card my-1 me-1">
                                <div class="card-body ">
                                    <h5 class="card-title">{{ $SSMI->judul_tugas }}</h5>
                                    <div class="card-subtitle text-muted mb-3 me-1">
                                        {{ $SSMI->mataPelajaran->mata_pelajaran }}
                                    </div>
                                    <p class="card-text">
                                        {{ $SSMI->deskripsi_tugas }}
                                    </p>
                                    <a href="/tugas/{{ $SSMI->id }}" class="card-link">Lebih Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="divider">
                        <div class="divider-text">Semua Tugas Yang Sudah Selesai</div>
                    </div>
                    @foreach ($tasks->get()->where('status_id', 1) as $task)
                        <div class="col-lg-6 col-md-6">
                            <div class="card my-1 me-1">
                                <div class="card-body ">
                                    <h5 class="card-title">{{ $task->judul_tugas }}</h5>
                                    <div class="card-subtitle text-muted mb-3 me-1">
                                        {{ $task->mataPelajaran->mata_pelajaran }}
                                    </div>
                                    <p class="card-text">
                                        {{ $task->deskripsi_tugas }}
                                    </p>
                                    <a href="/tugas/{{ $task->id }}" class="card-link">Lebih Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modal-tenggat-minggu-ini --}}
<div class="modal fade" id="modal-tenggat-minggu-ini" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-tenggat-minggu-iniTitle">Tenggat Minggu Ini</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="divider">
                        <div class="divider-text">Tenggat Minggu Ini</div>
                    </div>
                    @foreach ($tenggatMingguIni as $TMI)
                        <div class="col-lg-6 col-md-6">
                            <div class="card my-1 me-1">
                                <div class="card-body ">
                                    <h5 class="card-title">{{ $TMI->judul_tugas }}</h5>
                                    <div class="card-subtitle text-muted mb-3 me-1">
                                        {{ $TMI->mataPelajaran->mata_pelajaran }}
                                    </div>
                                    <p class="card-text">
                                        {{ $TMI->deskripsi_tugas }}
                                    </p>
                                    <a href="/tugas/{{ $TMI->id }}" class="card-link">Lebih Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modal-tugas-lewat-waktu --}}
<div class="modal fade" id="modal-tugas-lewat-waktu" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-tugas-lewat-waktuTitle">Tugas Lewat Waktu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="divider">
                        <div class="divider-text">Tugas Lewat Waktu Minggu Ini</div>
                    </div>
                    @foreach ($tugasLewatWaktuMingguIni as $TLWMI)
                        <div class="col-lg-6 col-md-6">
                            <div class="card my-1 me-1">
                                <div class="card-body ">
                                    <h5 class="card-title">{{ $TLWMI->judul_tugas }}</h5>
                                    <div class="card-subtitle text-muted mb-3 me-1">
                                        {{ $TLWMI->mataPelajaran->mata_pelajaran }}
                                    </div>
                                    <p class="card-text">
                                        {{ $TLWMI->deskripsi_tugas }}
                                    </p>
                                    <a href="/tugas/{{ $TLWMI->id }}" class="card-link">Lebih Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="divider">
                        <div class="divider-text">Semua Tugas Yang Sudah Lewat Waktu</div>
                    </div>
                    @foreach ($tugasLewatWaktu as $task)
                        <div class="col-lg-6 col-md-6">
                            <div class="card my-1 me-1">
                                <div class="card-body ">
                                    <h5 class="card-title">{{ $task->judul_tugas }}</h5>
                                    <div class="card-subtitle text-muted mb-3 me-1">
                                        {{ $task->mataPelajaran->mata_pelajaran }}
                                    </div>
                                    <p class="card-text">
                                        {{ $task->deskripsi_tugas }}
                                    </p>
                                    <a href="/tugas/{{ $task->id }}" class="card-link">Lebih Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
