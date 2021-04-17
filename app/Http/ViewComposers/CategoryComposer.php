<?php


namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Category;

class CategoryComposer
{
    public $categories;
    public function __construct()
    {
        $this->categories = Category::where('parent_id', 0)->where('active', 1)->get();
    }
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categories', end($this->categories));
    }
}
