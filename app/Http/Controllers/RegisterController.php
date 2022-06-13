<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes =  request()->validate([
            'username' => 'required|max:255|min:3|unique:admins,username',
            'email' => 'required|max:255|email|unique:admins,email',
            'password' => 'required|max:255|min:7'
        ]);

        $user = Admin::create($attributes);

        return redirect('/dashboard');
    }
}
