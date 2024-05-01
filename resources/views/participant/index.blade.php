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
      <h3>List Of Participants</h3>
      <hr>
      <br>
    </div>
      @if(count($participants) > 0)
      <table class="table">
        <tr>
          <th>
            <strong>#</strong>
          </th>
          <th>
              <strong>Username</strong>
          </th>
          <th>
              <strong>Email-Address</strong>
          </th>
          <th>
              <strong>Created-At</strong>
          </th>
          <th>
              <strong>Updated-At</strong>
          </th>
        </tr>
        @foreach($participants as $participant)
        <tr>
          <td><a href="{{ url('participant/show', [$participant->id]) }}">{{ $participant->id }}</a></td>
          <td><a href="{{ url('participant/show', [$participant->id]) }}">{{ $participant->username }}</a></td>
          <td><a href="{{ url('participant/show', [$participant->id]) }}">{{ $participant->email_address }}</a></td>
          <td><a href="{{ url('participant/show', [$participant->id]) }}">{{ $participant->created_at }}</a></td>
          <td><a href="{{ url('participant/show', [$participant->id]) }}">{{ $participant->updated_at }}</a></td>
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
        <a href="{{ url('/participant/create') }}">
          Add/Create Participant (Sign-Up)
        </a>
      </div>
      <div class="">
        <a href="{{ url('/blog-post/index') }}">
          Back To Post Home Page
        </a>
      </div>
    </div>
    <br>
    <div style="width:100%; height:1px; background: black;"></div>
    <br>
    <br><br><br>
  </div>
@endsection
