<form action="/user/update" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="name">Nama Akun</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ Auth()->user()->name }}" />
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="username">Username</label>
                <div class="col-sm-10">
                    <input type="text" id="username" class="form-control  @error('username') is-invalid @enderror"
                        name="username" value="{{ auth()->user()->username }}" />
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="email">Email</label>
                <div class="col-sm-10">
                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ auth()->user()->email }}" />
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row justify-content-start">
            <div class="col-sm-10">
                <button class="btn btn-primary" type="submit">
                    Simpan Perubahan
                </button>
                <a href="{{ url()->previous() != url()->current() ? url()->previous() : '/' }}"
                    class="btn btn-primary text-white">Kembali</a>
            </div>
        </div>
    </div>
</form>
