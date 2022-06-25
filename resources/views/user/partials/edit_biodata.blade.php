<form action="/user" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="nama_lengkap">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                        value="{{ $biodata->nama_lengkap }}" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="jenis_kelamin">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <select class="form-select form-control" id="jenis_kelamin" name="jenis_kelamin">
                        <option style="display: none">Pilih Satu</option>
                        <option value="Laki-Laki" {{ $biodata->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>
                            Laki-Laki
                        </option>
                        <option value="Perempuan" {{ $biodata->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan
                        </option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="tempat_lahir">Tempat Lahir</label>
                <div class="col-sm-10">
                    <input type="text" id="tempat_lahir" class="form-control" name="tempat_lahir"
                        value="{{ $biodata->tempat_lahir }}" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="tanggal_lahir">Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="date" id="tanggal_lahir" class="form-control " name="tanggal_lahir"
                        value="{{ $biodata->tanggal_lahir }}" />
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" name="alamat"
                        value="{{ $biodata->alamat }}" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="no_handphone">Nomer Handphone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="no_handphone" name="no_handphone"
                        value="{{ $biodata->no_handphone }}" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="jenjang_pendidikan">Jenjang Pendidikan</label>
                <div class="col-sm-10">
                    <input type="text" id="jenjang_pendidikan" class="form-control" name="jenjang_pendidikan"
                        value="{{ $biodata->jenjang_pendidikan }}" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="jurusan">Jurusan</label>
                <div class="col-sm-10">
                    <input type="text" id="jurusan" class="form-control " name="jurusan"
                        value="{{ $biodata->jurusan }}" />
                </div>
            </div>
        </div>
        <div class="row justify-content-start">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ url()->previous() != url()->current() ? url()->previous() : '/' }}"
                    class="btn btn-primary text-white">Kembali</a>
            </div>
        </div>
    </div>
</form>
