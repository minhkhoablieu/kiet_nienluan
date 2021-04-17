<?php


namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Banner;

class BannerComposer
{
    public $banners;
    public function __construct()
    {
        $this->banners = Banner::where('active', true)->orderBy('order')->get();
    }
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('banners', end($this->banners));
    }
}
