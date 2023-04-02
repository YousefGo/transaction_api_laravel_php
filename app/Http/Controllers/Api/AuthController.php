<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    //

    public function register(Request $request ){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required','string','confirmed','min:8',Password::defaults()],
            'device_name' => 'required',
        ]);

        $user = User::create([
        'name'=>$request->name,
        'email'=>$request->email ,
        'password'=>Hash::make($request->password)
        ]
        );


        return $user->createToken($request->device_name)->plainTextToken;
    }

    public function login(Request $request ){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken($request->device_name)->plainTextToken;
    }



    public function logout(Request $request ){
        $user = User::where('email',$request->email)->first();

            if($user) {
                $user->tokens()->delete();
            }

            return response()->noContent();
                }

}
