<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Gallery;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        $galleries = Gallery::where('user_id', $id)->get();
        return view('profile', ['user' => $user, 'galleries' => $galleries]);
    }

    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'image' => 'image',
        ]);


        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = preg_replace('/\s+/', '', $filename);
            $fileNameToStore = $filename .'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/gallery', $fileNameToStore);
            $user->image = $fileNameToStore;
        }

        $user->name = request('name');
        $user->email = request('email');
        $user->save();

        return back()
            ->with("success","You have successfully modified your profile's infos.");
    }
}
