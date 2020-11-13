@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 50px;margin-bottom: 50px;">

    @if(count($orders)==0)
    <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">No orders!!</h4>
    <p>You still didn't order anything yet!! Browse paintings and order the ones you like!!</p>
    </div>
    @else
    @for ($i = 0; $i < count($orders); $i++)
    @for ($j = 0; $j < count($paintings); $j++)
    @if ($paintings[$j]['id'] == $orders[$i]['painting_id'])

    <div class="card order" style="margin-bottom: 30px">
    <div class="card-header text-center">
    <a href="/painting/{{ $orders[$i]['product_id'] }}">{{ $i + 1 }} - {{ $paintings[$j]['title'] }}</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <img src="/storage/public/painting/{{$paintings[$j]['image']}}" alt="Product" style="width: 100%">
            </div>
            <div class="col-md-9">
                <p class="card-title">
                {{$paintings[$j]['description']}}
                </p>
                <p class="card-text">
                Address : {{ $orders[$i]['address'] }}<br>
                Country : {{ $orders[$i]['country'] }}<br>
                Price : {{ $paintings[$j]['price'] }}$<br>
                </p>
                @if($orders[$i]['is_delivered'])
                <div class="alert alert-success delivered" role="alert">
                Product Delivred
                </div>
                @else
                <div class="alert alert-primary pending" role="alert">
                Product Pending
                </div>
                @endif
            </div>
        </div>
    </div>
    </div>

    @endif
    @endfor
    @endfor

    @endif



</div>
@endsection
