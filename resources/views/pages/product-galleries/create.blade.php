@extends('layouts.default')
@push('after-style')
<script src="https://cdn.ckeditor.com/ckeditor5/17.0.0/classic/ckeditor.js"></script>

@endpush
@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Add Photo Product</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('product-galleries.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Product</label>
                    <select name="product_id" class="form-control @error('product_id') is-invalid @enderror">
                        @foreach ($products as $product)
                            <option value="{{ $product->id}}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    @error('product_id') <div class="text-muted"> {{ $message }} </div>@enderror
                </div>

                <div class="form-group">
                    <label for="photo" class="form-control-label">Photo Product</label>
                    <input type="file" accept="image/*" name="photo" class="form-control @error('photo') is-invalid @enderror" value="{{ old('photo') }}">
                    @error('photo') <div class="text-muted"> {{ $message }} </div>@enderror
                </div>

                <div class="form-group">
                    <label for="is_default" class="form-control-label">Default Photo</label>
                    <br>
                    <label>
                        <input type="radio" name="is_default" class=" @error('is_default') is-invalid @enderror" value="1" /> Yes
                    </label>
                    &nbsp;
                    <label>
                        <input type="radio" name="is_default" class=" @error('is_default') is-invalid @enderror" value="0" /> No
                    </label>
                    @error('is_default') <div class="text-muted"> {{ $message }} </div>  @enderror               
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">
                        Add Photo
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