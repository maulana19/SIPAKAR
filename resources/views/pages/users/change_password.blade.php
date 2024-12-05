@extends('base')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Ubah Password</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="/users">Daftar Akun</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Ubah Password Akun
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <section class="col-lg-12">
                        <div class="card">
                            <form method="post" action="/users/change-password/{{ Crypt::encrypt($data->kode_user) }}">
                                @csrf
                                <div class="card-header">
                                    <h3 class="card-title mt-2">
                                        <i class="fa fa-clone"></i>
                                        Isi Form Berikut untuk mengubah Password Akun !
                                    </h3>
                                    <div class="card-tools">
                                        <button type="submit" class="btn btn-success" id="button-addon2"><span
                                                class="fa fa-save"></span> Ubah
                                            Password</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="tab-content p-0" style="overflow: auto">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password Baru</label>
                                            <input type="password" name="password"
                                                placeholder="Silahkan Isi Password Baru" name="password"
                                                class="form-control @error('password') is-invalid @enderror "
                                                id="exampleInputPassword1">
                                            @error('password')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Konfirmasi Password Baru</label>
                                            <input type="password" name='passwordConfirm'
                                                placeholder="Tulis Ulang Password Baru" name="passwordConfirm"
                                                class="form-control @error('passwordConfirm') is-invalid @enderror "
                                                id="exampleInputPassword1">
                                            @error('passwordConfirm')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </section>

    </div>
@endsection
