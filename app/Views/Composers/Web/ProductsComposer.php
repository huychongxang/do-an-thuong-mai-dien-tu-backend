<?php


namespace App\Views\Composers\Web;

use App\Models\Product;
use Illuminate\View\View;

class ProductsComposer
{
    public function compose(View $view)
    {
        $this->composeProducts($view);
        $this->composeProductsSelling($view);
        $this->composeProductsLatest($view);
    }

    private function composeProducts(View $view)
    {
        $mostViewProducts = Product::with(['images','promotionPrice'])->active()->mostView()->take(6)->get();
        $view->with('mostViewProducts', $mostViewProducts);
    }

    private function composeProductsSelling(View $view)
    {
        $mostSellingProducts = Product::with(['images','promotionPrice'])->active()->mostSelling()->take(6)->get();
        $view->with('mostSellingProducts', $mostSellingProducts);
    }

    private function composeProductsLatest(View $view)
    {
        $mostLatestProducts = Product::with(['images','promotionPrice'])->active()->latest()->take(6)->get();
        $view->with('mostLatestProducts', $mostLatestProducts);
    }
}
