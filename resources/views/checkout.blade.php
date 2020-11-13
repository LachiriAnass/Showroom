@extends('layouts.explore_and_search')

@section('content')
<div class="container" style="margin-top: 100px">
    @if(!$painting->for_sale)
    <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Not for sale!!</h4>
    <p>You want to order a pinting not for sale!! Browse other paintings and order items the ones that you like!!</p>
    </div>
    @endif

    <div class="row justify-content-center product">
        <div class="col-md-3 image">
            <img src="/storage/public/painting/{{ $painting->image }}" alt="Painting" style="width: 100%">
        </div>
        <div class="col-md-9">
            <h3 class="product-title">{{ $painting->title }}</h3>
            <p class="product-description">{{ $painting->description }}</p><br>

            Total price : {{ ($painting->price) }}$<br>

        </div>
    </div>

    <div class="container" style="margin-top: 50px">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <form action="/order" method="POST" class="checkout-form">
            @csrf
                <div class="form-group">
                    <label for="address">Your Address</label>
                    <input type="text" class="form-control" name="address" id="address" aria-describedby="emailHelp" placeholder="Address" required>
                </div>
                <div class="form-group">
                    <label for="country">Your Country</label>
                    <input type="text" class="form-control" name="country" id="country" placeholder="Country" required>
                </div>
                <input type="text" name="user_id" value="{{ Auth::id() }}" style="display:none;">
                <input type="text" name="painting_id" value="{{ $painting->id }}" style="display:none;">
                <button type="submit" class="btn btn-primary">Complete Order</button>
            </form>
            </div>
        </div>
    </div>


</div>
@endsection
