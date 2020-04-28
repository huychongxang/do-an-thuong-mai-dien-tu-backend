<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 28-Apr-20
 * Time: 4:42 PM
 */

namespace App\Views;


use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\View\View;

class SideBarAndNavBarComposer
{
    public function compose(View $view)
    {
        $this->composeNumberNewOrder($view);
    }

    private function composeNumberNewOrder(View $view)
    {
        $newStatus = OrderStatus::where('name', 'new')->first();
        $newOrders = Order::where('status', $newStatus->id)->count();
        $view->with('newOrders', $newOrders);
    }
}
