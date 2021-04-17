<?php


namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Cart;
class CartComposer{
    private $TotalQuantity;
    private $PriceSum;
    public function __construct()
    {
        $this->TotalQuantity = Cart::getTotalQuantity();
        $this->PriceSum = Cart::getTotal();
    }

    public function compose(View $view)
    {
        $view->with('TotalQuantity', $this->TotalQuantity);
        $view->with('PriceSum', $this->PriceSum);
    }
}
