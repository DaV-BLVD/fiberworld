<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Value;


class ValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Value::create([
            'icon' => 'bi bi-shield-fill-check',
            'title' => 'Reliability',
            'description' => 'We build and maintain a robust network infrastructure to ensure consistent, uninterrupted internet access, so you\'re always connected when it matters most.'
        ]);

        Value::create([
            'icon' => 'bi bi-speedometer2',
            'title' => 'Speed',
            'description' => 'Experience blazing-fast speeds optimized for all your online activities, from streaming and gaming to heavy business operations.'
        ]);
    }
}
