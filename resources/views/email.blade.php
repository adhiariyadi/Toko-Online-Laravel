<form action="{{ route('order.bayar', $d->id) }}" method="post">
  @csrf
  @method('patch')
  <button type="submit" class="btn btn-primary btn-sm" name="button">Bayar</button>
</form>
