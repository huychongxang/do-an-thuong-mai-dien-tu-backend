<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();
        $totalProducts = Product::count();
        $totalUsers = User::count();
        $totalPosts = Post::count();

        $totals = Order::select(
            DB::raw(
                'DATE(created_at) as date,
                DATE_FORMAT(created_at, "%m/%d") as md,
                sum(total) as total_amount,
                count(id) as total_order'
            )
        )
            ->groupBy('date', 'md')
            ->having('date', '<=', date('Y-m-d'))
            ->whereRaw('DATE(created_at) >=  DATE_SUB(DATE(NOW()), INTERVAL 1 MONTH)')
            ->get();

        $orderGroup = $totals->keyBy('md')->toArray();
        $arrDays = [];
        $arrTotalsOrder = [];
        $arrTotalsAmount = [];
        $rangDays = new \DatePeriod(
            new \DateTime('-1 month'),
            new \DateInterval('P1D'),
            new \DateTime('+1 day')
        );

        foreach ($rangDays as $i => $day) {
            $date = $day->format('m/d');
            $arrDays[$i] = $date;
            $arrTotalsAmount[$i] = isset($orderGroup[$date]) ? $orderGroup[$date]['total_amount'] : 0;
            $arrTotalsOrder[$i] = isset($orderGroup[$date]) ? $orderGroup[$date]['total_order'] : 0;
        }

        $max_order = max($arrTotalsOrder);
        foreach ($arrTotalsAmount as $key => $value) {
            if ($key != 0) {
                $key_first = $key - 1;
                $arrTotalsAmount[$key] += $arrTotalsAmount[$key_first];
            }
        }
        $arrDays = '["' . implode('","', $arrDays) . '"]';
        $arrTotalsAmount = '[' . implode(',', $arrTotalsAmount) . ']';
        $arrTotalsOrder = '[' . implode(',', $arrTotalsOrder) . ']';

        //*************************** /
        //===================12 months  ==============================
        for ($i = 12; $i >= 0; $i--) {
            $months1[$i] = date("m/Y", strtotime(date('Y-m-01') . " -$i months"));
            $months2[$i] = date("Y-m", strtotime(date('Y-m-01') . " -$i months"));
            $arrTotalsAmount_year[$i] = 0;
        }

        $totalsMonth = Order::select(
            DB::raw(
                'DATE_FORMAT(created_at, "%Y-%m") as ym,
                        sum(total) as total_amount,
                        count(id) as total_order'
            )
        )
            ->groupBy('ym')
            ->having('ym', '>=', $months2[12])
            ->having('ym', '<=', $months2[0])
            ->get();

        foreach ($totalsMonth as $key => $value) {
            $key_month = array_search($value->ym, $months2);
            $arrTotalsAmount_year[$key_month] = $value->total_amount;
        }
        $months1 = '["' . implode('","', $months1) . '"]';
        $arrTotalsAmount_year = '[' . implode(',', $arrTotalsAmount_year) . ']';

        return view('admin.pages.dashboard.index', compact('totalOrders', 'totalProducts', 'totalPosts', 'totalUsers',
            'arrDays', 'arrTotalsAmount', 'arrTotalsOrder', 'max_order','months1','arrTotalsAmount_year'
        ));
    }
}
