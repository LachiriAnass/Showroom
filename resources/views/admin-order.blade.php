@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 100px">
    <div class="row">
    <div class="col-md-3">
      <a class="card-counter primary" style="display: block;" href="/admin/galleries" >
        <i class="fa fa-code-branch"></i>
        <span class="count-numbers">{{ count($galleries) }}</span>
        <span class="count-name">Galleries</span>
        </a>
    </div>

    <div class="col-md-3">
      <a class="card-counter danger"  style="display: block" href="/admin/paintings">
        <i class="fa fa-palette"></i>
        <span class="count-numbers">{{ count($paintings) }}</span>
        <span class="count-name">Paintings</span>
    </a>
    </div>

    <div class="col-md-3">
      <a class="card-counter success" style="display: block" href="/admin/orders">
        <i class="fa fa-database"></i>
        <span class="count-numbers">{{ count($orders) }}</span>
        <span class="count-name">Orders</span>
    </a>
    </div>

    <div class="col-md-3">
      <a class="card-counter info" style="display: block" href="/admin/users">
        <i class="fa fa-users"></i>
        <span class="count-numbers">{{ count($users) }}</span>
        <span class="count-name">Users</span>
    </a>
    </div>
  </div>
</div>

<div class="container" style="margin-top: 20px">

    <div class="card order">
    <div class="card-header text-center">
    <a href="/painting/{{ $painting->id }}">{{ $painting->title }}</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <img src="/storage/public/painting/{{ $painting->image }}" alt="Product" style="width: 100%;">
                @if(!$order->is_delivered)
                <form action="/delete/order/{{$order->id}}" method="POST" class="porduct-delete order-deliver-form">
                    @csrf
                    <button type="submit" class="btn btn-danger float-left" onclick="return confirm('Are you sure?')">Mark as Delivered</button>
                </form>
                @endif
            </div>
            <div class="col-md-9">
                <p class="card-title">
                {{ $painting->description }}
                </p>
                <p class="card-text">
                Address : {{ $order->address }}<br>
                Country : {{ $order->country }}<br>
                Price : {{ ($painting->price) }}$<br>
                User (Buyer) : {{ $user->name }}<br>
                User's Email : {{ $user->email }}<br>
                Artist : {{ $painting->gallery->user->name }}<br>
                Artist's Email : {{ $painting->gallery->user->email }}<br>
                </p>
                @if($order->is_delivered)
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
</div>

@endsection
