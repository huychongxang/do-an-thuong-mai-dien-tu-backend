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
            $link = route('page.product', $row->model->sku);
            $html .= '<tr>';
            $html .= '<td>';
            $html .= '<div class="product-media">';
            $html .= '<a href="' . $link . '">';
            $html .= '<img src="' . $row->model->image . '">';
            $html .= '</a>';
            $html .= '</div>';
            $html .= '</td>';
            $html .= '<td>';
            $html .= '<div class="product-content">';
            $html .= '<div class="product-name">';
            $html .= "<a href='" . $link . "'>{$row->model->name}</a>";
            $html .= '</div>';
            $html .= '<div class="product-price">';
            $html .= "<h5 class='price'><b>  {$row->model->getFinalPriceHtml()} * $row->qty  </b></h5>";
            $html .= "<a data-row='" . $row->rowId . "' data-id='" . $row->id . "' class='delete delete-row-item fa fa-close'></a>";
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</td>';
            $html .= '</tr>';
        }
        return $html;
    }
}