<?php


namespace App\Views\Composers\Web;


use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\View\View;

class CartHeaderComposer
{
    public function compose(View $view)
    {
        $this->composeCart($view);
    }

    private function composeCart(View $view)
    {
        $view->with('cart', Cart::class);
    }
}
