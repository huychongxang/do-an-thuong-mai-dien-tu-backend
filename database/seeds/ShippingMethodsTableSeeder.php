<?php

use Illuminate\Database\Seeder;

class ShippingMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'name' => 'standard',
                'label' => 'Ship hàng tiêu chuẩn',
                'description' => 'Tiền ship đồng giá 20.000 vnđ, thời gian giao hàng từ 3-5 ngày'
            ],
        ];

        foreach ($statuses as $status) {
            \App\Models\ShippingMethod::firstOrCreate([
                'name' => $status['name'],
            ], $status);
        }
    }
}
