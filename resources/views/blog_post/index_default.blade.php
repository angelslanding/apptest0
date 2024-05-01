@extends("layouts/main")

@section("pageTitle")
  {{$pageTitle}}
@endsection

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
      <h3>List Of Posts</h3>
      <hr>
      <br>
    </div>
      @if(count($blogPosts) > 0)
      <table class="table">
        <tr>
          <th>
            <strong>#</strong>
          </th>
          <th>
              <strong>Content</strong>
          </th>
          <th>
              <strong>Posted-By</strong>
          </th>
          <th>
              <strong>Created-At</strong>
          </th>
        </tr>
        @foreach($blogPosts as $blogPost)
        <tr>
          <td><a href="{{ url('blog-post/show', [$blogPost->id]) }}">{{ $blogPost->id }}</a></td>
          <td><a href="{{ url('blog-post/show', [$blogPost->id]) }}">{!! $blogPost->content !!}</a></td>
          <td><a href="{{ url('blog-post/show', [$blogPost->id]) }}">{{ $blogPost->participant->username }}</a></td>
          <td><a href="{{ url('blog-post/show', [$blogPost->id]) }}">{{ $blogPost->created_at }}</a></td>
        </tr>
        @endforeach
      @else
        <div class="">
          <h3><em>Nothing to see here.</em></h3>
        </div>
      @endif
    </table>
    <div class="">
      <br>
      <div style="width:100%; height:1px; background: black;">
      </div>
      <br>
    </div>
    <div class="">
      @if($participant != NULL)
      <div class="">
        <a href="{{ url('/blog-post/create') }}">
          Add/Create Post
        </a>
      </div>
      <div class="">
        <a href="{{ url('/participant/show/'.$participant->id) }}">
          View Participant (Your) Profile
        </a>
      </div>
      @endif
    </div>
    <br>
    <div style="width:100%; height:1px; background: black;"></div>
    <br>
    <br><br><br>
  </div>
@endsection
