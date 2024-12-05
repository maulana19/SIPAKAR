<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-list mr-1"></i>
            Laporan Produksi
        </h3>
    </div><!-- /.card-header -->

    <form wire:submit='simpanLaporan'>
    <div class="card-body">
        @if (\Session::has('berhasil'))
            <div id="alert" class="alert alert-success floating-alert" role="alert">
                {!! \Session::get('berhasil') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="tab-content p-0" style="overflow: auto">
            <div class="row">
                <div class="col-md-12">
                    <b>Cari Berdasarkan Panjang, Tinggi, dan Lebar</b>
                </div>
                <div class="col-md-12">
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <input type="number" wire:model='keyPanjang' class="form-control"
                                    placeholder="Panjang">
                            </div>
                            <div class="col-md-2">
                                <input type="number" wire:model='keyLebar' class="form-control"
                                    placeholder="Lebar">
                            </div>
                            <div class="col-md-2">
                                <input type="number" wire:model='keyTinggi' class="form-control"
                                    placeholder="Tinggi">
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary" type="button" wire:click.prevent='cariKomponen'>Cari
                                    Komponen</button>
                            </div>
                        </div>
                </div>
                <div class="col-md-12 mt-4"><!-- Morris chart - Sales -->
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
                            @if ($currentdataBatch != null)
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($currentdataBatch as $key=>$batch)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $batch['nama_batch'] }}</td>
                                        <td>{{ $batch['nama_item'] }}</td>
                                        <td>{{ $batch['nama_komponen'] }}</td>
                                        <td>
                                            <center>{{ $batch['panjang'] }}</center>
                                        </td>
                                        <td>
                                            <center>{{ $batch['lebar'] }}</center>
                                        </td>
                                        <td>
                                            <center>{{ $batch['tinggi'] }}</center>
                                        </td>
                                        <td>
                                            <center><input type="number" min="0" max="{{ $batch['target'] }}" wire:model='selesai.{{ $key }}' inputmode="numeric"
                                                    style="width: 100px" class="form-control">
                                            </center>
                                        </td>
                                        <td>
                                            <center>{{ $batch['kurang'] }}</center>
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
    </div><!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-success">Kirim Laporan</button>
    </div>
    </form>
</div>
