@extends('template_backend.home')
@section('halaman', 'Tambah Akun')
@section('content')
  @if (count($errors)>0)
    @foreach ($errors->all() as $error)
      <div class="alert alert-danger" role="alert">
        {{ $error }}
      </div>
    @endforeach
  @endif

  @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
      {{ Session('success') }}
    </div>
  @endif

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="welcome-wrapper shadow-reset res-mg-t mg-b-30">
      <form action="{{ route('akun.store') }}" class="bg-white shadow-sm p-3" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input class="form-control" placeholder="Full Name" type="text" name="name" id="name" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="name">Roles</label><br>
          <input type="radio" name="role" id="admin" value="admin">
          <label for="admin">Admin</label>&nbsp;&nbsp;&nbsp;
          <input type="radio" name="role" id="member" value="member">
          <label for="member">Member</label>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Foto Profil</label>
          <div class="file-upload-inner ts-forms">
              <div class="input prepend-big-btn">
                  <label class="icon-right" for="prepend-big-btn">
                      <i class="fa fa-download"></i>
                  </label>
                  <div class="file-button">
                      Browse
                      <input type="file" name="gambar" onchange="document.getElementById('prepend-big-btn').value = this.value;">
                  </div>
                  <input type="text" id="prepend-big-btn" name="gambar" placeholder="no file selected">
              </div>
          </div>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input class="form-control" placeholder="Email@gamil.com" type="email" name="email" id="email" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input class="form-control" placeholder="Password" type="password" name="password" id="password" autocomplete="off">
        </div>

        <div class="form-group">
          <button class="btn btn-primary btn-block">Simpan Akun</button>
        </div>
      </form>
    </div>
  </div>
@endsection
