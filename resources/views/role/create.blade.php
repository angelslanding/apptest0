@extends("layouts/main")

@section("ckeditorTextboxSize")
<style>
.ck-editor__editable {
    min-height: 400px;
}
</style>
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
      <h2>Create Role</h2>
      <hr>
      <br>
    </div>
    <div class="">
      @if($errors->any())
        <div style="background:orange;" class="w-6/8 m-auto text-left">
          <br>
          <ul style="margin:1rem;">
            @foreach($errors->all() as $error)
              <li style="" class="text-red-500 list-none">
                {{ $error }}
              </li>
            @endforeach
          </ul>
          <br>
        </div>
      @endif
    </div>
    <div class="">
      <form action="{{ url('role/store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name"><h5>Name</h5></label>
          <input type="text" class="form-control" name="name" id="role_name" aria-describedby="title" placeholder="Title">
        </div>
        <br>
        <div class="form-group">
          <label for="content"><h5>Content</h5></label>
          <textarea style="height:400px;" class="form-control" name="content" id="blog_post_content" rows="30" placeholder="Content"></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    <br>
    <div style="background-color:#000000; height:1px; width:100%;"></div>
    <br>
    <br>
    <div class="">
      <div class="">
        <a href="{{ url('/blog-post/index') }}">
          Back To The List Of Blog-Posts
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
  <script>
    ClassicEditor
        .create( document.querySelector( '#blog_post_content' ) )
        .catch( error => {
            console.error( error );
        } );
  </script>
@endsection
