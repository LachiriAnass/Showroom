@extends('layouts.app')

@section('content')
<div class="container profile-container" style="margin-top: 120px;">

    <div class="card text-center card-style">
        <div class="card-body">
            <img class="profile-img" src="/storage/public/profile/{{$user->image}}" alt="">
            <div class="profile-content">
                <h1>{{$user->name}}</h1>
            </div>

            <hr>

            @auth
            @if(Auth::user()->id == $user->id)
                            <h2>Modify Profile :</h2>

                            <div class="col-md-8 justify-content-center" style="margin: auto;">
                                @if ($message = Session::get('success'))
                                <div class="form-group">
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ session('success') }}</strong>
                                    </div>
                                </div>
                                @endif
                                @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                <div class="form-group">
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $error }}</strong>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                                <form action="/modify_profile/{{$user->id}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Profile Name</label>
                                        <input type="text" value="{{$user->name}}" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Bio</label>
                                        <textarea type="text" value="{{$user->bio}}" name="bio" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Profile Email</label>
                                        <input type="text" value="{{$user->email}}" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Profile Picture</label>
                                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                                    </div>


                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>

            @endif
            @endauth
        </div>
    </div>
</div>



@endsection
