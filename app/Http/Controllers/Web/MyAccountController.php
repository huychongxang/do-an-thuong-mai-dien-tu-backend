<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyAccountController extends Controller
{
    public function index()
    {
        return view('web.pages.my-account.index');
    }
}
