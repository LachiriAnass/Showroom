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

<br><br>
<div class="container">
<div class="row">
    <div class="col-md-10" style="margin: auto;">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Orders by state</h3>
            </div>
            <div class="card-body">
                @foreach($orders_by_state as $order_by_state)
                <h5> {{ $order_by_state['state'] }}</h5>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{ $order_by_state['progress'] }}%;" aria-valuenow="{{ $order_by_state['progress'] }}" aria-valuemin="0" aria-valuemax="100">{{ $order_by_state['progress'] }}%</div>
                </div><br>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>

@endsection
