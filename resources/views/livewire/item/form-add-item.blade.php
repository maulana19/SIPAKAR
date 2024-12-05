<div>
    <div class="card">
        <form wire:submit='SubmitComponent'>
            <div class="card-header">
                <h3 class="card-title mt-2">
                    <i class="fa fa-clone"></i>
                    Isi Form Berikut untuk Menambahkan Item Baru !
                </h3>
                <div class="card-tools">
                    <button type="submit" class="btn btn-success" id="button-addon2"><span class="fa fa-save"></span>
                        Simpan</button>
                </div>
            </div>

            <div class="card-body">
                <div class="tab-content p-0" style="overflow: auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control @error('kode_item') is-invalid @enderror" wire:model='kode_item' placeholder="Tambahkan Kode Item">
                                @error('kode_item')
                                    <code>
                                        {{ $message }}
                                    </code>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" wire:model='nama_item' class="form-control @error('nama_item') is-invalid @enderror" placeholder="Tambahkan Nama Item">
                                @error('nama_item')
                                    <code>
                                        {{ $message }}
                                    </code>
                                @enderror
                            </div>
                        </div>
                        </form>
                        <livewire:item.form-add-components>
                    </div>
                </div>
            </div>
    </div>
</div>
