<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate(
            [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            ]
            );

            $user = new User();
            
            $user->name = $request->name;
            $user->email = $request->email;

            $user->password = Hash::make($request->password);

            $user->save();

            $token = $user->createToken('test')->accessToken;
            // return $token;
            return response()->json(
                [
                    'result' => 1,
                    'message' => 'You are Register.',
                    'token' => $token
                ]
            );
    }

    public function login(Request $request){
        $request->validate(
            [
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
            ]
            );
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                $user = auth()->user();
                // return $user;
                
                $token = $user->createToken('test')->accessToken;
                return response()->json(
                    [
                        'result' => 1,
                        'message' => 'You are now Login and can see UserLogin List all.',
                        'token' => $token
                    ]
                );
            }

            return response()->json(
                [
                    'result' => 0,
                    'message' => 'You are data is Invalid.',
                    'token' => null
                ]
            );

    }
}
