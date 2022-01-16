<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Mail\Hello;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

class RegistrationController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function create()
    {
        return view('registration.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);
        
        $user = User::create(request(['name', 'email', 'password']));
        
        auth()->login($user); //it established a new session for that user with the site.

        session()->flash('message', '<b>Hi there!</b> Thanks for signing up!');
        session()->flash('type', 'success');
        Mail::to($user)->send(new Hello($user));
        
        return redirect()->to('/blog');
    }
}
