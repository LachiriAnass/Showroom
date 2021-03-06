@extends('layouts.add_and_modify')

@section('content')
<div class="container margin-top-50">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-style">

                <div class="card-body">

                <div class="title">New Gallery</div>

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
                    <form action="/create_gallery" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlFile1">Gallery Picture</label>
                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
