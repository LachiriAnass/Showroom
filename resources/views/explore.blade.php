@extends('layouts.explore_and_search')

@section('content')

<div class="container margin-top-50 margin-bottom-40">
    <h2 class="text-center">Explore</h2><br><br>
    <ul class="nav nav-pills nav-fill" style="width: 100%;" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link search-nav-link active" id="latest-galleries-tab" href="#latest-galleries" data-toggle="tab" role="tab" aria-controls="latest-galleries" aria-selected="true">Latest Galleries</a>
        </li>
        <li class="nav-item">
            <a class="nav-link search-nav-link" id="rated-galleries-tab" href="#rated-galleries" data-toggle="tab" role="tab" aria-controls="rated-galleries" aria-selected="false">Most Rated Galleries</a>
        </li>
        <li class="nav-item">
            <a class="nav-link search-nav-link" id="rated-paintings-tab" href="#rated-paintings" data-toggle="tab" role="tab" aria-controls="rated-paintings" aria-selected="false">Most Rated Paintings</a>
        </li>
        <li class="nav-item">
            <a class="nav-link search-nav-link" id="rated-artists-tab" href="#rated-artists" data-toggle="tab" role="tab" aria-controls="rated-artists" aria-selected="false">Most Rated Artists</a>
        </li>
    </ul>
    <br>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="latest-galleries" role="tabpanel" aria-labelledby="latest-galleries-tab">
            <div class="row no-gutters">
                @forelse($latest_galleries as $gallery)
                <div class="col-md-3 painting-card">
                    <div class="card" style=" margin: auto;">
                        <img src="/storage/public/gallery/{{ $gallery->image }}" class="card-img-top card-painting-img" alt="{{ $gallery->title }}">
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
        </div>

        <div class="tab-pane fade" id="rated-galleries" role="tabpanel" aria-labelledby="rated-galleries-tab">
            <div class="row no-gutters">
                @forelse($most_rated_galleries as $gallery)
                <div class="col-md-3 painting-card">
                    <div class="card" style="margin: auto;">
                        <img src="/storage/public/gallery/{{ $gallery->image }}" class="card-img-top card-painting-img" alt="{{ $gallery->title }}">
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
        </div>

        <div class="tab-pane fade" id="rated-paintings" role="tabpanel" aria-labelledby="rated-paintings-tab">
            <div class="row no-gutters">
                @forelse($most_rated_paintings as $painting)
                <div class="col-md-3 painting-card">
                    <div class="card" style="margin: auto;;">
                        <img src="/storage/public/painting/{{ $painting->image }}" class="card-img-top card-painting-img" alt="{{ $painting->title }}">
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
        </div>

        <div class="tab-pane fade" id="rated-artists" role="tabpanel" aria-labelledby="rated-artists-tab">
            <div class="row no-gutters">
                @forelse($most_rated_artists as $artist)
                <div class="col-md-3 painting-card">
                    <div class="card" style="margin: auto;">
                        <img src="/storage/public/profile/{{ $artist->image }}" class="card-img-top card-painting-img" alt="{{ $artist->name }}">
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
    </div>
</div>
@endsection
