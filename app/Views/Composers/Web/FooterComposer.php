<?php


namespace App\Views\Composers\Web;

use App\Models\Setting;
use Illuminate\View\View;

class FooterComposer
{
    public function compose(View $view)
    {
        $this->composeSettings($view);
    }

    private function composeSettings(View $view)
    {
        $settings = Setting::pluck('value', 'key');
        $view->with('settings', $settings);
    }
}
