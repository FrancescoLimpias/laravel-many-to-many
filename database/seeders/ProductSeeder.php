<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()->count(50)->make()->each(function(Product $product){

            $product->type()->associate(Type::inRandomOrder()->first());
            $product->save();
            $product->categories()->attach(Category::inRandomOrder()->limit(rand(1,5))->get());

        });
    }
}
