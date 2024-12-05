<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-list mr-1"></i>
            Progress Pengerjaan
        </h3>
        <div class="card-tools">
            <form class="form-inline" wire:submit.prevent='cariLaporan'>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" wire:model='keyword' placeholder=" Cari Area atau Nama Batch..." aria-label="Recipient's username"
                        aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit" id="button-addon2"><span
                                class="fa fa-search"></span></button>
                    </div>
                </div>
            </form>
        </div>
    </div><!-- /.card-header -->
    <div class="card-body">
        <div class="tab-content p-0" style="overflow: auto">
            <!-- Morris chart - Sales -->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">
                            <center>Devisi</center>
                        </th>
                        <th scope="col">
                            <center>Planning</center>
                        </th>
                        <th style="max-width: 80px">
                            <center>Penyelesaian (%)</center>
                        </th>
                        <th scope="col">
                            <center>Opsi</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @if ($filtereddataReport != null)
                        @foreach ($filtereddataReport as $report)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $report['area'] }}</td>
                                <td>{{ $report['nama_batch'] }}</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-animated"
                                            role="progressbar" style="width: {{ $report['selesai'] }}%;" aria-valuenow="{{ $report['selesai'] }}" aria-valuemin="0"
                                            aria-valuemax="100"><b>{{ $report['selesai'] }}%</b></div>
                                    </div>
                                </td>
                                <td>
                                    <center>
                                        <a href="/detail-laporan/{{ Crypt::encrypt($report['kode_penugasan']); }}" class="btn btn-md btn-primary">
                                            Detail
                                        </a>
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">
                                <center><b>Belum Ada Data Laporan yang tersimpan.</b></center>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div><!-- /.card-body -->

    {{-- <div class="card-footer">
      <nav aria-label="...">
          <ul class="pagination">
            <li class="page-item disabled">
              <a class="page-link">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active" aria-current="page">
              <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">Next</a>
            </li>
          </ul>
        </nav>
    </div> --}}
</div>
