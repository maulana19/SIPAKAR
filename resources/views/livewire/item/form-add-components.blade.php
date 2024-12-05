<div style="width: 100%">
    <div class="col-md-12">
        <center>
            <button type="button" ty class="btn btn-md btn-outline-primary" data-toggle="modal"
                data-target="#addComponentModal">Tambah Komponen</button>
        </center>
    </div>

    <div class="modal fade" id="addComponentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent='submitcomponent'>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Nama Komponen :</label>
                                    <input type="text" wire:model="nama_komponen"
                                        placeholder="Tambahkan Nama Komponen" id="" class="form-control @error('nama_komponen') is-invalid @enderror">
                                    @error('nama_komponen')
                                        <code>
                                            {{ $message }}
                                        </code>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label>Ukuran Komponen :</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Panjang :</label>
                                            <input type="number" wire:model="panjang" id=""
                                                class="form-control @error('panjang') is-invalid @enderror">
                                            @error('panjang')
                                                <code>
                                                    {{ $message }}
                                                </code>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Lebar :</label>
                                            <input type="number" wire:model="lebar" id=""
                                                class="form-control @error('lebar') is-invalid @enderror">
                                                @error('lebar')
                                                    <code>
                                                        {{ $message }}
                                                    </code>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Tinggi :</label>
                                            <input type="number" wire:model="tinggi" id=""
                                                class="form-control @error('tinggi') is-invalid @enderror">
                                                @error('tinggi')
                                                    <code>
                                                        {{ $message }}
                                                    </code>
                                                @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for=""><b>Sub Komponen :</b></label>
                                    <input type="text" wire:model="jenis" placeholder="Tambahkan Jenis Dari Komponen"
                                        id="" class="form-control @error('jenis') is-invalid @enderror">
                                        @error('jenis')
                                            <code>
                                                {{ $message }}
                                            </code>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for=""><b>Zona :</b></label>
                                    <input type="text" wire:model="zona" placeholder="Tambahkan Zona Dari Komponen"
                                        id="" class="form-control @error('zona') is-invalid @enderror">
                                        @error('zona')
                                            <code>
                                                {{ $message }}
                                            </code>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">
                                        <b>Pola :</b>
                                    </label>
                                    <select wire:model="pola" id="" class="form-control @error('pola') is-invalid @enderror">
                                        <option value="" hidden>Silahkan Pilih Pola Komponen</option>
                                        <option value="Atas Bawah">Atas Bawah</option>
                                        <option value="Atas">Atas</option>
                                        <option value="Bawah Kanan Kiri">Bawah Kanan Kiri</option>
                                        <option value="Bawah">Bawah</option>
                                        <option value="Kanan Atas Bawah">Kanan Atas Bawah</option>
                                        <option value="Kanan Atas">Kanan Atas</option>
                                        <option value="Kanan Bawah">Kanan Bawah</option>
                                        <option value="Kanan Kiri Atas">Kanan Kiri Atas</option>
                                        <option value="Kanan Kiri">Kanan Kiri</option>
                                        <option value="Kanan">Kanan</option>
                                        <option value="Kiri Atas Bawah">Kiri Atas Bawah</option>
                                        <option value="Kiri Atas">Kiri Atas</option>
                                        <option value="Kiri Bawah">Kiri Bawah</option>
                                        <option value="Kiri">Kiri</option>
                                        <option value="Kosong">Kosong</option>
                                        <option value="Semua">Semua</option>
                                    </select>
                                    @error('pola')
                                        <code>
                                            {{ $message }}
                                        </code>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" onclick="$('#addComponentModal').modal('hide');">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
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
                @if ($datacomponent != null)
                @foreach ($datacomponent as $key => $component)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $component['nama_komponen'] }}</td>
                        <td><center>{{ $component['panjang'] }}</center></td>
                        <td><center>{{ $component['lebar'] }}</center></td>
                        <td><center>{{ $component['tinggi'] }}</center></td>
                        <td><center>{{ $component['zona'] }}</center></td>
                        <td><center>{{ $component['jenis'] }}</center></td>
                        <td>
                            <center>
                                @switch($component['pola'])
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
                            <center>Data Komponen pada Item yang Ditambahkan Belum Ditemukan</center>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
