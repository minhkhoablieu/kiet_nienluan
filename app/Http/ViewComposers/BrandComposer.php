<?php


namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Models\Brand;
class BrandComposer
{
    public $brand;
    public function __construct()
    {
        $this->brand = Brand::where('active', true)->orderBy('order')->get();

    }
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('brands', end($this->brand));
    }
}
