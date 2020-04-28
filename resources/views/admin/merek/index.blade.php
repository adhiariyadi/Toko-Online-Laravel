@extends('template_backend.home')
@section('halaman', 'List Merek')
@section('content')
  @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
      {{ Session('success') }}
    </div>
  @endif

  <a href="{{ route('merek.create') }}" class="btn btn-primary btn-sm">Tambah Kategori</a><br><br>
  <table class="table table-striped table-hover table-sm table-bordered">
    <tr>
      <th>No</th>
      <th>Nama Kategori</th>
      <th>Action</th>
    </tr>
    @foreach ($merek as $result => $d)
      <tr>
        <td>{{ $result + $merek->firstitem() }}</td>
        <td>{{ $d->name }}</td>
        <td>
          <form action="{{ route('merek.destroy', $d->id) }}" method="post">
            @csrf
            @method('delete')
            <a href="{{ route('merek.edit', $d->id) }}" class="btn btn-success btn-sm">Edit</a>
            <button type="submit" class="btn btn-danger btn-sm" name="button">Delete</button>
          </form>
        </td>
      </tr>
    @endforeach
  </table>
  {{ $merek->links() }}
@endsection
