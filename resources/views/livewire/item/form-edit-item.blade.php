<div class="card">

    <form  wire:submit.prevent='updateItem'>
    <div class="card-header">
        <h3 class="card-title mt-2">
            <i class="fa fa-clone"></i>
            Isi Form Berikut untuk Mengubah Data Item !
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
                    <h6><b>Kode Item : </b></h6>
                    <div class="form-group">
                        <input type="text" wire:model='kode_item' class="form-control" placeholder="Tambahkan Kode Item">
                    </div>
                </div>
                <div class="col-md-6">
                    <h6><b>Nama Item : </b></h6>
                    <div class="form-group">
                        <input wire:model='nama_item' type="text" class="form-control" placeholder="Tambahkan Nama Item">
                    </div>
                </div>
                </form>
                @livewire('item.form-edit-components',['dataKomponen' => $dataKomponen, 'idItem' => $idItem])
            </div>
        </div>
    </div>
</div>
