<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'key' => 'phone',
                'value' => '+61 3 8376 6284'
            ],
            [
                'key' => 'email',
                'value' => 'baby.kidsstore@example.com'
            ],
            [
                'key' => 'address',
                'value' => '121 King StMelbourne VIC 3000 Australi.'
            ],
        ];

        foreach ($settings as $setting) {
            \App\Models\Setting::firstOrCreate([
                'key' => $setting['key'],
            ], $setting);
        }
    }
}
