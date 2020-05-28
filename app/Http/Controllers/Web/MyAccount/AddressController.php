<?php

namespace App\Http\Controllers\Web\MyAccount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('web.pages.my-account.address.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user()->update($request->all());
        if ($user) {
            alert()->success('Cập nhật', 'Thành công');
        } else {
            alert()->error('Cập nhật', 'Thất bại!');
        }
        return redirect()->back();
    }
}
