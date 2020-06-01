@extends('template_backend.home')
@section('halaman', 'Edit Merek')
@section('content')
  @if (count($errors)>0)
    @foreach ($errors->all() as $error)
      <div class="alert alert-danger" role="alert">
        {{ $error }}
      </div>
    @endforeach
  @endif

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="welcome-wrapper shadow-reset res-mg-t mg-b-30">
      <form action="{{ route('merek.update', $merek->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
          <label>Merek Mobil</label>
          <input type="text" class="form-control" value="{{ $merek->name }}" name="name" autocomplete="off">
        </div>

        <div class="form-group">
          <button class="btn btn-primary btn-block">Update Merek</button>
        </div>
      </form>
    </div>
  </div>
@endsection
