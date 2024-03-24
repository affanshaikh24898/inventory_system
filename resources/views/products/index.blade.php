@extends('auth.layouts')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Products</h1>
                <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Create Product</a>
                <a href="{{ route('dashboard') }}" class="btn btn-primary mb-3">back</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Total Qty</th>
                            <th>Price</th>
                            <th style="text-align: center;">Lots</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->qty }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <ul style="list-style-type: none;">
                                        @foreach ($product->lots as $lot)
                                            <div style="border:1px solid gray;margin:5px;">
                                                <li>- lot name : {{ $lot->title }}</li>
                                                <li>- lot qty : {{ $lot->qty }}</li>
                                                <li>- lot expire : {{ $lot->expiration_date }}</li>
                                            </div>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    {{-- <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a> --}}
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection