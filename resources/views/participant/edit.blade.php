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
      <h2>Edit Participant</h2>
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
      <form action="{{ url('participant/update/'.$participant->id) }}" method="POST">
        @csrf
        <br>
        <div STYLE="background-color:#000000; height:1px; width:100%;"></div>
        <br>
        <h3>Participant-Account Information</h3>
        <hr>
        <br>
        <div class="form-group">
          <label for="first_name"><h5>Username</h5></label>
          <input type="text" class="form-control" name="username" id="participant_username" aria-describedby="username" value="{{ $participant->username }}">
        </div>
        <br>
        <div class="form-group">
          <label for="email_address"><h5>Email-Address</h5></label>
          <input type="text" class="form-control" name="email_address" id="participant_email_address" aria-describedby="email_address" value="{{ $participant->email_address }}">
        </div>
        <br>
        <div class="">
          <a class="btn btn-primary" href="{{ url('/participant/view-change-password/'.$participant->id) }}">
             Change Password
          </a>
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
