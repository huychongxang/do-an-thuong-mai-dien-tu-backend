<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 25-Mar-20
 * Time: 9:44 AM
 */

namespace App\Helpers;

class ApiHelper
{
    public static function api_status_handle($code, $data, $success = true)
    {
        $message = ($data['message']) ?? null;
        $data = [
            'code' => $code,
            'success' => $success,
            'status' => static::status_code($code),
            'message' => $message,
            'data' => $data
        ];


        return response()->json($data, $code);
    }

    public static function api_resource_handle($resource, $code, $metaData = [])
    {
        $status = static::status_code($code);
        $metaData['status'] = $status;
        $metaData['code'] = $code;
        return $resource->additional($metaData);
    }

    public static function status_code($code): string
    {
        $status_code = [
            0 => "Error",
            200 => "Success",
            404 => 'Not Found',
            88 => "Invalid post request",
            77 => "Unsecured request",
            66 => "Invalid parameters",
            //users status (range 101-->199)
            101 => "Please enter your email",
            102 => "Please enter your password",
            103 => "Insufficient password length of 8 characters",
            104 => "Email address already exists",
            105 => "Email is not a valid email address",
            185 => "Email or a password incorrect",
            186 => "Invalid email",
            140 => "error 140",
            141 => "error 141",

            //oauth status (range 201-->299)
            235 => "Invalid security code",
            237 => "Security code expired",
            277 => "Invalid token",
            278 => "Invalid facebook token",
            289 => "Token expired",
            255 => "User has not login",

            // Follow (3xx)
            301 => 'Cannot follow youself',
            302 => 'You already follow this user',
            303 => 'You are not following this user',
        ];

        if (array_key_exists($code, $status_code)) {
            return $status_code[$code];
        } else {
            return 'Error';
        }

    }
}
