<?php


namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Models\Sponsor;
class SponsorComposer
{
    public $sponsors;
    public function __construct()
    {
        $this->sponsors = Sponsor::where('active', true)->orderBy('order')->get();

    }
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('sponsors', end($this->sponsors));
    }
}
