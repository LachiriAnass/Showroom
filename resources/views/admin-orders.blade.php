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


<h1 class="products-title text-center">All Orders</h1>


<div class="container">
<div class="row admin-order">
    <div class="col-md-1"><strong>Id</strong></div>
    <div class="col-md-4"><strong>Painting</strong></div>
    <div class="col-md-2"><strong>User</strong></div>
    <div class="col-md-2"><strong>Artist</strong></div>
    <div class="col-md-2"><strong>State</strong></div>
    <div class="col-md-1"><strong></strong></div>
</div>
</div>


<div class="container">
@foreach($infos as $info)


<hr>
<div class="row admin-order">
    <div class="col-md-1">{{ $info['id'] }}</div>
    <div class="col-md-4"><a href="/painting/{{ $info['product_id'] }}">{{$info['product_name']}}</a></div>
    <div class="col-md-2"><a href="/profile/{{ $info['user_id'] }}">{{$info['user_name']}}</a></div>
    <div class="col-md-2"><a href="/profile/{{ $info['artist_id'] }}">{{$info['artist_name']}}</a></div>
    <div class="col-md-2">
        @if ($info['is_delivered'])
        Delivred
        @else
        Pending
        @endif
    </div>
    <div class="col-md-1"><a href="/admin/order/{{$info['id']}}" class="porduct-modify"><i class="fa fa-cog"></i></a></div>
</div>



@endforeach
<hr></div>

@endsection
