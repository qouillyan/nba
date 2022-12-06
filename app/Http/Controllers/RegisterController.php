<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;

class RegisterController extends Controller
{
    public function __construct() 
    {
        $this->middleware('guest')->except('update');
        $this->middleware('auth')->only('update');
    }
    
    public function create()
    {
        return view('auth.register');
    }

    public function store(StoreUserRequest $request) {
        $request->validated();
        $user = User::create([
            'name' => request('name'),                      
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);
        Mail::to($user)->send(new VerifyEmail($user));
        $request = request();
        auth()->login($user);
        session()->flash('message', 'Check your inbox for email verification link.');
        return redirect('/');
    }
    
    public function update()
    {
        $userId = auth()->user()->id;
        User::where('id', $userId)->update(["is_verified" => true]);
        return redirect('/teams');  
    }
}
