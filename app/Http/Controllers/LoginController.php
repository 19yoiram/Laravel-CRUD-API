<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\TemplateEmail;
use Illuminate\Http\Request;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LoginController extends Controller
{
    public function  index()
    {
        return view('login');
    }

    
    public function register()
    {
        return view('register');
    }

    public function processRegister(Request $request)
    {
        $request->validate(
            [
            'email' => ['required', 'email', 'unique:users', new TemplateEmail],
            'password' => 'required|confirmed',
            'age' =>  'required|integer|min:18',

            ]
    );


    User::create($request->all());

            return redirect()->route('account.login')
                ->with('success', 'you have registered successfully.');
        
     }

}

