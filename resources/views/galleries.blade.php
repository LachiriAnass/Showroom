@extends('layouts.app')

@section('content')
<div class="container margin-top-50">
    <h1 class="text-center">My Galleries</h1><br><br>
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
            You don't have any galleries yet!! Click the "New Gallery" to add a new one.
        </div>
        @endforelse
    </div>
</div>
@endsection
