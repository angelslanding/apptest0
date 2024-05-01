<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\ParticipantLogin;
use Illuminate\Http\Request;
use Redirect;
use Hash;

class ParticipantLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $participantLogins = ParticipantLogin::all();

      return view("participant_login_index", ["participantLogins" => $participantLogins]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view("participant_login.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $validated = $request->validate([
        'username' => 'required',
        'password' => 'required',
      ]);

      $participant = Participant::where("username", $request->input("username"))->first();
      if($participant != NULL){
        session(["participant_id" => $participant->id]);
      } else {
        return Redirect::back()->withErrors(['msg' => "Invalid Credentials."]);
      }

      $participantLogin = new ParticipantLogin;
      $participantLogin->participant_id = session("participant_id");
      $participantLogin->logged_in = true;
      $participantLogin->logged_in_at = time();
      $participantLogin->save();

      session()->flash('message', 'The participant was successfully logged-in.');
      return redirect()->route('participant_login_show', ["participantLogin" => $participantLogin]);
    }

    /**
     * Login the participant.
     */
    public function login(Request $request)
    {
      $validated = $request->validate([
        'username' => 'required',
        'password' => 'required',
      ]);

      $participant = Participant::where("username", $request->input("username"))->first();
      if($participant != NULL){

        if(Hash::check($request->input("username"), $participant->password))
        {
          session(["participant_id" => $participant->id]);
        } else {
          return Redirect::back()->withErrors(['msg' => "Invalid Credentials."]);
        }

      } else {
        return Redirect::back()->withErrors(['msg' => "Invalid Credentials."]);
      }

      $participantLogin = new ParticipantLogin;
      $participantLogin->participant_id = session("participant_id");
      $participantLogin->logged_in = true;
      $participantLogin->logged_in_at = time();
      $participantLogin->save();

      session(["participant_login_id" => $participantLogin->id]);

      session()->flash('message', 'The participant was successfully logged-in.');
      return redirect()->route('participant_login_show', ["participantLogin" => $participantLogin]);
    }

    public function logout(Participant $participant)
    {
      $participant = Participant::where("id", session("participant_id"))->first();
      if($participant != NULL){
        $participantLogin = ParticipantLogin::where("id", session("participant_id"))->first();
        if($participantLogin != NULL){
          $participantLogin->logged_in = false;
          $participantLogin->logged_out_at = time();
          $participantLogin->save();
        }
        session(["participant_id" => NULL]);
        session(["participant_login_id" => NULL]);
        session()->flash('message', 'The participant has successfully logged-out.');
        return redirect()->route('blog_post_index');
       } else {
         return Redirect::back()->withErrors(['msg' => "Invalid Credentials."]);
       }
    }

    public static function checkIfParticipantIsLoggedIn()
    {
        if(session("participant_id") == NULL){
          return false;
        } else {
          return true;
        }
    }

    public static function flushLoginSession()
    {
      session(["participant_id" => NULL]);
      session(["participant_login_id" => NULL]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ParticipantLogin $participantLogin)
    {
      return view('participant_login.show', ["participantLogin" => $participantLogin]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ParticipantLogin $participantLogin)
    {
      return view("participant_login.edit", ["participantLogin" => $participantLogin]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ParticipantLogin $participantLogin)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ParticipantLogin $participantLogin)
    {
        //
    }
}
