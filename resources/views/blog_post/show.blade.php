@extends("layouts/main")

@include("partials/main_navbar")

@section("pageContent")
  <div class="container">
    @if(session()->has('message'))
        <div class="alert alert-success" style="margin-bottom: -50px;">
            {{ session('message') }}
        </div>
    @endif
    <div class="">
      <br><br><br>
      <h2>Post Information</h2>
      <br>
      <div style="width:100%; height:1px; background: black;"></div>
      <br>
    </div>
    <div class="col-md-12">
      <div class="row">
        <h5 class="col-md-12">
          Posted-By:
        </h5>
        <br>
        <div class="col-md-6">
          <a href="{{ url('/participant/show/'.$blogPost->participant->id) }}">
            {!! $blogPost->participant->username !!}
          </a>
        </div>
      </div>
    </div>
    <br>
    <div class="col-md-12">
      <div class="row">
        <h5 class="col-md-12">
          Content:
        </h5>
        <br>
        <div class="col-md-6">
          {!! $blogPost->content !!}
        </div>
      </div>
    </div>
    <br>
    <div style="width:100%; height:1px; background: black;"></div>
    <br>
    <div class="">
      <div class="">
        <a href="{{ url('/blog-post/edit/'.$blogPost->id) }}">
           Edit/Update Post Information
        </a>
      </div>
      <div class="">
        <a href="{{ url('/blog-post/destroy/'.$blogPost->id) }}">
           Delete Post
        </a>
      </div>
      <div class="">
        <a href="{{ url('/participant-login/participant/'.session('participant_login_id').'/index') }}">
           Back To Login Session Information
        </a>
      </div>
      <div class="">
        <a href="{{ url('/blog-post/participant/'.$blogPost->participant->id.'/index') }}">
           Back To The List Of Posts For This Participant Only
        </a>
      </div>
      <div class="">
        <a href="{{ url('/blog-post/index') }}">
           Back To The List Of Posts That Include Everyone
        </a>
      </div>
      <div class="">
        <a href="{{ url('/blog-post/create') }}">
          Add/Create Post
        </a>
      </div>
      <div class="">
        <a href="{{ url('/blog-post/index') }}">
          Back To Home Page
        </a>
      </div>
      <br>
      <div style="width:100%; height:1px; background: black;"></div>
      <br>
    </div>
  </div>
@endsection
