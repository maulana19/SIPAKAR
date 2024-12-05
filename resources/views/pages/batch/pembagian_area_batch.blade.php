@extends('base')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                @if (\Session::has('berhasil'))
                    <div id="alert" class="alert alert-success floating-alert" role="alert">
                        {!! \Session::get('berhasil') !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pembagian Area Pengerjaan Batch</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Daftar Batch
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <livewire:batch.form-penugasan-batch :id="Crypt::encrypt($dataPenugasan->kode_batch)">
                </div>
            </div>
        </section>

    </div>
@endsection