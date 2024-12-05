
<div class="card">
    <div class="card-header">
        <h3 class="card-title mt-2">
            <i class="fa fa-tags"></i>
            Daftar Batch
        </h3>
        <div class="card-tools">
            <form wire:submit.prevent='cariBatch' class="form-inline">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Batch..."
                        aria-label="Recipient's username" wire:model='keyword' aria-describedby="button-addon2">
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
                <th scope="col"><center>Nama Batch</center></th>
                <th scope="col"><center>Total Komponen</center></th>
                <th scope="col"><center>Area Pengerjaan</center></th>
                <th scope="col"><center>Tanggal</center></th>
                <th scope="col"><center>Opsi</center></th>
              </tr>
            </thead>
            <tbody>
                @if ($dataBatch->count() > 0)
                @php
                    $no = 1;
                @endphp
                @foreach ($dataBatch as $batch)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $batch->nama_batch }}</td>
                        <td><center>{{ $batch->componentBatch->count() }}</center></td>
                        <td style="max-width: 20px;word-wrap: break-word;overflow-wrap: break-word;">
                            @foreach ($batch->Area as $area)
                                @if ($area->Admin->role == 'Sawmill')
                                    <h6 class="badge badge-primary">Sawmill</h6>
                                @endif
                                @if ($area->Admin->role == 'Roughmill')
                                    <h6 class="badge badge-primary">Roughmill</h6>
                                @endif
                                @if ($area->Admin->role == 'Milling')
                                    <h6 class="badge badge-primary">Milling</h6>
                                @endif
                                @if ($area->Admin->role == 'Assembling')
                                    <h6 class="badge badge-primary">Assembling</h6>
                                @endif
                                @if ($area->Admin->role == 'Finishing')
                                    <h6 class="badge badge-primary">Finishing</h6>
                                @endif
                                @if ($area->Admin->role == 'Packing')
                                    <h6 class="badge badge-primary">Packing</h6>
                                @endif
                                @if ($area->Admin->role == 'Pola')
                                    <h6 class="badge badge-primary">Pola</h6>
                                @endif
                            @endforeach
                        </td>
                        <td><center>{{ $batch->created_at->format('d-m-Y') }}</center></td>
                        <td>
                            <center>
                                <form action="/batch/delete/{{ Crypt::encrypt($batch->kode_batch) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="/batch/detail/{{ Crypt::encrypt($batch->kode_batch) }}" class="btn btn-outline-primary"><b>Detail</b></a>
                                        <a href="/batch/pembagian-area/{{ Crypt::encrypt($batch->kode_batch) }}" class="btn btn-outline-success"><b>Area</b></a>
                                        {{-- <a href="/batch/edit/1" class="btn btn-outline-primary"><b>Edit</b></a> --}}
                                        <button type="submit" class="btn btn-outline-danger"><b>Hapus</b></button>
                                    </div>
                                </form>
                            </center>
                        </td>
                    </tr>
                @endforeach
                @else
                    <tr>
                        <td colspan="6">
                            <center>
                                <b>Data Batch Tidak Ditemukan !</b>
                            </center>
                        </td>
                    </tr>
                @endif
            </tbody>
          </table>
        </div>
    </div>
</div>
