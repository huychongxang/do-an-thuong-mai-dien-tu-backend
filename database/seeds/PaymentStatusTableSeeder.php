<?php

use Illuminate\Database\Seeder;

class PaymentStatusTableSeeder extends Seeder
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
                'name' => 'unpaid',
                'label' => 'Chưa thanh toán'
            ],
            [
                'name' => 'partial_payment',
                'label' => 'Thanh toán một phần'
            ],
            [
                'name' => 'paid',
                'label' => 'Đã thanh toán'
            ],
            [
                'name' => 'refund',
                'label' => 'Hoàn trả'
            ],
        ];

        foreach ($statuses as $status) {
            \App\Models\PaymentStatus::firstOrCreate([
                'name' => $status['name'],
            ], $status);
        }
    }
}
