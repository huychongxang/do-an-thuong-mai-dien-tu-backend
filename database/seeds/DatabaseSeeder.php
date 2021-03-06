<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
//        $this->call(ProductCategoriesTableSeeder::class);
        $this->call(OrderStatusTableSeeder::class);
        $this->call(PaymentStatusTableSeeder::class);
        $this->call(ShippingStatusTableSeeder::class);
        $this->call(RoleAndPermissionDefaultSeeder::class);
        $this->call(PaymentMethodsTableSeeder::class);
        $this->call(ShippingMethodsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
    }
}
