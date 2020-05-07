<?php


namespace App\Views\Composers\Web;

use App\Models\Product;
use Illuminate\View\View;

class ProductsComposer
{
    public function compose(View $view)
    {
        $this->composeProducts($view);
    }

    private function composeProducts(View $view)
    {
        $mostViewProducts = Product::with(['images'])->active()->mostView()->take(6)->get();
        $view->with('mostViewProducts', $mostViewProducts);
    }
}
