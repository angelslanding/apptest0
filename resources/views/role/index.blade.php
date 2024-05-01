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
      <h3>List Of Blog-Posts <em>(In Totality)</em></h3>
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
              <strong>Name</strong>
          </th>
          <th>
              <strong>Description</strong>
          </th>
          <th>
              <strong>Created-At</strong>
          </th>
        </tr>
        @foreach($blogPosts as $blogPost)
        <tr>
          <td><a href="{{ url('blog-post/show', [$blogPost->id]) }}">{{ $blogPost->id }}</a></td>
          <td><a href="{{ url('blog-post/show', [$blogPost->id]) }}">{{ $blogPost->title }}</a></td>
          <td><a href="{{ url('blog-post/show', [$blogPost->id]) }}">{!! $blogPost->content !!}</a></td>
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
      <div class="">
        <a href="{{ url('/blog-post/create') }}">
          Add/Create Blog-Post
        </a>
      </div>
      <div class="">
        <a href="{{ url('/home/index') }}">
          Back To Home Page
        </a>
      </div>
    </div>
    <br>
    <div style="width:100%; height:1px; background: black;"></div>
    <br>
    <br><br><br>
  </div>
@endsection
