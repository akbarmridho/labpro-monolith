@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($items as $item)
                <div class="col">
                    <div class="card h-100">
                        <img src="https://placehold.co/600x400" class="card-img-top" alt="item image">
                        <div class="card-body">
                            <h5 class="card-title">{{$item->resource['nama']}}</h5>
                            <p class="card-text">Rp{{$item->resource['harga']}}</p>
                            <a class="card-link" href="{{route('item', ['id' => $item->resource['id']])}}">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mx-auto">
            {{$items->links()}}
        </div>
    </div>
@endsection
