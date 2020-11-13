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






<h1 class="products-title text-center">All Galleries</h1>

<div class="container">
@foreach($galleries as $gallery)
<hr><div class="row admin-gallery">
    <div class="col-md-2 gallery-img" style="background-image: url('/storage/public/gallery/{{$gallery->image}}');"></div>
    <div class="col-md-9 gallery-text">
        <h3 class="gallery-name"><a href="/gallery/{{$gallery->id}}">{{$gallery->title}}</a></h3>
        <p class="gallery-description">{{ $gallery->description }}</p>
    </div>
    <div class="col-md-1 gallery-btn">
    <form action="/delete/gallery/{{$gallery->id}}" method="POST" class="gallery-delete">
        @csrf
        <button type="submit" class="btn btn-danger float-left" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
    </form>
    </div>
</div>
@endforeach
<hr></div>



@endsection
