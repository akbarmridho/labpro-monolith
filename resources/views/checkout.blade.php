@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Checkout
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$item->resource['nama']}}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Price Rp{{$item->resource['harga']}}</li>
                        <li class="list-group-item">Quantity {{$quantity}}</li>
                        <li class="list-group-item">Total Rp{{$quantity*$item->resource['harga']}}</li>
                    </ul>
                    <div class="card-body">
                        <form method="POST" action="{{route('purchase')}}">
                            @csrf
                            <input type="text" hidden value="{{$item->resource['id']}}" name="id"/>
                            <input type="number" hidden value="{{$quantity}}" name="quantity"/>
                            <button type="submit" class="btn btn-primary">Purchase</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
