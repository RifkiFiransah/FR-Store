@extends('layouts.default')
@section('main-content')
    <div class="card">
    <div class="card-header">
        <strong>Tambah Image Barang</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('product-galleri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="product_id" class="form-control-label">Pilih Barang</label>
            <select name="product_id" id="product_id" class="form-control">
                @forelse ($items as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @empty
                    <option value="-">-</option>
                @endforelse
            </select>
            {{-- <input  type="text"
                    name="name" 
                    value="{{ old('name') }}" 
                    class="form-control @error('name') is-invalid @enderror"/> --}}
            @error('name') <div class="text-muted">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="photo" class="form-control-label">Image</label>
            <input  type="file"
                    name="photo"
                    accept="image/*"
                    value="{{ old('photo') }}" 
                    class="form-control @error('photo') is-invalid @enderror"/>
            @error('photo') <div class="text-muted">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="is_default" class="form-control-label">Default</label>
            <br>
            <label for="">
                <input  type="radio"
                        name="is_default" 
                        value="1" 
                        class=" @error('is_default') is-invalid @enderror"/> Iya
            </label>
            &nbsp;
            <label for="">
                <input  type="radio"
                        name="is_default" 
                        value="0" 
                        class=" @error('is_default') is-invalid @enderror"/> Tidak
            </label>
            @error('is_default') <div class="text-muted">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">
            Tambah Image Barang
            </button>
        </div>
        </form>
    </div>
    </div>
@endsection
@push('before-script')
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>


<script>
  ClassicEditor
      .create( document.querySelector( '#editor' ) )
      .catch( error => {
          console.error( error );
      } );
</script>    
@endpush
