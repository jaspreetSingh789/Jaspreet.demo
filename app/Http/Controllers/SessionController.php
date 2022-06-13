<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create()
    {

        return view('sessions.create');
    }

    public function store()
    {

        //validate the request
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        var_dump(auth()->attempt($attributes));
        die;

        //authenticate user and log in 
        if (auth()->attempt($attributes)) {
            // session()->regenerate();
            //redirect with a success flash message
            return redirect('/')->with('success', 'welcome back');
        }
        return back()->withErrors(['email' => 'Your provided credentials could not be verified']);
    }


    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye');
    }
}
