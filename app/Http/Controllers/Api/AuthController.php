<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginFacebookRequest;
use App\Http\Requests\Api\Auth\LoginGoogleRequest;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Models\User;
use JWTAuth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        try {
            $email = $request->email;
            $password = $request->password;

            $user = User::create([
                'email' => $email,
                'password' => $password
            ]);
            return ApiHelper::api_status_handle(200, true, $user);
        } catch (\Exception $e) {
            return ApiHelper::api_status_handle($e->getCode(), [
                'message' => $e->getMessage()
            ], false);
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            $email = $request->email;
            $password = $request->password;

            $credentials = [
                'email' => $email,
                'password' => $password
            ];
            if (!$token = JWTAuth::attempt($credentials)) {
                return ApiHelper::api_status_handle(404, false, [
                    'message' => 'Email or Password is incorrect'
                ]);
            }

            return ApiHelper::api_status_handle(200, [
                'token' => $token
            ]);
        } catch (\Exception $e) {
            return ApiHelper::api_status_handle($e->getCode(), [
                'message' => $e->getMessage()
            ], false);
        }
    }

    public function loginFacebook(LoginFacebookRequest $request)
    {
        try {
            $facebook_id = $request->facebook_id;
            $email = $request->email;
            $first_name = $request->first_name;
            $last_name = $request->last_name;

            $user = User::where('provider_id', $facebook_id)->first();
            if (!$user) {
                $existEmail = User::where('email', $email)->first();
                if ($existEmail) {
                    throw new \Exception('Email exist');
                }
                $user = User::create([
                    'email' => $email,
                    'provider' => 'facebook',
                    'provider_id' => $facebook_id,
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                ]);
            } else {
                $user->update([
                    'email' => $email,
                    'first_name' => $first_name,
                    'last_name' => $last_name
                ]);
            }


            $token = JWTAuth::fromUser($user);

            return ApiHelper::api_status_handle(200, [
                'token' => $token
            ]);
        } catch (\Exception $e) {
            return ApiHelper::api_status_handle(500, [
                'message' => $e->getMessage()
            ], false);
        }
    }

    public function loginGoogle(LoginGoogleRequest $request)
    {
        try {
            $google_id = $request->google_id;
            $email = $request->email;
            $first_name = $request->first_name;
            $last_name = $request->last_name;
            $user = User::where('provider_id', $google_id)->first();
            if (!$user) {
                $existEmail = User::where('email', $email)->first();
                if ($existEmail) {
                    throw new \Exception('Email exist');
                }
                $user = User::create([
                    'email' => $email,
                    'provider' => 'google',
                    'provider_id' => $google_id,
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                ]);
            } else {
                $user->update([
                    'email' => $email,
                    'first_name' => $first_name,
                    'last_name' => $last_name
                ]);
            }
            $token = JWTAuth::fromUser($user);

            return ApiHelper::api_status_handle(200, [
                'token' => $token
            ]);
        } catch (\Exception $e) {
            return ApiHelper::api_status_handle(500, [
                'message' => $e->getMessage()
            ], false);
        }
    }
}
