@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <img src="https://placehold.co/600x400" class="card-img-top" alt="item image">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->resource['nama']}}</h5>
                        <p class="card-text">Sisa stok {{$item->resource['stok']}}</p>
                        <p class="card-text">Rp{{$item->resource['harga']}}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Kode {{$item->resource['kode']}}</li>
                        <li class="list-group-item">Perusahaan {{$company->resource['nama']}}</li>
                    </ul>
                    <div class="card-body">
                        <form action="{{route('item.purchase', ['id' => $item->resource['id']])}}">
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="quantity" value="1" name="quantity"
                                       {{$item->resource['stok'] === 0 ? 'disabled' : ''}} max="{{$item->resource['stok']}}"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
