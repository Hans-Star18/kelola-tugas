@extends('layouts.main_without_menu')

@push('navbar')
    @include('partials.navbar')
@endpush

@section('content')
    <div class="container mt-4">
        <div class="card card-profil">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12 gambar-profil">
                        <img src="/media/profil.png" class="img-thumbnail" width="250px">
                    </div>
                    <div class="col-lg-9 col-md-6 col-sm-12 information">
                        <div class="name-address">
                            <h1 class="fw-bold d-inline">{{ auth()->user()->name }}</h1>
                            <span class="location"><i class='bx bx-map'></i> Tebuana, Taro, Tegallalang</span>
                        </div>

                        <div class="divider garis-bawah-profile">
                            <div class="divider-text">Detail</div>
                        </div>

                        <p class="text-primary email">{{ auth()->user()->email }}</p>
                        <h5 class="tugas-label text-muted">Jumlah Tugas</h5>
                        <p class="jumlah-tugas"><span class="text-dark">500</span> <span class="text-primary">Tugas</span>
                        </p>

                        <a href="" class="btn btn-outline-success tombol-lg ">
                            <span class="tf-icons bx bx-edit"></span>&nbsp; Edit Profil
                        </a>
                        <a href="" class="btn btn-outline-primary tombol-lg">
                            <span class="tf-icons bx bx-arrow-back"></span>&nbsp; Kembali
                        </a>
                    </div>
                </div>
                <div class="divider text-start">
                    <div class="divider-text">Biodata</div>
                </div>
                <div class="row">
                    <form>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                        class="bx bx-user"></i></span>
                                <input type="text" class="form-control" id="basic-icon-default-fullname"
                                    placeholder="John Doe" aria-label="John Doe"
                                    aria-describedby="basic-icon-default-fullname2" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-company">Company</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i
                                        class="bx bx-buildings"></i></span>
                                <input type="text" id="basic-icon-default-company" class="form-control"
                                    placeholder="ACME Inc." aria-label="ACME Inc."
                                    aria-describedby="basic-icon-default-company2" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-email">Email</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                <input type="text" id="basic-icon-default-email" class="form-control"
                                    placeholder="john.doe" aria-label="john.doe"
                                    aria-describedby="basic-icon-default-email2" />
                                <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
                            </div>
                            <div class="form-text">You can use letters, numbers & periods</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-phone">Phone No</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-phone2" class="input-group-text"><i
                                        class="bx bx-phone"></i></span>
                                <input type="text" id="basic-icon-default-phone" class="form-control phone-mask"
                                    placeholder="658 799 8941" aria-label="658 799 8941"
                                    aria-describedby="basic-icon-default-phone2" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-icon-default-message">Message</label>
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-message2" class="input-group-text"><i
                                        class="bx bx-comment"></i></span>
                                <textarea id="basic-icon-default-message" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?"
                                    aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
