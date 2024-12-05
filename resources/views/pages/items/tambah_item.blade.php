@extends('base')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">

                @if (\Session::has('gagal'))
                    <div id="alert" class="alert alert-danger floating-alert" role="alert">
                        {!! \Session::get('gagal') !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Item</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="/items">Daftar item</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Tambah Item Baru
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
                        <livewire:item.form-add-item>
                    </section>
                </div>
            </div>
        </section>

    </div>
@endsection
