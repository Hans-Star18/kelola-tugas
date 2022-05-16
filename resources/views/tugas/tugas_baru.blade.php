@extends('layouts.main')

@section('content')
    <!-- Content -->
    <div class="container mt-4">
        <div class="card">
            <h5 class="card-header">Tambah Tugas Baru</h5>
            <div class="card-body">
                <div class="col-lg-3">
                    <label for="pilihMataPelajaran" class="form-label">Mata Pelajaran</label>
                    <select class="form-select" id="pilihMataPelajaran" aria-label="Default select example">
                        <option selected>Pilih Mata Pelajaran</option>
                        @foreach ($mataPelajaran as $MP)
                            <option value="{{ $MP->id }}">{{ $MP->mata_pelajaran }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
