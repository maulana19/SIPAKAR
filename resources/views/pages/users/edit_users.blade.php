@extends('base')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Ubah Data Akun</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="/users">Daftar Akun</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Ubah Data Akun
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
                            <form method="POST" action="/users/update/{{ Crypt::encrypt($data->kode_user); }}">
                                @csrf
                                <div class="card-header">
                                    <h3 class="card-title mt-2">
                                        <i class="fa fa-clone"></i>
                                        Ubah isi Form hanya pada data yang akan diubah !
                                    </h3>
                                    <div class="card-tools">
                                        <button type="sub" class="btn btn-success" id="button-addon2"><span
                                                class="fa fa-save"></span> Update</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="tab-content p-0" style="overflow: auto">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama</label> @error('name') <i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i> @enderror
                                                <input type="text" name="name" value="{{ old('name')?old('name'): $data->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Tambahkan Nama Akun "  @error('name') data-toggle="tooltip" data-placement="top" title="{{ $message }}" @enderror>
                                                &nbsp; @error('name') <code>{{ $message }}</code> @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Area</label> @error('role') <i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i> @enderror
                                                <input type="text" name="role" id="searchInput" value="{{ old('role') ? old('role'): $data->role }}" class="form-control @error('role') is-invalid @enderror" placeholder="Pilih Admin Lapangan Tanggung Jawab Akun ..." @error('role') data-toggle="tooltip" data-placement="top" title="{{ $message }}" @enderror placeholder="Search for a fruit..." autocomplete="off" oninput="filterFunction()" onclick="showAllParts()">
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
