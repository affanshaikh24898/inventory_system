@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="float:right;">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                <a href="{{ route('products.index') }}" class="btn btn-primary">Go To Product Page</a>
                <a href="{{ route('lowqty') }}" class="btn btn-primary">Run LowQty Scheduler</a>
                <a href="{{ route('expireydate') }}" class="btn btn-primary">Run Expiredate Scheduler</a>
            </div>
        </div>
    </div>    
</div>
@endsection