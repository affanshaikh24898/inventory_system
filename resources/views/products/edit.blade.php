@extends('auth.layouts')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Edit Product</h2>
                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </form>
            </div>
        </div>
    </div>
@endsection