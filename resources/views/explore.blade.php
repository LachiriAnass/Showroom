@extends('layouts.explore_and_search')

@section('content')

<div class="container margin-top-50 ">
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
                <div class="col-md-3 image-container">
                    <article>
                        <a href="/gallery/{{$gallery->id}}"> 
                        <img src="/storage/public/gallery/{{ $gallery->image }}" class="card-img-top card-painting-img" alt="{{ $gallery->title }}">
                        </a> 
                    </article>
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
                <div class="col-md-3 image-container">
                    <article>
                    <a href="/gallery/{{$gallery->id}}">
                        <img src="/storage/public/gallery/{{ $gallery->image }}" class="card-img-top card-painting-img" alt="{{ $gallery->title }}">
                    </a>    
                    </article>
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
                <div class="col-md-3 image-container" style="border-image: url('imgs/border.jpeg') 30 round;">
                    <article>
                        <a href="/painting/{{$painting->id}}">
                        <img src="/storage/public/painting/{{ $painting->image }}" class="card-img-top card-painting-img" alt="{{ $painting->title }}">
                        </a>
                    </article>
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
                <div class="col-md-3">
                <!--     <article>
                        <a href="/profile/{{$artist->id}}">
                        <img src="/storage/public/profile/{{ $artist->image }}" class="card-img-top card-painting-img" alt="{{ $artist->name }}">
                        </a>
                    </article> -->
                    <div class="card" style="width: 18rem; margin: auto;">
                            <img class="card-img-top" src="/storage/public/profile/{{ $artist->image }}" alt="{{ $artist->name }}" style="width:100%">
                            <div class="card-body">
                                <h5 class="card-title">{{ $artist->name }}</h5>
                                <a href="/profile/{{$artist->id}}" class="btn btn-primary stretched-link">See Profile</a>
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
