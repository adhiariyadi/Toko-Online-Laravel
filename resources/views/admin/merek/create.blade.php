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
@endsection
