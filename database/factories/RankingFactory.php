<?php

namespace Database\Factories;

use App\Models\Ranking;
use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;

class RankingFactory extends Factory
{
    protected $model = Ranking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'website_id' => Website::factory(),
            'rank' => $this->faker->numberBetween(1, 100),
        ];
    }
}
