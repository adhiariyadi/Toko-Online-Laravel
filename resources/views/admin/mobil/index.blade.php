@extends('template_backend.home')
@section('halaman', 'List Mobil')
@section('content')
  @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
      {{ Session('success') }}
    </div>
  @endif

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="welcome-wrapper shadow-reset res-mg-t mg-b-30">
      <a href="{{ route('create.mobil') }}" class="btn btn-primary btn-sm">Tambah Mobil</a><br><br>
      <table class="table table-striped table-hover table-sm table-bordered">
        <tr>
          <th>No</th>
          <th>Merek Mobil</th>
          <th>Type Mobil</th>
          <th>price</th>
          <th>Thumbnail</th>
          <th>Action</th>
        </tr>
        @foreach ($mobil as $result => $d)
          <tr>
            <td>{{ $result + $mobil->firstitem() }}</td>
            <td>{{ $d->merek->name }}</td>
            <td>{{ $d->type }}</td>
            <td>$ {{ $d->price }}</td>
            <td>
              <img src="{{ asset( $d->gambar ) }}" class="img-fluid" width="100" alt="">
            </td>
            <td>
              <form action="{{ route('mobil.destroy', $d->id) }}" method="Mobil">
                @csrf
                @method('delete')
                <a href="{{ route('mobil.edit', $d->id) }}" class="btn btn-success btn-sm">Edit</a>
                <button type="submit" class="btn btn-danger btn-sm" name="button">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </table>
      {{ $mobil->links() }}
    </div>
  </div>
@endsection
