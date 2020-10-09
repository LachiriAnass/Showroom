@extends('layouts.app')

@section('content')
<div class="container profile-container" style="margin-top: 120px;">

    <div class="card text-center">
        <div class="card-body">
            <img class="profile-img" src="/storage/public/profile/{{$user->image}}" alt="">
            <div class="profile-content">
                <h1>{{$user->name}}</h1>
            </div>
            <div class="card" style="width: 60%; margin: auto;margin-bottom: 30px;">
                <div class="card-body">
                BIO : {{ $user->bio }}
                <a href="/modify_profile/{{ $user->id }}">Click me</a>
                </div>
            </div>

                            @auth
                            @if(Auth::user()->id != $user->id)
                            <div class="row" style="padding-bottom: 20px;">
                                <div class="col-md-3"></div>
                                <div class="col-md-3 text-center">
                                    <a class="btn btn-primary" style="width:100%;" href="#"
                                       onclick="event.preventDefault();
                                                     document.getElementById('profile-upvote-form').submit();">
                                                     <i class="fas fa-angle-double-up"></i> {{ count($upvotes) }}
                                    </a>

                                    <form id="profile-upvote-form" action="/profileupvote/{{ Auth::user()->id }}/{{ $user->id }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                                <div class="col-md-3 text-center">
                                    <a class="btn btn-primary" style="width:100%;" href="#"
                                       onclick="event.preventDefault();
                                                     document.getElementById('profile-downvote-form').submit();">
                                                     <i class="fas fa-angle-double-down"></i> {{ count($downvotes) }}
                                    </a>

                                    <form id="profile-downvote-form" action="/profiledownvote/{{ Auth::user()->id }}/{{ $user->id }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                            @endif
                            @endauth
            <hr>
            <h3 class="text-left margin-left-40">Artist's galleries</h3><br>
            <div class="row">
                @forelse($galleries as $gallery)
                <div class="col-md-4 painting-card">
                    <div class="card" style="width: 18rem; margin: auto;">
                        <img src="/storage/public/gallery/{{ $gallery->image }}" class="card-img-top card-painting-img" alt="{{ $gallery->title }}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $gallery->title }}</h5>
                            <a href="/gallery/{{$gallery->id}}" class="btn btn-primary">See Gallery</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="alert alert-primary text-center" role="alert" style="width:100%;margin-top: 50px;">
                    This artist doesn't have any galleries yet!!
                </div>
                @endforelse
            </div>
        </div>


    </div>
</div>


@endsection
