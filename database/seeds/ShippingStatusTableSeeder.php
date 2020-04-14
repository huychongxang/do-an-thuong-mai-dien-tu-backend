<?php

use Illuminate\Database\Seeder;

class ShippingStatusTableSeeder extends Seeder
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
                'name' => 'not_sent',
                'label' => 'Chưa gửi'
            ],
            [
                'name' => 'sending',
                'label' => 'Đang gửi'
            ],
            [
                'name' => 'shipping_done',
                'label' => 'Đã nhận hàng'
            ],
        ];

        foreach ($statuses as $status) {
            \App\Models\ShippingStatus::firstOrCreate([
                'name' => $status['name'],
            ], $status);
        }
    }
}
