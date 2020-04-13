<?php

use Illuminate\Database\Seeder;

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ProductCategory::firstOrCreate([
            'name' => 'Root',
        ], [
            'name' => 'Root',
            'description' => 'This is the root category, don\'t delete this one',
            'parent_id' => null,
            'status' => 0,
        ]);

//        factory(\App\Models\ProductCategory::class, 10)->create();
    }
}
