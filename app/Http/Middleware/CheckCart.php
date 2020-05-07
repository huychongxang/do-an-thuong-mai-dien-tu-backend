<?php

namespace App\Http\Middleware;

use App\Models\Product;
use Closure;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class CheckCart
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            Cart::restore(\auth()->user()->id);
            if (Cart::count() > 0) {
                foreach (Cart::content() as $rowId => $row) {
                    $product = Product::find($row->id);
                    Cart::update($rowId, [
                        'id' => $product->id,
                        'name' => $product->name,
                        'price' => $product->getFinalPrice(),
                    ]);
                }
            }
        }
        return $next($request);
    }
}
