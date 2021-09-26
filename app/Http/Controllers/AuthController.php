<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ApiResponser;

    public function getAllAdminUsers()
    {
        return User::get();
    }

    public function getAuthenticatedUser()
    {
        return Auth::user();
    }


    public function createAdminUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'bail|required|email|unique:users,email',
            'password' => 'bail|required|min:6'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return $this->success([
            'token' => $user->createToken('API TOKEN')->plainTextToken
        ]);
    }

    public function login(Request $request)
    {
        $attr = $this->validate($request, [
            'email' => 'bail|required|email',
            'password' => 'bail|required|min:6'
        ]);

        if(!Auth::attempt($attr)) return $this->error('Credentials not match', 401);
        return $this->success([
            "user" => Auth::user(),
            'token' => auth()->user()->createToken('API Token')->plainTextToken
        ]);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        $request->session()->invalidate();
        $request->session()->regenerate();

        return [
            'message' => 'Token Removed'
        ];
    }
}
