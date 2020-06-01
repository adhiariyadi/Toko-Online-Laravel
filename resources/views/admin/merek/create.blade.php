@extends('template_backend.home')
@section('halaman', 'Tambah Merek')
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
      <form action="{{ route('merek.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label>Merek Mobil</label>
          <input type="text" class="form-control" name="name" autocomplete="off">
        </div>

        <div class="form-group">
          <button class="btn btn-primary btn-block">Simpan Merek</button>
        </div>
      </form>
    </div>
  </div>
@endsection
