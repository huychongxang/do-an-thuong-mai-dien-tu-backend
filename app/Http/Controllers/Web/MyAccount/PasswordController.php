<?php

namespace App\Http\Controllers\Web\MyAccount;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Account\Password\UpdatePasswordRequest;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('web.pages.my-account.password.edit');
    }

    public function update(UpdatePasswordRequest $request)
    {
        $user = auth()->user()->update($request->only('password'));
        if ($user) {
            alert()->success('Đổi mật khẩu', 'Thành công');
        } else {
            alert()->error('Đổi mật khẩu', 'Thất bại!');
        }
        return redirect()->back();
    }
}
