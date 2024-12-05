@extends('base')
@section('content')

<div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Silahkan Login Terlebih Dahulu</p>
      @if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
      @endif
      <form action="/login" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Nama Akun">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          &nbsp; @error('username') <code>{{ $message }}</code> @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          &nbsp; @error('password') <code>{{ $message }}</code> @enderror
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block"><b>Masuk</b></button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
@endsection
