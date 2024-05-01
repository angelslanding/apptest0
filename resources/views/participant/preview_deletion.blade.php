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
      <h3>Preview Deletion Of Participant</h3>
      <hr>
      <br>
    </div>
    <div class="">
      <form action="{{ url('participant/confirm-deletion/'.$participant->id) }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="preview-deletion-of-participant"><strong>Are you sure you want to delete the participant, "{{ $participant->username }}."</strong></label>
          <br>
          <br>
          <input type="text" class="form-control" name="delete" id="delete_participant" aria-describedby="delete" placeholder="NO">
        </div>
        <br>
        <hr>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
@endsection
