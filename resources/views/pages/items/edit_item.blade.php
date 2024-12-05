@extends('base')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">

                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update Item</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="/items">Daftar Item</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Update Item
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
                        <livewire:item.form-edit-item :itemId='$id' />
                    </section>
                </div>
            </div>
        </section>

    </div>
@endsection
