@extends('layouts.different_header')

@section('content')
<div class="container margin-top-50">
    <h2 class="text-center">Latest galleries</h2>
    <div class="row">
        @forelse($latest_galleries as $gallery)
        <div class="col-md-3 painting-card">
            <div class="card" style="width: 18rem; margin: auto;">
                <img src="/storage/gallery/{{ $gallery->image }}" class="card-img-top card-painting-img" alt="{{ $gallery->title }}">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $gallery->title }}</h5>
                    <a href="/gallery/{{$gallery->id}}" class="btn btn-primary">See Gallery</a>
                </div>
            </div>
        </div>
        @empty
        <div class="alert alert-primary text-center" role="alert" style="width:100%;margin-bottom: 50px;">
            No Galleries Found !!
        </div>
        @endforelse
    </div>


    <h2 class="text-center">Most rated galleries</h2>
    <div class="row">
        @forelse($most_rated_galleries as $gallery)
        <div class="col-md-3 painting-card">
            <div class="card" style="width: 18rem; margin: auto;">
                <img src="/storage/gallery/{{ $gallery->image }}" class="card-img-top card-painting-img" alt="{{ $gallery->title }}">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $gallery->title }}</h5>
                    <a href="/gallery/{{$gallery->id}}" class="btn btn-primary">See Gallery</a>
                </div>
            </div>
        </div>
        @empty
        <div class="alert alert-primary text-center" role="alert" style="width:100%;margin-bottom: 50px;">
            No Galleries Found !!
        </div>
        @endforelse
    </div>


    <h2 class="text-center">Most rated paintings</h2>
    <div class="row">
        @forelse($most_rated_paintings as $painting)
        <div class="col-md-3 painting-card">
            <div class="card" style="width: 18rem; margin: auto;">
                <img src="/storage/painting/{{ $painting->image }}" class="card-img-top card-painting-img" alt="{{ $painting->title }}">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $painting->title }}</h5>
                    <a href="/painting/{{$painting->id}}" class="btn btn-primary">See the painting</a>
                </div>
            </div>
        </div>
        @empty
        <div class="alert alert-primary text-center" role="alert" style="width:100%;margin-bottom: 50px;">
            No Paintings Found !!
        </div>
        @endforelse
    </div>


    <h2 class="text-center">Most rated artists</h2>
    <div class="row">
        @forelse($most_rated_artists as $artist)
        <div class="col-md-3 painting-card">
            <div class="card" style="width: 18rem; margin: auto;">
                <img src="/storage/profile/{{ $artist->image }}" class="card-img-top card-painting-img" alt="{{ $artist->name }}">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $artist->name }}</h5>
                    <a href="/profile/{{$artist->id}}" class="btn btn-primary">Go To This Profile</a>
                </div>
            </div>
        </div>
        @empty
        <div class="alert alert-primary text-center" role="alert" style="width:100%;margin-bottom: 50px;">
            No Artists Found !!
        </div>
        @endforelse
    </div>
</div>
@endsection
