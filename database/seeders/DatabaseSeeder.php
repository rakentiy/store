<?php
namespace Database\Seeders;

use App\Models\Brand;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Random\RandomException;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @throws RandomException
     */
    public function run(): void
    {
        Brand::factory(20)->create();

        Category::factory(20)
            ->has(Product::factory(random_int(3,7)))
            ->create();
    }
}
