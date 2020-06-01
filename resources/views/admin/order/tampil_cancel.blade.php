@extends('template_backend.home')
@section('halaman', 'List Batal Order')
@section('content')
  @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
      {{ Session('success') }}
    </div>
  @endif

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="welcome-wrapper shadow-reset res-mg-t mg-b-30">
      <table class="table table-striped table-hover table-sm table-bordered">
        <tr>
          <th>No</th>
          <th>Nama User</th>
          <th>Type Mobil</th>
          <th>Quantity</th>
          <th>Harga</th>
          <th>Payment Status</th>
          <th>Waktu Cancel</th>
        </tr>
        @foreach ($order as $result => $data)
          <tr>
            <td>{{ $result + $order->firstitem() }}</td>
            <td>{{ $data->user->name }}</td>
            <td>{{ $data->namaMobil($data->mobil_id) }}</td>
            <td>{{ $data->quantity }}</td>
            <td>$ {{ number_format($data->total, 0) }}</td>
            <td>
              <span class="badge badge-warning text-white">{{ $data->payment_status }}</span>
            </td>
            <td>{{ $data->created_at->diffForHumans() }}</td>
          </tr>
        @endforeach
      </table>
      {{ $order->links() }}
    </div>
  </div>
@endsection
