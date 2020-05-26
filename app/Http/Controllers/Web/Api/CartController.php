<?php

namespace App\Http\Controllers\Web\Api;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->initialCart();
    }

    private function initialCart()
    {
        if (Cart::count() > 0) {
            foreach (Cart::content() as $rowId => $row) {
                $product = Product::find($row->id);
                Cart::update($rowId, [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->getFinalPrice(),
                ]);
            }
            Cart::store(\auth()->user()->id);
        }
    }
    public function index()
    {
        try {
            $cart = Cart::class;
            $content = [];
            foreach ($cart::content() as $row) {
                $content[] = [
                    'row_id' => $row->rowId,
                    'product_id' => $row->id,
                    'name' => $row->name,
                    'qty' => $row->qty,
                    'price' => $row->price,
                    'price_format' => number_format($row->price) . ' VNĐ',
                    'options' => $row->options,
                    'sub_total' => $row->qty * $row->price,
                    'sub_total_format' => number_format($row->qty * $row->price) . ' VNĐ',
                    'image' => $row->model->image
                ];
            }
            return ApiHelper::api_status_handle(200, [
                'sub_total' => $cart::subtotal(),
                'sub_total_format' => number_format($cart::subtotal()) . ' VNĐ',
                'count' => $cart::count(),
                'content' => $content,
                'shipping_cost' => 20000,
                'shipping_cost_format' => number_format(20000) . ' VNĐ',
                'total' => $cart::subtotal() + 20000,
                'total_format' => number_format($cart::subtotal() + 20000) . ' VNĐ',
                'link_keep_shopping'=>route('page.products')
            ]);
        } catch (\Exception $e) {
            return ApiHelper::api_status_handle(500, [
                'message' => $e->getMessage()
            ], false);
        }
    }

    public function update(Request $request)
    {
        try {
            $this->initialCart();
            $rowId = $request->row_id;
            $new_qty = $request->new_qty;
            $currentRow = Cart::get($rowId);
            if ($currentRow) {
                $product = Product::find($currentRow->id);
                if ($new_qty > 0) {
                    Cart::update($rowId, [
                        'name' => $product->name,
                        'qty' => $new_qty,
                        'price' => $product->getFinalPrice()
                    ])->associate(Product::class);
                } else {
                    Cart::remove($rowId);
                }
            }
            Cart::store(auth()->user()->id);
            return ApiHelper::api_status_handle(200, [
            ]);
        } catch (\Exception $e) {
            return ApiHelper::api_status_handle(500, [
                'message' => $e->getMessage()
            ], false);
        }
    }

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

    public function remove(Request $request)
    {
        try {
            $rowId = $request->row;
            $id = $request->id;
            $product = Product::find($id);
            $currentItem = Cart::get($rowId);
            if ($currentItem) {
                if ($currentItem->qty > 1) {
                    Cart::update($rowId, [
                        'id' => $product->id,
                        'name' => $product->name,
                        'qty' => $currentItem->qty - 1,
                        'price' => $product->getFinalPrice()
                    ])->associate(Product::class);
                } else {
                    Cart::remove($rowId);
                }

            }
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
