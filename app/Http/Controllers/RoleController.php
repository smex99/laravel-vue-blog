<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $users = User::all();
        return view('role.index', compact('users'));
    }

    /**
     * Assign specific role to the user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function assign(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->first();
            $user->roles()->detach();
    
            if ($request->role_user) {
                $user->roles()->attach(Role::where('name', 'User')->first());
            }
            if ($request->role_author) {
                $user->roles()->attach(Role::where('name', 'Author')->first());
            }
            if ($request->role_admin) {
                $user->roles()->attach(Role::where('name', 'Admin')->first());
            }

            $message = 'Rôle utilisateur Modifié';
        }
        catch (Exception $e) {
            $message = 'Modification rôle echec';
        }
        return redirect()->back()->with(['message'=> $message]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
