<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('admin.pages.settings.list', compact('settings'));
    }

    public function edit($id)
    {
        $setting = Setting::find($id);
        return view('admin.pages.settings.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $setting = Setting::find($id);
        $setting->update($request->only(['value']));
        if ($setting) {
            alert()->success('Cập nhật setting', 'Thành công');
        } else {
            alert()->error('Cập nhật setting', 'Thất bại!');
        }
        return redirect()->back();
    }
}
