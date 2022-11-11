@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
   <div class="col-8">
    <img  src="/storage/{{$post->image}} "  class="w-100">
   </div>
   <div class="col-4">
      <img src="{{$post->user->profile->profile_image}}" alt="">
    <div>
       <span> {{$post->caption}} </span>
    </div>
   </div>
  </div>
</div>
@endsection


