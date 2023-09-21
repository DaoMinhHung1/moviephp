<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required|max:255",
            "password" => "required| min:8",
        ]);
        // return $credentials;
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            return response()->json(['message' => 'Đăng nhập thành công', 'user' => $user]);
        } else {
            return response()->json(['message' => 'Xác thực thất bại'], 401);
        }
        // $users = Users::all();
        // return response()->json($users);
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $user = new Users();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return response()->json($user);
    }
}
