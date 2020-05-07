<?php

namespace App\Http\Controllers\Web\Api;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        try {
            $id = $request->id;
            $product = Product::find($id);
            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->getFinalPrice()
            ])->associate(Product::class);
            Cart::store(auth()->user()->id);
            return ApiHelper::api_status_handle(200, [
                'count' => Cart::count(),
                'content' => $this->renderHtml(Cart::content()),
                'subtotal' => Cart::subtotal()
            ], true);
        } catch (\Exception $e) {
            return ApiHelper::api_status_handle(500, [
                'message' => $e->getMessage()
            ], false);
        }

    }

    private function renderHtml($content)
    {
        $html = '';
        foreach ($content as $row) {
            $html .= '<tr>';
            $html .= '<td>';
            $html .= '<div class="product-media">';
            $html .= '<a href="#">';
            $html .= '<img src="' . $row->model->image . '">';
            $html .= '</a>';
            $html .= '</div>';
            $html .= '</td>';
            $html .= '<td>';
            $html .= '<div class="product-content">';
            $html .= '<div class="product-name">';
            $html .= "<a href=\"\">{$row->model->name}</a>";
            $html .= '</div>';
            $html .= '<div class="product-price">';
            $html .= "<h5 class='price'><b>  {$row->model->getFinalPriceHtml()} * $row->qty  </b></h5>";
            $html .= "<a hred='#' class='delete fa fa-close'></a>";
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</td>';
            $html .= '</tr>';
        }
        return $html;
    }
}
