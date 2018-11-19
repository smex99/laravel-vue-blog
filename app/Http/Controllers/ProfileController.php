<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Profile;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::paginate(8);
        return view('profile.index', compact('profiles'));
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
        $this->validate($request, [
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required|max:15',
            'country' => 'required|max:10',
            'postal_code' => 'required',
            'image' => 'required|image',
        ]);

        try {
            $filename = time() . '.' . $request->image->extension();
            $path = $request->image->storeAs('public', $filename);
    
            $profile = Auth::user()->profile()->create([
                'user_id' => Auth::user()->id,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'country' => $request->country,
                'postal_code' => $request->postal_code,
                'image' => $filename,
            ]);

            $message = 'Profile enregistré.';
        }
        catch(Exception $e) {
            $message = 'Echec lors de la sauvegarde de votre profile.';
        }
        return redirect('/home')->with(['message' => $message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = profile::find($id);

        $this->authorize('view', $profile);

        if ($profile == null) {
            return view('profile.create');
        } else {
            return view('profile.show', compact('profile'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::findorFail($id);

        $this->authorize('update', $profile);

        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'postal_code' => 'required',
            'image' => 'required|image',
        ]);

        try {
            $filename = time() . '.' . $request->image->extension();
            $path = $request->image->storeAs('public', $filename);

            $profile = Profile::findOrFail($id);

            $profile->user_id = Auth::user()->id;
            $profile->phone = $request->phone;
            $profile->address = $request->address;
            $profile->city = $request->city;
            $profile->country = $request->country;
            $profile->postal_code = $request->postal_code;

            /* Storage::deleteDirectory($profile->image); */
            $profile->image = $filename;

            $profile->update();
            $message = 'Profile modifié avec sucée.';
        }
        catch(Exception $e) {
            $message = 'Echec de la mise à jour de votre profile';
        }
        return redirect('/home')->with(['message' => $message]);
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
