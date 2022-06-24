@extends('layouts.main_without_menu')

@push('navbar')
    @include('partials.navbar')
@endpush

@section('content')
    <div class="container mt-4 overflow-hidden">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card card-profil">
            <div class="card-body">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-3 col-md-6 col-sm-12 gambar-profil">
                        <img src="/media/profil.png" class="img-thumbnail rounded" width="260px">
                    </div>
                    <div class="col-lg-9 col-md-6 col-sm-12 information">
                        <div class="row name-address">
                            <h1 class="fw-bold d-inline name">{{ auth()->user()->name }}</h1>
                            <span class="location"><i class='bx bx-map'></i> {{ $biodata->alamat }}</span>
                        </div>

                        <div class="divider garis-bawah-profile">
                            <div class="divider-text">Detail</div>
                        </div>

                        <p class="text-primary email">{{ auth()->user()->email }}</p>
                        <h5 class="tugas-label text-muted">Jumlah Tugas</h5>
                        <p class="jumlah-tugas"><span class="text-dark">500</span> <span class="text-primary">Tugas</span>
                        </p>

                        <a href="#biodata" class="btn btn-outline-success tombol-lg tombol-edit-profil"
                            data-tanggal_lahir="{{ $biodata->tanggal_lahir }}">
                            <span class="tf-icons bx bx-edit"></span>&nbsp; Edit Biodata
                        </a>
                        <a href="{{ url()->previous() != url()->current() ? url()->previous() : '/' }}"
                            class="btn btn-outline-primary tombol-lg">
                            <span class="tf-icons bx bx-arrow-back"></span>&nbsp; Kembali
                        </a>
                    </div>
                </div>
                <div class="divider text-start">
                    <div class="divider-text" id="biodata">Biodata</div>
                </div>
                <div class="row">
                    <div>
                        <form method="POST" action="/user">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                    value="{{ $biodata->nama_lengkap }}" readonly />
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="jenis_kelamin" disabled="true" name="jenis_kelamin">
                                    <option style="display: none">Pilih Satu</option>
                                    <option value="Laki-Laki"
                                        {{ $biodata->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="Perempuan"
                                        {{ $biodata->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                    value="{{ $biodata->tempat_lahir }}" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                    value="{{ date('l - d - M - Y', strtotime($biodata->tanggal_lahir)) }}" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="alamat">Alamat</label>
                                <input type="text" id="alamat" class="form-control" name="alamat"
                                    value="{{ $biodata->alamat }}" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input type="text" id="email" class="form-control"
                                    value="{{ auth()->user()->email }}" name="email" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="no_handphone">No Handphone</label>
                                <input type="number" id="no_handphone" class="form-control phone-mask" name="no_handphone"
                                    value="{{ $biodata->no_handphone }}" readonly />
                                <div class="form-text no_handphone_warning" style="display: none">Hanya Nomer | ct :
                                    081115230375</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="jenjang_pendidikan">Jenjang Pendidikan</label>
                                <input type="text" class="form-control" id="jenjang_pendidikan"
                                    name="jenjang_pendidikan" value="{{ $biodata->jenjang_pendidikan }}" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="jurusan">Jurusan</label>
                                <input type="text" class="form-control" id="jurusan" name="jurusan"
                                    value="{{ $biodata->jurusan }}" readonly />
                            </div>
                            <button type="submit" class="btn btn-primary tombol-simpan-edit">Simpan</button>
                            <button type="button" class="btn btn-warning tombol-batal-edit">Batal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
