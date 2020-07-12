@extends('template_backend.home')
@section('halaman', 'Edit Akun')
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
      <form action="{{ route('akun.update', $user->id) }}" class="bg-white shadow-sm p-3" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" name="name" value="{{ $user->name }}" autocomplete="off">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" value="{{ $user->email }}" autocomplete="off" name="email" class="form-control">
        </div>
        @if ($user->pekerjaan)
          <div class="form-group">
            <label>Pekerjaan</label>
            <input type="text" value="{{ $user->pekerjaan }}" autocomplete="off" name="pekerjaan" class="form-control">
          </div>
        @else
          <div class="form-group">
            <label>Pekerjaan</label>
            <input type="text" placeholder="Pekerjaan" autocomplete="off" name="pekerjaan" class="form-control">
          </div>
        @endif
        <div class="form-group">
          <label for="name">Roles</label><br>
          <input type="radio" name="role" id="admin" value="admin">
          <label for="admin">Admin</label>&nbsp;&nbsp;&nbsp;
          <input type="radio" name="role" id="member" value="member">
          <label for="member">Member</label>
        </div>
        @if ($user->tanggal_lahir)
          <div class="form-group data-custon-pick" id="data_3">
            <label><h6>Tanggal Lahir</h6></label>
            <div class="input-group date">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              <input type="text" name="tgl_lahir" class="form-control" value="{{ date('m/d/Y', strtotime($user->tanggal_lahir)) }}">
            </div>
          </div>
        @else
          <div class="form-group data-custon-pick" id="data_3">
            <label><h6>Tanggal Lahir</h6></label>
            <div class="input-group date">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              <input type="text" name="tgl_lahir" class="form-control" value="22/11/2000">
            </div>
          </div>
        @endif
        <div class="form-group">
          <div class="row">
            <div class="col-md-12">
              @if($user->address)
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                </div>
              @else
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" class="form-control" name="address" placeholder="Alamat">
                </div>
              @endif
            </div>
            <div class="col-md-6">
              @if($user->kelurahan)
                <div class="form-group">
                  <label>Kelurahan</label>
                  <input type="text" class="form-control" name="kelurahan" value="{{ $user->kelurahan }}">
                </div>
              @else
                <div class="form-group">
                  <label>Kelurahan</label>
                  <input type="text" class="form-control" name="kelurahan" placeholder="Kelurahan">
                </div>
              @endif
              @if($user->kabupaten)
                <div class="form-group">
                  <label>Kabupaten</label>
                  <input type="text" class="form-control" name="kabupaten" value="{{ $user->kabupaten }}">
                </div>
              @else
                <div class="form-group">
                  <label>Kabupaten</label>
                  <input type="text" class="form-control" name="kabupaten" placeholder="Kabupaten">
                </div>
              @endif
            </div>
            <div class="col-md-6">
              @if($user->kecamatan)
                <div class="form-group">
                  <label>Kecamatan</label>
                  <input type="text" class="form-control" name="kecamatan" value="{{ $user->kecamatan }}">
                </div>
              @else
                <div class="form-group">
                  <label>Kecamatan</label>
                  <input type="text" class="form-control" name="kecamatan" placeholder="Kecamatan">
                </div>
              @endif
              @if($user->provinsi)
                <div class="form-group">
                  <label>Provinsi</label>
                  <input type="text" class="form-control" name="provinsi" value="{{ $user->provinsi }}">
                </div>
              @else
                <div class="form-group">
                  <label>Provinsi</label>
                  <input type="text" class="form-control" name="provinsi" placeholder="Provinsi">
                </div>
              @endif
            </div>
          </div>
        </div>
        @if($user->telepon)
          <div class="form-group">
            <label>Nomor Telepon</label>
            <input type="text" class="form-control" name="telepon" value="{{ $user->telepon }}">
          </div>
        @else
          <div class="form-group">
            <label>Nomor Telepon</label>
            <input type="text" class="form-control" name="telepon" placeholder="+62 8xx xxxx xxxx">
          </div>
        @endif
        <div class="form-group">
          <label>Password</label>
          <input class="form-control" placeholder="Password" type="password" name="password" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Foto</label>
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
        </div><br>

        <div class="form-group">
          <button class="btn btn-primary btn-block">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
@endsection
