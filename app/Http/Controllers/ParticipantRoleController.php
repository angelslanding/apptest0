<?php

namespace App\Http\Controllers;

use App\Models\ParticipantRole;
use Illuminate\Http\Request;

class ParticipantRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $participantRoles = ParticipantRole::all();
        return view("participant_role.index", ["participantRoles" => $participantRoles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ParticipantRole $participantRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ParticipantRole $participantRole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ParticipantRole $participantRole)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ParticipantRole $participantRole)
    {
        //
    }
}
