@extends('layouts.default')
@push('after-style')
<script src="https://cdn.ckeditor.com/ckeditor5/17.0.0/classic/ckeditor.js"></script>

@endpush
@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Update Product</strong>
            <small>{{ $item->name }}</small>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('products.update', $item->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Product</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ? old('name') : $item->name }}">
                    @error('name') <div class="text-muted"> {{ $message }} </div>@enderror
                </div>

                <div class="form-group">
                    <label for="type" class="form-control-label">Type Product</label>
                    <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" value="{{ old('type') ? old('type') : $item->name  }}">
                    @error('type') <div class="text-muted"> {{ $message }} </div>@enderror
                </div>

                <div class="form-group">
                    <label for="description" class="form-control-label">Description Product</label>
                <textarea name="description" cols="6" id="desc" class="form-control @error('description') is-invalid @enderror">{{ old('description') ? old('description') : $item->description}}</textarea>
                @error('description') <div class="text-muted"> {{ $message }} </div>@enderror
                </div>

                <div class="form-group">
                    <label for="price" class="form-control-label">price Product</label>
                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') ? old('price') : $item->price }}">
                    @error('price') <div class="text-muted"> {{ $message }} </div>  @enderror               
                </div>

                <div class="form-group">
                    <label for="qty" class="form-control-label">Quantity Product</label>
                    <input type="text" name="qty" class="form-control @error('qty') is-invalid @enderror" value="{{ old('qty') ? old('qty') : $item->qty }}">
                    @error('qty') <div class="text-muted"> {{ $message }} </div>  @enderror               
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">
                        Update Product
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('after-script')
<script>
        ClassicEditor
                .create( document.querySelector( '#desc' ) )
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                } );
</script>
@endpush