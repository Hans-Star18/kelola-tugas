{{-- setor tugas modal --}}
<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Setor Tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/tugas/setor" method="POST" class="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-md">
                        <div id="accordionIcon" class="accordion mt-3 accordion-without-arrow">
                            <div class="accordion-item card">
                                <h2 class="accordion-header text-body d-flex justify-content-between"
                                    id="accordionIconOne">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#accordionIcon-1" aria-controls="accordionIcon-1">
                                        Tulis Jawaban
                                    </button>
                                </h2>

                                <div id="accordionIcon-1" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionIcon">
                                    <div class="accordion-body">
                                        <input id="isi_jawaban" type="hidden" name="isi_jawaban">
                                        <trix-editor input="isi_jawaban"></trix-editor>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id_task" id="id_task">
                            <div class="accordion-item card">
                                <h2 class="accordion-header text-body d-flex justify-content-between"
                                    id="accordionIconTwo">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#accordionIcon-2" aria-controls="accordionIcon-2">
                                        Komentar Tugas
                                    </button>
                                </h2>
                                <div id="accordionIcon-2" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionIcon">
                                    <div class="accordion-body">
                                        <div>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="komentar"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item card">
                                <h2 class="accordion-header text-body d-flex justify-content-between"
                                    id="accordionIconTwo">
                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#accordionIcon-3" aria-controls="accordionIcon-3">
                                        Media Tugas (png, jpg, jpeg, pdf)
                                    </button>
                                </h2>
                                <div id="accordionIcon-3" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionIcon">
                                    <div class="accordion-body">
                                        <div class="row justify-content-between">
                                            <div class="col">
                                                <label for="inputFile" class="form-label"></label>
                                            </div>
                                            <div class="col">
                                                <a href="javascript:void(0);" class="float-end tombol-multiple">
                                                    <i class='bx bx-plus'></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="form-input-media" id="inputMedia">
                                            <input class="form-control mb-1" type="file" id="inputFile"
                                                name="media_tugas" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary">Setor</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modal konfirmasi --}}
<div class="modal fade" id="smallModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Hapus Tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5 class="konfirmasi">Klik Hapus untuk menghapus tugas </h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Batal
                </button>
                <form action="" method="POST" class="d-inline delete-button">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="fullscreenModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFullTitle">Edit Tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/tugas" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="status-tugas mb-3">
                        <div class="form-check">
                            <input name="status_id" class="form-check-input" type="radio" value="0" id="radio1"
                                checked />
                            <label class="form-check-label" for="radio1"> Belum Selesai </label>
                        </div>
                        <div class="form-check">
                            <input name="status_id" class="form-check-input" type="radio" value="1" id="radio2" />
                            <label class="form-check-label" for="radio2"> Sudah Selesai </label>
                        </div>
                    </div>
                    <input type="hidden" id="create" name="tanggal_dibuat" value="{{ date('d-m-Y h:i:s') }}">
                    <input type="hidden" id="update" name="tanggal_dikumpul" value="{{ date('d-m-Y h:i:s') }}">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <label for="pilihMataPelajaran" class="form-label">Mata Pelajaran</label>
                        <select class="form-select" id="pilihMataPelajaran" aria-label="Default select example"
                            name="mata_pelajaran_id">
                            <option>Pilih Mata Pelajaran</option>
                            @foreach ($mataPelajaran as $MP)
                                <option value="{{ $MP->id }}" class="{{ $MP->mata_pelajaran }}">
                                    {{ $MP->mata_pelajaran }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <label for="deadline" class="form-label">Tanggal Dikumpul</label>
                        <input class="form-control" value="2022-04-16T20:38:06" type="datetime-local" id="deadline"
                            name="deadline_at" />
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="judulTugas" class="form-label">Judul Tugas</label>
                        <input type="text" class="form-control" id="judulTugas" placeholder="Tugas Integral"
                            name="judul_tugas" />
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="deskripsiTugas" class="form-label">Deskripsi Tugas</label>
                        <textarea class="form-control" id="deskripsiTugas" rows="3" name="deskripsi_tugas"
                            placeholder="Kerjakan tugas integral yang ada di halaman 25 di kertas lempiran."></textarea>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="row justify-content-between">
                            <div class="col">
                                <label for="inputFile" class="form-label">Upload Tugas (png, jpg, jpeg,
                                    pdf)</label>
                            </div>
                            <div class="col">
                                <a href="javascript:void(0);" class="float-end tombol-multiple">
                                    <i class='bx bx-plus'></i>
                                </a>
                            </div>
                        </div>
                        <div class="form-input-media" id="inputMedia">
                            <input class="form-control mb-1" type="file" id="inputFile" name="media_tugas" />
                        </div>
                        <div class="form-media-lama">

                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>
