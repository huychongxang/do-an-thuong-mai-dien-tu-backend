<?php


namespace App\Views\Composers\Web;


use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CartHeaderComposer
{
    public function compose(View $view)
    {
        $this->composeCart($view);
    }

    private function composeCart(View $view)
    {
        if (Auth::check()) {
            Cart::restore(\auth()->user()->id);
        }
        $view->with('cart', Cart::class);
    }
}
