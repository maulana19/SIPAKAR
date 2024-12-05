@extends('base')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Batch</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="/batch">Daftar Batch</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Tambah Batch Baru
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <section class="col-lg-12">
                        <div class="card">
                            <livewire:batch.form-add-batch>
                        </div>
                    </section>
                </div>
            </div>
        </section>

    </div>
@endsection
