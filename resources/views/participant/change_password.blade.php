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
      <h2>Change Password</h2>
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
        <br>
      @endif
    </div>
    <div class="">
      <form action="{{ url('participant/action-change-password/'.$participant->id) }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="current_password"><h5>Current Password</h5></label>
          <input type="password" class="form-control" name="current_password" id="participant_current_password" aria-describedby="current_password" placeholder="Current Password">
        </div>
        <br>
        <div class="form-group">
          <label for="new_password"><h5>New Password</h5></label>
          <input type="password" class="form-control" name="new_password" id="participant_new_password" aria-describedby="new_password" placeholder="New Password">
        </div>
        <br>
        <div class="form-group">
          <label for="confirm_new_password"><h5>Confirm New Password</h5></label>
          <input type="password" class="form-control" name="confirm_new_password" id="participant_confirm_new_password" aria-describedby="confirm_new_password" placeholder="Confirm New Password">
        </div>
        <br>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    <br>
    <div style="background-color:#000000; height:1px; width:100%;"></div>
    <br>
    <div class="">
      <div class="">
        <a href="{{ url('/participant/create') }}">
          Add/Create Participant
        </a>
      </div>
      <div class="">
        <a href="{{ url('/participant/index') }}">
          Back To The List Of Participants
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
