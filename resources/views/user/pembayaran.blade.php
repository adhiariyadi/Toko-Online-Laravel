@extends('template_frontend.home')
@section('content')

	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Pembayaran</h4>
			<div class="site-pagination">
				<a href="{{ route('home') }}">Home</a> /
				<a href="{{ route('cekout') }}">Pembayaran</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->

  <section class="top-letest-product-section">
		<div class="container">
			<div class="row">
        <div class="col-md-12">
          @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
              {{ Session('success') }}
            </div>
          @endif
        </div>
        <div class="col-md-12">
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
            <th>Action</th>
            <th>Ket.</th>
          </tr>
          @foreach ($order as $result => $d)
            @if ($user->id == $d->user_id)
              @if ($d->payment_status == 'Belum Dibayar')
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
                    <form action="{{ route('order.bayar', $d->id) }}" method="post">
                      @csrf
                      @method('patch')
                      <button type="submit" class="btn btn-primary btn-sm" name="button">Bayar</button>
                    </form>
                    <form action="{{ route('order.destroy', $d->id) }}" method="post">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-danger btn-sm" name="button">Cancel</button>
                    </form>
                  </td>
                  <td>Mohon Bayar Dulu</td>
                </tr>
              @elseif ($d->payment_status == 'Dipending')
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
                    <form action="{{ route('order.destroy', $d->id) }}" method="post">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-danger btn-sm" name="button">Cancel</button>
                    </form>
                  </td>
                  <td>Mohon Tunggu Konfirmasi Admin</td>
                </tr>
              @else
                <tr>
                  <td>{{ $result + $order->firstitem() }}</td>
                  <td>{{ $d->user->name }}</td>
                  <td>{{ $d->mobil->type }}</td>
                  <td>{{ $d->quantity }}</td>
                  <td>$ {{ number_format($d->total, 0) }}</td>
                  <td>{{ $d->payment_method }}</td>
                  <td>{{ $d->payment_status }}</td>
                  <td>{{ $d->created_at->diffForHumans() }}</td>
                  <td></td>
                  <td>Pembayaran Berhasil</td>
                </tr>
              @endif
            @else

            @endif
          @endforeach
        </table>
			  {{ $order->links() }}
        </div>
      </div>
    </div>
  </section>

@endsection
