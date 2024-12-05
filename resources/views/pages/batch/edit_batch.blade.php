@extends('base')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Batch</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="/batch">Daftar Batch</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Edit Data Batch
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
                            <form>
                                <div class="card-header">
                                    <h3 class="card-title mt-2">
                                        <i class="fa fa-clone"></i>
                                        Isi Form Berikut untuk Mengubah Data Batch !
                                    </h3>
                                    <div class="card-tools">
                                        <button type="submit" class="btn btn-success" id="button-addon2"><span
                                                class="fa fa-save"></span> Simpan</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="tab-content p-0" style="overflow: auto">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="Tambahkan Batch" title="Nama Batch" id="exampleInputEmail1">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control"
                                                        placeholder="Tanggal Penetapan Batch" id="exampleInputEmail1">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <b>Penambahan Komponen Produksi</b>
                                            </div>

                                            <form action="">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            placeholder="Pilih Item" id="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"
                                                            placeholder="Pilih Komponen" id="">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <center>
                                                        <button type="button" class="btn btn-md btn-outline-primary">Tambah Komponen</button>
                                                    </center>
                                                </div>
                                            </form>
                                            <div class="col-md-12">
                                                <b>Detail Komponen</b>
                                            </div>

                                            <div class="col-md-12">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="2" style="vertical-align: middle">#</th>
                                                            <th rowspan="2" style="vertical-align: middle">
                                                                <center>Nama Komponen</center>
                                                            </th>
                                                            <th rowspan="2" style="vertical-align: middle">
                                                                <center>Nama Item</center>
                                                            </th>
                                                            <th rowspan="2" style="vertical-align: middle">
                                                                <center>Jenis Komponen</center>
                                                            </th>
                                                            <th colspan="3" style="vertical-align: middle">
                                                                <center>Ukuran</center>
                                                            </th>
                                                            <th rowspan="2" style="vertical-align: middle">
                                                                <center>Zona</center>
                                                            </th>
                                                            <th rowspan="2" style="vertical-align: middle">
                                                                <center>Pola</center>
                                                            </th>
                                                            <th rowspan="2" style="vertical-align: middle">
                                                                <center>Target</center>
                                                            </th>
                                                            <th rowspan="2" style="vertical-align: middle">
                                                                <center>Opsi</center>
                                                            </th>
                                                        </tr>
                                                        <tr style="text-align: center">
                                                            <th>P</th>
                                                            <th>L</th>
                                                            <th>T</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td scope="row">1</td>
                                                            <td>
                                                                Sandaran Slat
                                                            </td>
                                                            <td>
                                                                Sandaran Slat
                                                            </td>
                                                            <td>
                                                                Sandaran Slat
                                                            </td>
                                                            <td>
                                                                <center>
                                                                    20
                                                                </center>
                                                            </td>
                                                            <td>
                                                                <center>
                                                                    30
                                                                </center>
                                                            </td>
                                                            <td>
                                                                <center>30</center>
                                                            </td>
                                                            <td>
                                                                <center>A</center>
                                                            </td>
                                                            <td>
                                                                Kanan Kiri Atas
                                                            </td>
                                                            <td>
                                                                <center>
                                                                    <input type="number" id="nomor" inputmode="numeric" style="width: 100px" class="form-control" name="target">
                                                                </center>
                                                            </td>
                                                            <td>
                                                                <center>
                                                                    <button class="btn btn-md btn-danger"><span class="fa fa-trash"></span></button>
                                                                </center>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
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
