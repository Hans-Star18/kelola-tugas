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
