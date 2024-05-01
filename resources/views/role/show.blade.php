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
      <h2>Role Information</h2>
      <br>
      <div style="width:100%; height:1px; background: black;"></div>
      <br>
    </div>
    <div class="col-md-12">
      <div class="row">
        <h5 class="col-md-6">
          Name:
        </h5>
        <div class="col-md-6">
          {{ $role->name }}
        </div>
      </div>
      <hr>
      <div class="row">
        <h5 class="col-md-12">
          Description:
        </h5>
        <br>
        <div class="col-md-6">
          {!! $role->description !!}
        </div>
      </div>
    </div>
    <br>
    <div style="width:100%; height:1px; background: black;"></div>
    <br>
    <div class="">
      <div class="">
        <a href="{{ url('/role/edit/'.$role->id) }}">
           Edit/Update Role Information
        </a>
      </div>
      <div class="">
        <a href="{{ url('/role/index') }}">
           Back To The List Of Roles
        </a>
      </div>
      <div class="">
        <a href="{{ url('/role/create') }}">
          Add/Create Role
        </a>
      </div>
      <div class="">
        <a href="{{ url('/home/index') }}">
          Back To Home Page
        </a>
      </div>
      <br>
      <div style="width:100%; height:1px; background: black;"></div>
      <br>
    </div>
  </div>
@endsection
