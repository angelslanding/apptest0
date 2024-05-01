<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();

        return view("role.index", [$roles => "roles"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("role.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $validated = $request->validate([
        'name' => 'required',
        'description' => 'required',
      ]);

      $role = new Role;
      $role->name = $request->input("name");
      $role->description = $request->input("description");
      $role->save();

      session()->flash('message', 'The role was SUCCESSFULLY created.');
      return redirect()->route('role.show', ["role" => $role]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
      return view("role.show", ["role" => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
      return view("role.edit", [$role => "role"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
      $validated = $request->validate([
        'name' => 'required',
        'description' => 'required',
      ]);

      $role->name = $request->input("name");
      $role->description = $request->input("description");
      $role->save();

      session()->flash('message', 'The role was SUCCESSFULLY updated.');
      return redirect()->route('role.show', ["role" => $role]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
      if($role->delete()){
        session()->flash('message', 'The role was SUCCESSFULLY deleted.');
        return redirect()->route('role.index');
        die();
      } else {
        session()->flash('message', 'There was an issue deleting the role.');
        return redirect()->route('role.show', ["role" => $role]);
        die();
      }
    }
}
