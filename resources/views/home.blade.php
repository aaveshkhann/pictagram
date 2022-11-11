@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5 ml-4">

           <img src="/profile_image/{{!empty($users->profile->profile_image) ? $users->profile->profile_image : 'dummy.webp'}}" width="160px" class="rounded-circle" alt="">
        </div>
        <div class="col-9 pt-5 ">
            <div class="d-flex justify-content-between pb-4 " ><h3>{{$users->name}}</h3>

            <div>
                <button class="btn btn-primary" onclick="btn()" style="margin-right: 500px" >Follow</button>

            </div>
            <script>
                    function btn(){
                        alert("success")
                    }
            </script>
               <a href="post/create"> <button class="btn btn-primary">Add New Post</button></a>
            </div>
            <div>
                <a href="/profile/edit"> <button style="background: white; border: 1px black solid" class="btn">Edit Profile</button> </a>
            </div>
          <div class="d-flex">
            <div class="p-2 "><strong>{{$users->posts->count()}}</strong>Posts</div>
            <div class="p-2"><strong>2245</strong>Followers</div>
            <div class="p-2 pl-3"><strong>70</strong>Following</div>
          </div>
          <div class="font-weight-bold" >{{auth()->user()->name}}</div>
          <p>◾{{ isset($users->profile->description) ? $users->profile->description : "Please add a description"}}</p>
         <div><a href="#">{{isset($users->profile->url) ? $users->profile->url : "www.example.com"  }}</a></div>

        </div>
    </div>
    <div class="row mt-4 ">
    @foreach ( $users->posts as $post)

        <div class="col-4" style="padding:10px">
             <a href="show/{{$post->id}}">
            <div style="height: 300px; background: url('/storage/{{$post->image}}'); background-repeat: no; background-position:center center"></div>

                            {{-- <img src="/storage/{{$post->image}}"  class="w-100"> --}}
             </a>
        </div>
     @endforeach
    </div>
</div>
@endsection


