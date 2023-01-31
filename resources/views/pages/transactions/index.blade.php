@extends('layouts.default')

@section('main-content')
{{-- <div class="breadcrumbs mb-5">
  <div class="breadcrumbs-inner">
    <div class="row">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Data Barang</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Table</a></li>
                        <li class="active">Basic table</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<br> --}}
<div class="order">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <strong class="card-title">Data Transaksi</strong>
        </div>
        <div class="table-stats order-table ov-h"">
          <table class="table">
            <thead>
              <tr>
                <th class="serial">#</th>
                <th>Id Transaksi</th>
                <th>Nama Pemesanan</th>
                <th>Email</th>
                <th>Total</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($items as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->uuid }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->transaction_total }}</td>
                <td>
                  @if ($item->transaction_status == "PENDING")
                    <span class="badge badge-warning">{{ $item->transaction_status }}</span>  
                  @elseif ($item->transaction_status == "SUCCESS")
                    <span class="badge badge-success">{{ $item->transaction_status }}</span>
                  @elseif ($item->transaction_status == "FAILED")
                    <span class="badge badge-danger">{{ $item->transaction_status }}</span>
                  @else
                    <span></span>
                  @endif  
                </td>
                <td>
                  @if ($item->transaction_status == "PENDING")
                    <a href="{{ route('transactions.status', $item->id) }}?status=SUCCESS" class="btn btn-success btn-small"><i class="fa fa-check"></i></a>
                    <a href="{{ route('transactions.status', $item->id) }}?status=FAILED" class="btn btn-danger btn-small"><i class="fa fa-times"></i></a>
                  @endif
                  <a href="#mymodal"
                      data-remote="{{ route('transactions.show', $item->id) }}"
                      data-toggle="modal"
                      data-target="#mymodal"
                      data-title="Detail Transaksi {{ $item->uuid }}"
                      class="btn btn-info btn-sm">
                      <i class="fa fa-eye"></i>
                  </a>
                  <a href="{{ route('transactions.edit', $item->id) }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-pencil"></i>
                  </a>
                  <form action="{{ route('transactions.destroy', $item->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                  </form>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="7" class="text-center">Transaksi Belum Ada</td>s
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection