<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\ParticipantLogin;
use App\Models\ParticipantRole;
use App\Models\Role;
use Illuminate\Http\Request;
use Hash;
use Mail;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $participants = Participant::all();

        $pageTitle = "Participants";

        return view("participant.index", ["participants" => $participants, "pageTitle" => $pageTitle]);
        die();
    }

    public function indexDefault()
    {
        $participants = Participant::all();

        $pageTitle = "Participants";

        return view("participant.index", ["participants" => $participants, "pageTitle" => $pageTitle]);
        die();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("participant.create");
        die();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
          'username' => 'required|unique:participants',
          'email_address' => 'required|email|unique:participants',
          'password' => 'required'
        ]);

        $participant = new Participant;
        $participant->username = $request->input("username");
        $participant->email_address = $request->input("email_address");
        $participant->password = Hash::make($request->input("password"));
        $participant->save();

        $role = Role::where("name", "User")->first();
        if($role == NULL){
          $role = new Role;
          $role->name = "User";
          $role->description = "User role.";
          $role->save();
        }

        $participantRole = new ParticipantRole;
        $participantRole->participant_id = $participant->id;
        $participantRole->role_id = $role->id;
        $participantRole->save();

        $this->participantSendParticipantCreatedEmail($participant);

        session()->flash('message', 'The participant was successfully created. You may now login.');
        return redirect()->route('participant_show', ["participant" => $participant]);
        die();
    }

    /**
     * Display the specified resource.
     */
    public function show(Participant $participant)
    {
        return view("participant.show", ["participant" => $participant]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Participant $participant)
    {
        return view("participant.edit", ["participant" => $participant]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Participant $participant)
    {
        $participant->username = $request->input("username");
        $participant->email_address = $request->input("email_address");
        $participant->password = $request->input("password");
        $participant->save();

        session()->flash('message', 'The participant was successfully created.');
        return redirect()->route('participant.show', ["participant" => $participant]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Participant $participant)
    {
        if((session("participant_id") == $participant->id) && ($participant->delete())){
          session()->flash('message', 'The participant was SUCCESSFULLY deleted.');
          session(["participant_id" => NULL]);
          session(["participant_login_id" => NULL]);
          return redirect()->route('participant_index');
          die();
        } else {
          session()->flash('message', 'There was an issue deleting the participant.');
          return redirect()->route('participant_show', ["participant" => $participant]);
          die();
        }
    }

    public function participantSendParticipantCreatedEmail(Participant $participant)
    {
        Mail::to('beruldsenj@gmail.com')->send(new \App\Mail\ParticipantCreated($participant));
    }
}
