<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StorePostRequest;

class AuthController extends Controller
{

    public function register(StorePostRequest $request)
    {
        // $request->validate();
        $user =  User::create(
            [

                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'age' => $request->age,
                'dob'=> $request->dob,
                'gender' => $request->gender,
                'address'=> $request->address,
                'state' => $request->state,
                'country'=> $request->country

                
            ]
        );
     
            $token = Auth::login($user);
            return response()->json([
                'status' => 'success',
                'message'=> 'User created successfully.',
                'user' => $user,
                'authorization' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:60', 
            'password' => 'required',
        ]);
        $credentials = $request->only(['email', 'password']);
        $token = Auth::attempt(credentials: $credentials);
        if (!$token) {
            return response()->json([
                'status'=> 'error',
                'message' => 'Unauthorized'], 401);

        }
        $user= Auth::user();
         return response()->json([
                'status' => 'success',
                'user' => $user,
                'authorization' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);
       
    }

    public function logout()
    {
        
        Auth::logout();
        return response()->json([
            'status'=> 'success',
            'message' => 'Successfully logged out'
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorization' => [
                'token' => Auth::refresh(),
                'type'  =>  'bearer'                              
            ]
        ]);
    }

}
