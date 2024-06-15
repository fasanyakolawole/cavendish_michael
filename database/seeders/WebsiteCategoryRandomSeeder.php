<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Website;
use App\Models\Category;

class WebsiteCategoryRandomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $websites = Website::all();
        $categories = Category::all();

        // Attach categories randomly to each website
        $websites->each(function ($website) use ($categories) {
            $shuffled = $categories->shuffle();
            $count = rand(1, $shuffled->count());
            $selectedCategories = $shuffled->take($count);
            $website->categories()->sync($selectedCategories);
        });
    }
}
