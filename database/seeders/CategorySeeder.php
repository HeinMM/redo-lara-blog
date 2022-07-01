<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ["IT News", "Sport", "Food & Drinks", "Travel"];
        foreach ($categories as $category) {
            Category::factory()->create([
                "title" => $category,
                "slag" => Str::slug($category),
                "user_id" => rand(1, 10)
            ]);
        }
    }
}
