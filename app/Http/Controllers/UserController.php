<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule as ValidationRule;

class UserController extends Controller
{
    // Returns view with index of users  
    public function index()
    {
        $users = User::get();
        return view('/users.index', [
            'users' => $users
        ]);
    }

    // Returns view to add a new user 
    public function create()
    {
        return view('users.create');
    }

    //To authenticate 
    // And store new user
    public function store()
    {
        $attributes =  request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|email|unique:users,email',
            'phone' => 'required|max:10|min:10',
            'city' => 'required|max:255|'
        ]);

        $user = User::create($attributes);
        return redirect('/users');
    }

    // returns the editable form of user info 
    public function edit(User $user)
    {
        $users = User::find($user);
        return view('users.edit', [
            'users' => $users
        ]);
    }

    // To update info of user 
    public function update(User $user)
    {
        $attributes =  request()->validate([
            'name' => 'required|max:255',
            'email' => ['required', ValidationRule::unique('users', 'email')->ignore($user->id)],
            'phone' => 'required|max:10|min:10',
            'city' => 'required|max:255|'
        ]);

        $user->update($attributes);
        // returns to users listing page 
        return redirect('/users');
    }

    // To delete the user 
    public function delete(User $user)
    {
        $user->delete();
        // returns to users listing page 
        return redirect('/users');
    }
}
