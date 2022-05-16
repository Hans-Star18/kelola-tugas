@extends('layouts.main')

@section('content')
    <!-- Content -->
    <div class="container mt-4">
        <div class="card">
            <h5 class="card-header">Tambah Tugas Baru</h5>
            <div class="card-body">
                <form action="/semua_tugas" method="POST">
                    @csrf
                    <div class="col-lg-3 col-md-6 mb-3">
                        <label for="pilihMataPelajaran" class="form-label">Mata Pelajaran</label>
                        <select class="form-select" id="pilihMataPelajaran" aria-label="Default select example">
                            <option selected>Pilih Mata Pelajaran</option>
                            @foreach ($mataPelajaran as $MP)
                                <option value="{{ $MP->id }}">{{ $MP->mata_pelajaran }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <label for="deadlie" class="form-label">Tanggal Dikumpul</label>
                        <input class="form-control" type="datetime-local" id="deadlie" />
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label for="judulTugas" class="form-label">Judul Tugas</label>
                        <input type="text" class="form-control" id="judulTugas" placeholder="Tugas Integral" />
                    </div>
                    <div class="col-lg-6">
                        <label for="deskripsiTugas" class="form-label">Deskripsi Tugas</label>
                        <textarea class="form-control" id="deskripsiTugas" rows="3"
                            placeholder="Kerjakan tugas integral yang ada di halaman 25 di kertas lempiran."></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
