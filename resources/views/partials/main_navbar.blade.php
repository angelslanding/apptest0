<nav class="navbar" style="background:black;color:white;">
  <span class="navbar-brand mb-0 h1 text-color-white" style="padding-left:2em;font-family:Helvetica;font-weight:600;font-size:1.5em;color:white;"><em>PostIt!</em></span>

  <form class="form-inline my-2 my-lg-0">
    <div style="text-color:white;padding-right:2rem;">
      @if(!(\App\Http\Controllers\ParticipantLoginController::checkIfParticipantIsLoggedIn()))
      <a href="{{ url('/participant-login/create') }}" style="color:#FFFFFF;font-weight:bold;" class="btn text-color-white font-family-helvetica font-weight-600">Login</a>
      <span class="text-color-white font-family-helvetica font-weight-600">|</span>
      <a href="{{ url('/participant/create') }}" style="color:#FFFFFF;font-weight:bold;" class="btn text-color-white font-family-helvetica font-weight-600">Sign-Up</a>
      @else
      <a href="{{ url('/participant-login/logout/'.session('participant_id').'/'.session('participant_account_id').'/'.session('participant_login_id')) }}" style="color:#FFFFFF;font-weight:bold;" class="btn text-color-white font-family-helvetica font-weight-600">Logout</a>
      @endif

      <!-- <%= link_to 'Create Account', participant_new_path, { :style=>'color:#FFFFFF;font-weight:bold;', :class => 'btn text-color-white font-family-helvetica font-weight-600' } %>
      <% else %>
      <%= link_to 'Logout', participant_login_delete_path(participant_login_id: session["participant_login_id"]), :class => 'btn text-color-white font-family-helvetica font-weight-600' %>
      <% end %> -->
    </div>

  </form>

</nav>
