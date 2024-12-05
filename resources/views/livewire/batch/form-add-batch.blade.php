
<form wire:submit.prevent='saveBatch'>
    <div class="card-header">
        <h3 class="card-title mt-2">
            <i class="fa fa-clone"></i>
            Isi Form Berikut untuk Menambahkan Batch Baru !
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
                            placeholder="Tambahkan Nama Batch" wire:model='namaBatch' id="exampleInputEmail1">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control"
                            placeholder="Tanggal Penetapan Batch" wire:model='tanggalBatch' id="exampleInputEmail1">
                    </div>
                </div>
                <div class="col-md-12">
                    <b>Penambahan Komponen Produksi</b>
                </div>

                <div class="col-md-12">
                    <livewire:batch.form-add-detail-batch/>
                </div>

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
                                    <center>Sub Komponen</center>
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
                            </tr>
                            <tr style="text-align: center">
                                <th>P</th>
                                <th>L</th>
                                <th>T</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($komponenItem != null)
                                @foreach ($komponenItem as $key=>$item)
                                    <tr>
                                        <td scope="row">{{ $key+1 }}</td>
                                        <td>
                                            {{ $item['nama_komponen'] }}
                                        </td>
                                        <td>
                                            {{ $item['nama_item'] }}
                                        </td>
                                        <td>
                                            {{ $item['jenis'] }}
                                        </td>
                                        <td>
                                            <center>
                                                {{ $item['panjang'] }}
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                {{ $item['lebar'] }}
                                            </center>
                                        </td>
                                        <td>
                                            {{ $item['tinggi'] }}
                                        </td>
                                        <td>
                                            <center>{{ $item['zona'] }}</center>
                                        </td>
                                        <td>
                                            <center>
                                                @switch($item['pola'])
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
                                        <td>
                                            <center>
                                                <input type="number" id="nomor" inputmode="numeric" style="width: 100px" class="form-control" min="0" wire:model="target.{{ $key }}">
                                            </center>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                            <tr>
                                <td colspan="10">
                                    <center><b>Belum Menambahkan Komponen</b></center>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>
