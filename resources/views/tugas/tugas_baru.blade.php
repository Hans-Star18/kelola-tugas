@extends('layouts.main')

@section('content')
    <!-- Content -->
    <div class="container mt-4">
        <div class="bs-toast toast toast-placement-ex bg-success top-0 start-0 fade {{ session()->has('success') ? 'show' : '' }} m-2"
            role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="bx bx-bell me-2"></i>
                <div class="me-auto fw-semibold">Notifikasi</div>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('success') }}
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">Tambah Tugas Baru</h5>
            <div class="card-body">
                <form action="/semua_tugas" method="POST">
                    @csrf
                    <input type="hidden" id="status" name="status_id" value="0">
                    <input type="hidden" id="create" name="tanggal_dibuat" value="{{ date('d-m-Y h:i:s') }}">
                    <input type="hidden" id="update" name="tanggal_dikumpul" value="{{ date('d-m-Y h:i:s') }}">
                    <div class="col-lg-3 col-md-6 mb-3">
                        <label for="pilihMataPelajaran" class="form-label">Mata Pelajaran</label>
                        <select class="form-select" id="pilihMataPelajaran" aria-label="Default select example"
                            name="mata_pelajaran_id">
                            <option selected>Pilih Mata Pelajaran</option>
                            @foreach ($mataPelajaran as $MP)
                                <option value="{{ $MP->id }}">{{ $MP->mata_pelajaran }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <label for="deadline" class="form-label">Tanggal Dikumpul</label>
                        <input class="form-control" type="datetime-local" id="deadline" name="deadline_at" />
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
                    <button class="btn btn-primary" type="submit">Tambah</button>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
