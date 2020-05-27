<?php

namespace App\Http\Controllers\Web\MyAccount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountInfoController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('web.pages.my-account.account-info.edit',compact('user'));
    }
}
