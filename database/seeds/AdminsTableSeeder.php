<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\Models\Admin::where('email', 'admin@admin.com')->first();
        if (!$admin) {
            \App\Models\Admin::create([
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => 'adminadmin',
            ]);
        }
    }
}
