<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $request->remember)) {
            // Authentication passed...
            return redirect()->route('home');
        }
        return redirect()->back()->withErrors(
            ['email'=>'Email hoặc mật khẩu không chính xác']
        );
    }

    public function register(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();

        $check = $this->create($data);
        if ($check) {
            Auth::attempt($data);
            return redirect()->route('home');
        }
        return redirect()->back()->withErrors([
            'email'=>'Tạo tài khoản thất bại'
        ]);
    }

    private function create(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('home');
    }
}
