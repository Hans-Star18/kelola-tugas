<form action="/user/update_password" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-4">
            <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password">Password Lama</label>
                <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                        name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password" />
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
            </div>
            <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password_baru">Password Baru</label>
                <div class="input-group input-group-merge">
                    <input type="password" id="password_baru"
                        class="form-control @error('password_baru') is-invalid @enderror" name="password_baru"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password" />
                    @error('password_baru')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
            </div>
            <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password_baru_repeat">Password Repeat</label>
                <div class="input-group input-group-merge">
                    <input type="password" id="password_baru_repeat"
                        class="form-control @error('password_baru_repeat') is-invalid @enderror"
                        name="password_baru_repeat"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password" />
                    @error('password_baru_repeat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
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
    </div>
</form>
