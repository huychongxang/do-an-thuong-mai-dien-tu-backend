<?php

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodsTableSeeder extends Seeder
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
                'name' => 'cod',
                'label' => 'Trả tiền khi nhận hàng'
            ],
        ];

        foreach ($statuses as $status) {
            PaymentMethod::firstOrCreate([
                'name' => $status['name'],
            ], $status);
        }
    }
}
