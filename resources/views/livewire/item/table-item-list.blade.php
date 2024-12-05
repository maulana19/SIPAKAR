
<div class="card">
    <div class="card-header">
        <h3 class="card-title mt-2">
            <i class="fa fa-archive"></i>
            Daftar Item
        </h3>
        <div class="card-tools">
            <form wire:submit='submitItemForms' class="form-inline">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Item ..."
                        aria-label="Nama Item" wire:model='key' aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit"
                            id="button-addon2"><span class="fa fa-search"></span></button>
                    </div>
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
                <th scope="col">#</th>
                <th scope="col"><center>Nama Item</center></th>
                <th scope="col"><center>Total Komponen</center></th>
                {{-- <th scope="col"><center>Total Batch Produksi</center></th> --}}
                <th scope="col"><center>Opsi</center></th>
              </tr>
            </thead>
            <tbody>
                @if ($items->count() > 0)
                    @foreach ($items as $key => $data)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $data->nama_item }}</td>
                            <td><center>{{ $data->components->count() }}</center></td>
                            <td>
                                <center>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="/items/edit/{{ Crypt::encrypt($data->kode_item) }}" class="btn btn-outline-primary"><b>Edit</b></a>
                                            <a href="/items/detail/{{ Crypt::encrypt($data->kode_item) }}" class="btn btn-outline-primary"><b>Detail</b></a>
                                            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#ModalDeleteData" data-whatever="{{ Crypt::encrypt($data->kode_item) }}"><b>Hapus</b></button>
                                        </div>
                                </center>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">
                            <center>
                                Item Tidak Ditemukan
                            </center>
                        </td>
                    </tr>
                @endif
            </tbody>
            <div class="modal fade" style="top: 20%;" id="ModalDeleteData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header bg-danger">
                      <h5 class="modal-title" id="exampleModalLabel"><b>Konfirmasi Hapus Data</b></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="" id="formDelete" method="POST">
                        @csrf
                        @method('delete')
                        <div class="modal-body">
                            <p><b>Apakah Anda yakin Akan Menghapus Akun Tersebut ?</b></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Hapus Akun</button>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
          </table>
        </div>
    </div>
</div>
