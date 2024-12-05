@extends('base')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Akun</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="/users">Daftar Akun</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Tambah Akun Baru
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

                        <form method="POST" action="/users/save">
                            @csrf
                            <div class="card-header">
                                <h3 class="card-title mt-2">
                                    <i class="fa fa-clone"></i>
                                    Isi Form Berikut untuk Menambahkan Akun Baru !
                                </h3>
                                <div class="card-tools">
                                    <button type="submit" class="btn btn-success" id="button-addon2"><span
                                            class="fa fa-save"></span> Simpan</button>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="tab-content p-0" style="overflow: auto">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama</label> @error('name') <i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i> @enderror
                                            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Tambahkan Nama Akun "  @error('name') data-toggle="tooltip" data-placement="top" title="{{ $message }}" @enderror>
                                            &nbsp; @error('name') <code>{{ $message }}</code> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label> @error('password') <i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i> @enderror
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Tambahkan Password Akun"  @error('password') data-toggle="tooltip" data-placement="top" title="{{ $message }}" @enderror>
                                            &nbsp; @error('password') <code>{{ $message }}</code> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Area</label> @error('role') <i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i> @enderror
                                            <input type="text" id="searchInput" value="{{ old('role') }}" name="role" class="form-control @error('role') is-invalid @enderror" placeholder="Pilih Admin Lapangan Penanggung Tanggung Jawab Akun ..." @error('role') data-toggle="tooltip" data-placement="top" title="{{ $message }}" @enderror autocomplete="off" oninput="filterFunction()" onclick="showAllParts()">
                                            <div id="suggestions" class="suggestions" style="display: none; max-width: 96%;"></div>
                                            &nbsp; @error('role') <code>{{ $message }}</code> @enderror
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
