@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($histories as $history)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-header">
                            Purchase {{$history->id}} at {{$history->created_at}}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$history->item_name}}</h5>
                            <p class="card-text">Rp{{$history->price}}</p>
                            <p class="card-text">Quantity {{$history->quantity}}</p>
                            <p class="card-text">Total Rp{{$history->quantity*$history->price}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mx-auto">
            {{$histories->links()}}
        </div>
    </div>
@endsection
