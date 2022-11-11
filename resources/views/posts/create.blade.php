@extends('layouts.app')
@section('content')
   <div class="container">
    <div class="row">
        <div class="col-8">
                <form action="{{route('post.store')}}" enctype="multipart/form-data"  method="POST" >
@csrf
                        <div class="row">
                            <h1>Add New Post</h1>
                        </div>

                    <div class="row mb-3">
                        <label for="caption" class="col-md-4 col-form-label ">Post Caption</label>
                         <input id="caption" type="text" name="caption" class="form-control @error('caption') is-invalid @enderror"
                         caption="caption" value="{{ old('caption') }}"  autocomplete="caption" autofocus>

                                @error('caption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="row">
                            <label for="post" class="col-md-4 col-form-label ">Post Image</label>
                            <input type="file" class="form-control-file" name="image"  >
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="row pt-4 ">
                            <input type="submit" class="btn btn-success " value="Add New Post">
                        </div>

                    </div>
                    </div>
                     <a href="/profile">Go Back</a>
                </form>

        </div>
    </div>
   </div>




@endsection
