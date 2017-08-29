<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use XblogConfig;

class SettingsComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with(XblogConfig::getArrayByTag('settings'));
    }
}