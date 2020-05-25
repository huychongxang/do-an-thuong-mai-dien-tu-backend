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
                'label' => 'Mới',
                'type'=>'primary'
            ],
            [
                'name' => 'processing',
                'label' => 'Đang xử lý',
                'type'=>'secondary'
            ],
            [
                'name' => 'hold',
                'label' => 'Tạm giữ',
                'type'=>'warning'
            ],
            [
                'name' => 'canceled',
                'label' => 'Hủy bỏ',
                'type'=>'danger'
            ],
            [
                'name' => 'done',
                'label' => 'Hoàn thành',
                'type'=>'success'
            ],
            [
                'name' => 'failed',
                'label' => 'Thất bại',
                'type'=>'dark'
            ],
        ];

        foreach ($statuses as $status) {
            \App\Models\OrderStatus::firstOrCreate([
                'name' => $status['name'],
            ], $status);
        }
    }
}
