@extends('base')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Detail Laporan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Detail Laporan
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
                            <div class="card-header">
                                <h3 class="card-title mt-2">
                                    <b>{{ $infoBatch->nama_batch . ' - ' . $infoBatch->role }}</b>
                                </h3>
                            </div>

                            <div class="card-body">
                                <div class="tab-content p-0" style="overflow: auto">
                                    <!-- Morris chart - Sales -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th rowspan="2" style="vertical-align: middle">#</th>
                                <th rowspan="2" style="vertical-align: middle">
                                    <center>Batch Produksi</center>
                                </th>
                                <th rowspan="2" style="vertical-align: middle">
                                    <center>Nama Item</center>
                                </th>
                                <th rowspan="2" style="vertical-align: middle">
                                    <center>Nama Komponen</center>
                                </th>
                                <th colspan="3" style="vertical-align: middle">
                                    <center>Ukuran</center>
                                </th>
                                <th rowspan="2" style="vertical-align: middle">
                                    <center>Selesai</center>
                                </th>
                                <th rowspan="2" style="vertical-align: middle">
                                    <center>Kurang</center>
                                </th>
                            </tr>
                            <tr style="text-align: center">
                                <th>P</th>
                                <th>L</th>
                                <th>T</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($dataBatch->count() > 0)
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($dataBatch as $key=>$batch)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $batch->Tugas->Batch->nama_batch }}</td>
                                        <td>{{ $batch->detailBatch->detailKomponen->item->nama_item }}</td>
                                        <td>{{ $batch->detailBatch->detailKomponen->nama_komponen }}</td>
                                        <td>
                                            <center>{{ $batch->detailBatch->detailKomponen->panjang }}</center>
                                        </td>
                                        <td>
                                            <center>{{ $batch->detailBatch->detailKomponen->lebar }}</center>
                                        </td>
                                        <td>
                                            <center>{{ $batch->detailBatch->detailKomponen->tinggi }}</center>
                                        </td>
                                        <td>
                                            <center>
                                                <b>{{ $batch->selesai }}</b>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <b>{{ $batch->kurang }}</b>
                                            </center>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9">
                                        <center><b>Belum Menambahkan Komponen</b></center>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>

    </div>
@endsection
