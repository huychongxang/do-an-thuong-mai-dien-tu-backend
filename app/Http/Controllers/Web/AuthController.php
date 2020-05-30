<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
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
            ['email' => 'Email hoặc mật khẩu không chính xác']
        )->withInput($request->only('email', 'remember'));;
    }

    public function register(Request $request)
    {

        request()->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->only('email', 'password');

        $check = User::create([
            'email' => $data['email'],
            'password' => $data['password']
        ]);
        if ($check) {
            Auth::attempt($data);
            return redirect()->route('home');
        }
        return redirect()->back()->withErrors([
            'email' => 'Tạo tài khoản thất bại'
        ]);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('home');
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $getInfo = Socialite::driver($provider)->user();
        $user = User::where('provider_id', $getInfo->id)->first();
        if (!$user) {
            $existEmail = User::where('email', $getInfo->getEmail())->first();
            if ($existEmail) {
                return redirect()->route('home')->withErrors([
                    'email' => 'Tạo tài khoản thất bại, email đã tồn tại'
                ]);
            }
            $user = User::create([
                'email' => $getInfo->email,
                'provider' => $provider,
                'provider_id' => $getInfo->id,
                'first_name' => $getInfo->getName(),
                'last_name' => $getInfo->getNickname(),
                'image' => $getInfo->getAvatar()
            ]);
        } else {
            $user->update([
                'email' => $getInfo->getEmail(),
                'image' => $getInfo->getAvatar(),
                'first_name' => $getInfo->getName(),
                'last_name' => $getInfo->getNickname(),
            ]);
        }

        auth()->login($user);
        return redirect()->route('home');
    }
}
