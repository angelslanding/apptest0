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
      <h2>You Are Now Logged In</h2>
      <br>
      <div style="width:100%; height:1px; background: black;"></div>
      <br>
    </div>
    <div class="col-md-12">
      <div class="row">
        <h5 class="col-md-6">
          Username:
        </h5>
        <div class="col-md-6">
          {{ $participantLogin->participant->username }}
        </div>
      </div>
      <hr>
      <div class="row">
        <h5 class="col-md-6">
          Email-Address:
        </h5>
        <div class="col-md-6">
          {{ $participantLogin->participant->email_address }}
        </div>
      </div>
      <hr>
      <div class="row">
        <h5 class="col-md-6">
          Logged-In At:
        </h5>
        <div class="col-md-6">
          {{ date('Y-m-d H:i:s', $participantLogin->logged_in_at) }}
        </div>
      </div>
      <hr>
      <div class="row">
        <h5 class="col-md-12">
          Posts:
        </h5>
        <tr>
          @if(count($participantLogin->participant->blogPosts()->get()) > 0)
            @foreach($participantLogin->participant->blogPosts()->get() as $blogPost)
              <td>
                <div class="" style="border:1px solid black; margin-left:10px; padding:20px; margin-bottom:15px;">
                  <a href="{{ url('blog-post/show', [$blogPost->id]) }}">{!! $blogPost->content !!}</a>
                </div>
              </td>
            @endforeach
            @else
              <h5><em>There Are Not Any Posts To Show</em></h5>
            @endif
        </tr>
      </div>
    </div>
    <br>
    <div style="width:100%; height:1px; background: black;"></div>
    <br>
    <div class="">
      <div class="">
        <a href="{{ url('/participant/show/'.$participantLogin->participant->id) }}">
           Continue To Participant Profile
        </a>
      </div>
      <div class="">
        <a href="{{ url('/blog-post/create') }}">
           Create Post
        </a>
      </div>
      <div class="">
        <a href="{{ url('/participant/edit/'.$participantLogin->participant->id) }}">
           Edit/Update Participant Information
        </a>
      </div>
      <div class="">
        <a href="{{ url('/participant/preview-deletion/'.$participantLogin->participant->id) }}">
           Delete Participant
        </a>
      </div>
      <div class="">
        <a href="{{ url('/participant/index') }}">
           Back To The List Of Participants
        </a>
      </div>
      <div class="">
        <a href="{{ url('/participant/create') }}">
          Add/Create Participant
        </a>
      </div>
      <div class="">
        <a href="{{ url('/blog-post/index') }}">
          Back To Post Home Page
        </a>
      </div>
      <br>
      <div style="width:100%; height:1px; background: black;"></div>
      <br>
    </div>
  </div>
@endsection
