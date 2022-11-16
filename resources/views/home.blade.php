@extends('layouts.app')

@section('content')
<div class="container bg-dark ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="d-flex justify-content-between mx-5 border p-3">
                        <p>Stock</p>
                        <a href="{{route('stock.index')}}" class="btn btn-success" style="text-decoration: none;">View Stock</a>
                    </div>

                    <div class="d-flex justify-content-between mx-5 border p-3">
                        <p>Tests</p>
                        <a href="{{route('test')}}" class="btn btn-success" style="text-decoration: none;">Tests</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection