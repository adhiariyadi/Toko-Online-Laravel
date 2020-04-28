@extends('template_backend.home')
@section('halaman', 'List Mobil')
@section('content')
  @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
      {{ Session('success') }}
    </div>
  @endif

  <a href="{{ route('mobil.create') }}" class="btn btn-primary btn-sm">Tambah Post</a><br><br>
  <table class="table table-striped table-hover table-sm table-bordered">
    <tr>
      <th>No</th>
      <th>Nama Post</th>
      <th>Kategori</th>
      <th>Daftar Tags</th>
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
          <form action="{{ route('mobil.destroy', $d->id) }}" method="post">
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
@endsection
