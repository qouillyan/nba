<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct() 
    {
        $this->middleware('guest');
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
        auth()->login($user);
        $request = request();
        return redirect('/');
    }
}
