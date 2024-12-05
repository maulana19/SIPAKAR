<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title mt-2">
                <i class="fa fa-users"></i>
                Daftar Akun
            </h3>
            <div class="card-tools">
                <form class="form-inline" wire:submit.prevent='submit'>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari Akun ..."
                            aria-label="Nama Akun" wire:model='keyword' aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit"
                                id="button-addon2"><span class="fa fa-search"></span></button>
                            <a href="/users/add" class="btn btn-outline-success"
                                id="button-addon2"><span class="fa fa-plus"></span><b> Tambah Akun</b></a>
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
                    <th scope="col"><center>Username</center></th>
                    <th scope="col"><center>Admin Area</center></th>
                    <th scope="col"><center>Opsi</center></th>
                  </tr>
                </thead>
                <tbody>
                    @if ($data->count() > 0)
                        @foreach ($data as $user)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <center>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="/users/edit/{{ Crypt::encrypt($user->kode_user); }}" class="btn btn-outline-primary"><b>Edit</b></a>
                                                <a href="/users/change-password/{{ Crypt::encrypt($user->kode_user); }}" class="btn btn-outline-info"><b>Ganti Password</b></a>
                                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#ModalDeleteData" data-whatever="{{ Crypt::encrypt($user->kode_user) }}"><b>Hapus</b></button>
                                            </div>
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">
                                <center>
                                    <b>Akun Tidak Ditemukan</b>
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
</div>
