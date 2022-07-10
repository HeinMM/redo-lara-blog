<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Nation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            NationSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            BlogSeeder::class,
        ]);

        $photos = Storage::allFiles("public");
        array_shift($photos);//for git ignore
        Storage::delete($photos);

        echo "\e[96mLight cyan Storage Cleared \n";

    }
}
