@extends('base')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Detail Item</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="/items">Daftar Item</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Detail Item
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
                                <div class="card-body">
                                    <div class="tab-content p-0" style="overflow: auto">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6><b>Kode Item : </b></h6>
                                                <h5>{{ $dataItem->kode_item }}</h5>
                                            </div>
                                            <div class="col-md-6">
                                                <h6><b>Nama Item : </b></h6>
                                                <h5>{{ $dataItem->nama_item }}</h5>
                                            </div>
                                            <div class="col-md-12 mt-4">
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
                                                            <th colspan="3" style="vertical-align: middle">
                                                                <center>Ukuran</center>
                                                            </th>
                                                            <th rowspan="2" style="vertical-align: middle">
                                                                <center>Zona</center>
                                                            </th>
                                                            <th rowspan="2" style="vertical-align: middle">
                                                                <center>Sub Komponen</center>
                                                            </th>
                                                            <th rowspan="2" style="vertical-align: middle">
                                                                <center>Pola</center>
                                                            </th>
                                                        </tr>
                                                        <tr style="text-align: center">
                                                            <th>P</th>
                                                            <th>L</th>
                                                            <th>T</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($dataItem->components->count() > 0)
                                                        @foreach ($dataItem->components as $key=>$komponen)
                                                            <tr>
                                                                <td scope="row">{{ $key+1 }}</td>
                                                                <td>
                                                                    {{ $komponen->nama_komponen }}
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        {{ $komponen->panjang }}
                                                                    </center>
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        {{ $komponen->lebar }}
                                                                    </center>
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        {{ $komponen->tinggi }}
                                                                    </center>
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        {{ $komponen->zona }}
                                                                    </center>
                                                                </td>
                                                                <td>
                                                                    {{ $komponen->jenis }}
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        @switch($komponen['pola'])
                                                                            @case('Atas Bawah')
                                                                                    <img src="{{ asset('Assets/dist/img/Pola/Atas Bawah.png') }}" width="100" alt="">
                                                                                @break
                                                                            @case('Atas')
                                                                                    <img src="{{ asset('Assets/dist/img/Pola/Atas.png') }}" width="100" alt="">

                                                                                @break
                                                                            @case('Bawah Kanan Kiri')
                                                                                    <img src="{{ asset('Assets/dist/img/Pola/Bawah Kanan Kiri.png') }}" width="100" alt="">

                                                                                @break
                                                                            @case('Bawah')
                                                                                    <img src="{{ asset('Assets/dist/img/Pola/Bawah.png') }}" width="100" alt="">

                                                                                @break
                                                                            @case('Kanan Atas Bawah')
                                                                                    <img src="{{ asset('Assets/dist/img/Pola/Kanan Atas Bawah.png') }}" width="100" alt="">

                                                                                @break
                                                                            @case('Kanan Atas')
                                                                                    <img src="{{ asset('Assets/dist/img/Pola/Kanan Atas.png') }}" width="100" alt="">

                                                                                @break
                                                                            @case('Kanan Bawah')
                                                                                    <img src="{{ asset('Assets/dist/img/Pola/Kanan Bawah.png') }}" width="100" alt="">

                                                                                @break
                                                                            @case('Kanan Kiri Atas')
                                                                                    <img src="{{ asset('Assets/dist/img/Pola/Kanan Kiri Atas.png') }}" width="100" alt="">

                                                                                @break
                                                                            @case('Kanan Kiri')
                                                                                    <img src="{{ asset('Assets/dist/img/Pola/Kanan Kiri.png') }}" width="100" alt="">

                                                                                @break
                                                                            @case('Kanan')
                                                                                    <img src="{{ asset('Assets/dist/img/Pola/Kanan.png') }}" width="100" alt="">

                                                                                @break
                                                                            @case('Kiri Atas Bawah')
                                                                                    <img src="{{ asset('Assets/dist/img/Pola/Kiri Atas Bawah.png') }}" width="100" alt="">

                                                                                @break
                                                                            @case('Kiri Atas')
                                                                                    <img src="{{ asset('Assets/dist/img/Pola/Kiri Atas.png') }}" width="100" alt="">

                                                                                @break
                                                                            @case('Kiri Bawah')
                                                                                    <img src="{{ asset('Assets/dist/img/Pola/Kiri Bawah.png') }}" width="100" alt="">

                                                                                @break
                                                                            @case('Kiri')
                                                                                    <img src="{{ asset('Assets/dist/img/Pola/Kiri.png') }}" width="100" alt="">

                                                                                @break
                                                                            @case('Kosong')
                                                                                    <img src="{{ asset('Assets/dist/img/Pola/Kosong.png') }}" width="100" alt="">

                                                                                @break
                                                                            @case('Semua')
                                                                                    <img src="{{ asset('Assets/dist/img/Pola/Semua.png') }}" width="100" alt="">

                                                                                @break
                                                                            @default
                                                                        @endswitch
                                                                    </center>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        @else
                                                            <tr>
                                                                <td colspan="8">
                                                                    <center>Komponen dari Item Tidak Ditemukan</center>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>

    </div>
@endsection
