<table class="table table-bordered">
  <tr>
    <th>Nama : </th>
    <td>{{ $item->name }}</td>
  </tr>
  <tr>
    <th>Email : </th>
    <td>{{ $item->email }}</td>
  </tr>
  <tr>
    <th>No Telp : </th>
    <td>{{ $item->no_telp }}</td>
  </tr>
  <tr>
    <th>Alamat : </th>
    <td>{{ $item->address }}</td>
  </tr>
  <tr>
    <th>Total Transaksi : </th>
    <td>{{ $item->transaction_total }}</td>
  </tr>
  <tr>
    <th>Status Transaksi : </th>
    <td>{{ $item->transaction_status }}</td>
  </tr>
  <tr>
    <th>Pembelian Produk : </th>
    <td>
      <table class="table table-bordered w-100">
        <tr>
          <th>Barang</th>
          <th>Tipe</th>
          <th>Harga</th>
        </tr>
        <tr>
          @foreach ($item->detail as $detail)
              <td>{{ $detail->product->name }}</td>
              <td>{{ $detail->product->type }}</td>
              <td>{{ $detail->product->price }}</td>
          @endforeach
        </tr>
      </table>
    </td>
  </tr>
</table>
<div class="row">
  <div class="col-lg-4">
    <a href="{{ route('transactions.status', $item->id) }}?status=SUCCESS" class="btn btn-success btn-block">
      <i class="fa fa-check"> Set Sukses</i>
    </a>
  </div>
  <div class="col-lg-4">
    <a href="{{ route('transactions.status', $item->id) }}?status=PENDING" class="btn btn-warning btn-block">
      <i class="fa fa-spinner"> Set Pending</i>
    </a>
  </div>
  <div class="col-lg-4">
    <a href="{{ route('transactions.status', $item->id) }}?status=FAILED" class="btn btn-danger btn-block">
      <i class="fa fa-times"> Set failed</i>
    </a>
  </div>
</div>