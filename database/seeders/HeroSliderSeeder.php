<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HeroSlider;

class HeroSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HeroSlider::truncate(); // Optional: clear existing slides

        $slides = [
            [
                'title' => 'Blazing Fast, Ultra-Reliable Internet',
                'description' => 'Experience the difference with Fiberworld – connecting your world with superior fiber optics.',
                'image' => 'hero_sliders/1.png',
                'button_text' => 'View Plans',
                'button_link' => '/plans',
                'button_type' => 'primary',
                'button_text2' => 'Check Coverage',
                'button_link2' => '/coverage',
                'button_type2' => 'outline-light',
            ],
            [
                'title' => 'Seamless Connectivity Everywhere',
                'description' => 'Reliable fiber optic internet for homes and businesses with unmatched speed and stability.',
                'image' => 'hero_sliders/2.png',
                'button_text' => 'View Plans',
                'button_link' => '/plans',
                'button_type' => 'primary',
                'button_text2' => 'Check Coverage',
                'button_link2' => '/coverage',
                'button_type2' => 'outline-light',
            ],
            [
                'title' => 'Experience Next-Level Internet',
                'description' => 'Ultra-fast speeds and low latency designed to power your digital lifestyle.',
                'image' => 'hero_sliders/3.png',
                'button_text' => 'View Plans',
                'button_link' => '/plans',
                'button_type' => 'primary',
                'button_text2' => 'Check Coverage',
                'button_link2' => '/coverage',
                'button_type2' => 'outline-light',
            ],
        ];

        foreach ($slides as $slide) {
            HeroSlider::create($slide);
        }
    }
}
