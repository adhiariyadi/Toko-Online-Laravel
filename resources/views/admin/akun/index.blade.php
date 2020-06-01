@extends('template_backend.home')
@section('halaman', 'List Akun')
@section('content')
  @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
      {{ Session('success') }}
    </div>
  @endif

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="welcome-wrapper shadow-reset res-mg-t mg-b-30">
      <a href="{{ route('akun.create') }}" class="btn btn-primary btn-sm mb-2">Tambah User</a><br><br>
      <table class="table table-striped table-hover table-sm table-bordered">
        <tr>
          <th>Id</th>
          <th>Nama</th>
          <th>Roles</th>
          <th>Email</th>
          <th>Alamat</th>
          <th>Thumbnail</th>
          <th>Action</th>
        </tr>
        @foreach ($user as $result => $d)
          <tr>
            <td>{{ $result + $user->firstitem() }}</td>
            <td>{{ $d->name }}</td>
            <td>{{ $d->role }}</td>
            <td>{{ $d->email }}</td>
            <td>
              @if($d->address && $d->kelurahan && $d->kecamatan && $d->kabupaten && $d->provinsi)
                {{ $d->address }}, {{ $d->kelurahan }}, {{ $d->kecamatan }}, {{ $d->kabupaten }}, {{ $d->provinsi }}
              @else
                N/A
              @endif
            </td>
            <td>
              @if($d->gambar)
                <img src="{{ asset( $d->gambar ) }}" class="img-fluid" width="100" alt="">
              @else
                N/A
              @endif
            </td>
            <td>
              <form action="{{ route('akun.destroy', $d->id) }}" method="post">
                @csrf
                @method('delete')
                <a href="{{ route('akun.edit', $d->id) }}" class="btn btn-success btn-sm">Edit</a>
                <button type="submit" class="btn btn-danger btn-sm" name="button">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </table>
      {{ $user->links() }}
    </div>
  </div>
@endsection
