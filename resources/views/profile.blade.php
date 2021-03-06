@extends('layouts.app')

@section('content')
<div class="container profile-container" style="margin-top: 120px; margin-bottom: 200px;">

    <div class="card text-center card-style">
        <div class="card-body">
            <img class="profile-img" src="/storage/public/profile/{{$user->image}}" alt="">
            <div class="profile-content">
                <h1>{{$user->name}}</h1>
            </div>
            <div class="card" style="width: 60%; margin: auto;margin-bottom: 30px;">
                <div class="card-body">
                <span class="bio-section">{{ $user->bio }}</span>
                @auth
                @if(Auth::user()->id == $user->id)
                    <a href="/modify_profile/{{ $user->id }}" style="font-size: 16px;">Modify</a>
                @endif
                @endauth
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
            <div class="row no-gutters">
                @forelse($galleries as $gallery)
                <div class="col-md-3 image-container">
                    <article>
                        <a href="/gallery/{{$gallery->id}}"> 
                        <img src="/storage/public/gallery/{{ $gallery->image }}" class="card-img-top card-painting-img" alt="{{ $gallery->title }}">
                        </a> 
                    </article>
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
