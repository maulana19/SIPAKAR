@extends('base')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Detail Batch</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="/batch">Daftar Batch</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Detail Batch
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
                                    <b>{{ $infoBatch->nama_batch }}</b>
                                </h3>
                                <div class="card-tools">
                                    <form action="" class="form-inline">
                                        <div class="input-group">
                                            <button class="btn btn-outline-primary" type="button" id="button-addon2"><span
                                                    class="fa fa-print"></span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="tab-content p-0" style="overflow: auto">
                                    <!-- Morris chart - Sales -->
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
                                                @foreach ($dataBatch as $data)
                                                    <tr>
                                                        <td scope="row">{{ $no++ }}</td>
                                                        <td>
                                                            {{ $data->detailKomponen->nama_komponen }}
                                                        </td>
                                                        <td>
                                                            {{ $data->detailKomponen->item->nama_item }}
                                                        </td>
                                                        <td>
                                                            {{ $data->detailKomponen->jenis }}
                                                        </td>
                                                        <td>
                                                            <center>
                                                                {{ $data->detailKomponen->panjang }}
                                                            </center>
                                                        </td>
                                                        <td>
                                                            <center>
                                                                {{ $data->detailKomponen->lebar }}
                                                            </center>
                                                        </td>
                                                        <td>
                                                            <center>{{ $data->detailKomponen->tinggi }}</center>
                                                        </td>
                                                        <td>
                                                            <center>{{ $data->detailKomponen->zona }}</center>
                                                        </td>
                                                        <td>
                                                            <center>

                                                                @switch($data->detailKomponen->pola)
                                                                    @case('Atas Bawah')
                                                                        <img src="{{ asset('Assets/dist/img/Pola/Atas Bawah.png') }}"
                                                                            width="100" alt="">
                                                                    @break

                                                                    @case('Atas')
                                                                        <img src="{{ asset('Assets/dist/img/Pola/Atas.png') }}"
                                                                            width="100" alt="">
                                                                    @break

                                                                    @case('Bawah Kanan Kiri')
                                                                        <img src="{{ asset('Assets/dist/img/Pola/Bawah Kanan Kiri.png') }}"
                                                                            width="100" alt="">
                                                                    @break

                                                                    @case('Bawah')
                                                                        <img src="{{ asset('Assets/dist/img/Pola/Bawah.png') }}"
                                                                            width="100" alt="">
                                                                    @break

                                                                    @case('Kanan Atas Bawah')
                                                                        <img src="{{ asset('Assets/dist/img/Pola/Kanan Atas Bawah.png') }}"
                                                                            width="100" alt="">
                                                                    @break

                                                                    @case('Kanan Atas')
                                                                        <img src="{{ asset('Assets/dist/img/Pola/Kanan Atas.png') }}"
                                                                            width="100" alt="">
                                                                    @break

                                                                    @case('Kanan Bawah')
                                                                        <img src="{{ asset('Assets/dist/img/Pola/Kanan Bawah.png') }}"
                                                                            width="100" alt="">
                                                                    @break

                                                                    @case('Kanan Kiri Atas')
                                                                        <img src="{{ asset('Assets/dist/img/Pola/Kanan Kiri Atas.png') }}"
                                                                            width="100" alt="">
                                                                    @break

                                                                    @case('Kanan Kiri')
                                                                        <img src="{{ asset('Assets/dist/img/Pola/Kanan Kiri.png') }}"
                                                                            width="100" alt="">
                                                                    @break

                                                                    @case('Kanan')
                                                                        <img src="{{ asset('Assets/dist/img/Pola/Kanan.png') }}"
                                                                            width="100" alt="">
                                                                    @break

                                                                    @case('Kiri Atas Bawah')
                                                                        <img src="{{ asset('Assets/dist/img/Pola/Kiri Atas Bawah.png') }}"
                                                                            width="100" alt="">
                                                                    @break

                                                                    @case('Kiri Atas')
                                                                        <img src="{{ asset('Assets/dist/img/Pola/Kiri Atas.png') }}"
                                                                            width="100" alt="">
                                                                    @break

                                                                    @case('Kiri Bawah')
                                                                        <img src="{{ asset('Assets/dist/img/Pola/Kiri Bawah.png') }}"
                                                                            width="100" alt="">
                                                                    @break

                                                                    @case('Kiri')
                                                                        <img src="{{ asset('Assets/dist/img/Pola/Kiri.png') }}"
                                                                            width="100" alt="">
                                                                    @break

                                                                    @case('Kosong')
                                                                        <img src="{{ asset('Assets/dist/img/Pola/Kosong.png') }}"
                                                                            width="100" alt="">
                                                                    @break

                                                                    @case('Semua')
                                                                        <img src="{{ asset('Assets/dist/img/Pola/Semua.png') }}"
                                                                            width="100" alt="">
                                                                    @break

                                                                    @default
                                                                @endswitch
                                                            </center>
                                                        </td>
                                                        <td>
                                                            <center>{{ $data->target }}</center>
                                                        </td>
                                                        <td>
                                                            <center>-
                                                            </center>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="11">
                                                        <center><b>Data Komponen Batch Tidak Ditemukan !</b></center>
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
