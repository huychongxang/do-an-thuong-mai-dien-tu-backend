<?php

use Illuminate\Database\Seeder;

class OrderStatusTableSeeder extends Seeder
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
                'name' => 'new',
                'label' => 'Mới'
            ],
            [
                'name' => 'processing',
                'label' => 'Đang xử lý'
            ],
            [
                'name' => 'hold',
                'label' => 'Tạm giữ'
            ],
            [
                'name' => 'canceled',
                'label' => 'Hủy bỏ'
            ],
            [
                'name' => 'done',
                'label' => 'Hoàn thành'
            ],
            [
                'name' => 'failed',
                'label' => 'Thất bại'
            ],
        ];

        foreach ($statuses as $status) {
            \App\Models\OrderStatus::firstOrCreate([
                'name' => $status['name'],
            ], $status);
        }
    }
}
