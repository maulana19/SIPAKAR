<div class="row">

    <div class="col-md-9">
        <div class="form-group">
            <select wire:model="selectedItem" id="" class="form-control">
                <option value="" hidden>Silahkan Pilih Item yang Akan Dibuat !</option>
                @if ($dataItem != null)
                    @foreach ($dataItem as $item)
                        <option value="{{ Crypt::encrypt($item['kode_item']) }}">{{ $item['nama_item'] }}</option>
                    @endforeach
                @endif
            </select>
            {{-- <input type="text" class="form-control" placeholder="Pilih Item" id="" wire:model.debounce.500ms="searchItem"> --}}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <button type="button" wire:click.prevent='cariKomponen' class="btn btn-primary">Cari Komponen</button>
        </div>
    </div>
    <div class="col-md-9">
        <div class="form-group">
            <select wire:model="selectedComponent" id="" class="form-control">
                <option value="" hidden>Silahkan Pilih Komponen yang Akan Dibuat !</option>
                @if ($dataKomponen != null)
                    @foreach ($dataKomponen as $komponen)
                        <option value="{{ Crypt::encrypt($komponen['kode_komponen']) }}">{{ $komponen['nama_komponen'] }}</option>
                    @endforeach
                @endif
            </select>
            {{-- <input type="text" class="form-control" placeholder="Pilih Komponen" id=""> --}}
        </div>
    </div>

    <div class="col-md-3">
        <button type="button" wire:click.prevent='tambahKomponen' class="btn btn-md btn-outline-primary">Tambah Komponen</button>
    </div>
</div>
