@extends('template_backend.home')
@section('halaman', 'List Mobil Belum Dibayar')
@section('content')
  @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
      {{ Session('success') }}
    </div>
  @endif

  <table class="table table-striped table-hover table-sm table-bordered">
    <tr>
      <th>No</th>
      <th>Nama User</th>
      <th>Type Mobil</th>
      <th>Quantity</th>
      <th>Harga</th>
      <th>Payment Method</th>
      <th>Payment Status</th>
      <th>Waktu Order</th>
      <th>Konfirmasi</th>
    </tr>
    @foreach ($order as $result => $d)
      <tr>
        <td>{{ $result + $order->firstitem() }}</td>
        <td>{{ $d->user->name }}</td>
        <td>{{ $d->mobil->type }}</td>
        <td>{{ $d->quantity }}</td>
        <td>$ {{ number_format($d->total, 0) }}</td>
        <td>{{ $d->payment_method }}</td>
        <td>{{ $d->payment_status }}</td>
        <td>{{ $d->created_at->diffForHumans() }}</td>
        <td>
          <form action="{{ route('order.update', $d->id) }}" method="post">
            @csrf
            @method('patch')
            <button type="submit" class="btn btn-primary btn-sm" name="button">Konfirmasi</button>
          </form>
        </td>
      </tr>
    @endforeach
  </table>
  {{ $order->links() }}
@endsection
