@extends('layouts.default')

@section('main-content')
    <div class="card">
      <div class="card-header">
        <strong>Edit Transaksi</strong>
        <small>{{ $item->uuid }}</small>
      </div>
      <div class="card-body card-block">
        <form action="{{ route('transactions.update', $item->id) }}" method="POST">
        @method('put')
        @csrf
        <div class="form-group">
          <label for="name" class="form-control-label">Nama Pemesanan</label>
          <input type="text" name="name" value="{{ old('name') ? old('name') : $item->name}}" class="form-control @error('name') is-inavlid @enderror">
          @error('name')
            <div class="text-muted">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="email" class="form-control-label">Email</label>
          <input type="email" name="email" value="{{ old('email') ? old('email') : $item->email}}" class="form-control @error('email') is-inavlid @enderror">
          @error('email')
            <div class="text-muted">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="no_telp" class="form-control-label">No Telp</label>
          <input type="number" name="no_telp" value="{{ old('no_telp') ? old('no_telp') : $item->no_telp}}" class="form-control @error('no_telp') is-inavlid @enderror">
          @error('no_telp')
            <div class="text-muted">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="address" class="form-control-label">Alamat</label>
          <input type="text" name="address" value="{{ old('address') ? old('address') : $item->address}}" class="form-control @error('address') is-inavlid @enderror">
          @error('address')
            <div class="text-muted">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Update Data</button>
        </div>
        </form>
      </div>
    </div>
@endsection