{{-- setor tugas modal --}}
<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Setor Tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-md">
                    <div id="accordionIcon" class="accordion mt-3 accordion-without-arrow">
                        <div class="accordion-item card">
                            <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconOne">
                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#accordionIcon-1" aria-controls="accordionIcon-1">
                                    Tulis Jawaban
                                </button>
                            </h2>

                            <div id="accordionIcon-1" class="accordion-collapse collapse"
                                data-bs-parent="#accordionIcon">
                                <div class="accordion-body">
                                    <div id="scrolling-container">
                                        <div id="editor">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item card">
                            <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconTwo">
                                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#accordionIcon-2" aria-controls="accordionIcon-2">
                                    Komentar Tugas
                                </button>
                            </h2>
                            <div id="accordionIcon-2" class="accordion-collapse collapse"
                                data-bs-parent="#accordionIcon">
                                <div class="accordion-body">
                                    <div>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
