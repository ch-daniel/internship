<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function destroy() {
      auth()->logout();

      return redirect('/')->with('success', 'Goodbye!');
    }

    public function create() {
      return view('sessions.create');
    }

    public function store() {
      $attributes = request()->validate([
        'email' =>'required|email',
        'password' => 'required'
      ]);

      if (auth()->attempt($attributes)) {
        return redirect('/')->with('success', 'Welcome Back!');
      }

      //auth failed

      throw ValidationException::withMessages([
        'email' => 'The provided credentials could not be rified'
      ]);

    //  return back()
    //    ->withInput()
    //    ->withErrors(['email' => 'The provided credentials could not be rified']);

    }
}
