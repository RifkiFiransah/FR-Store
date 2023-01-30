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
          <strong class="card-title">Data Image Barang</strong>
        </div>
        <div class="table-stats order-table ov-h"">
          <table class="table">
            <thead>
              <tr>
                <th class="serial">#</th>
                <th>Nama Barang</th>
                <th>Image</th>
                <th>Default</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($items as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->product->name }}</td>
                <td><img src="{{ $item->photo }}" width="300"></td>
                <td>{{ $item->is_default }}</td>
                <td>
                  <form action="{{ route('product-galleri.destroy', $item->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-small"><i class="fa fa-trash"></i></button>
                  </form>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="7" class="text-center">Image Barang Belum Tersedia</td>s
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