<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(! Category::where('name', 'Personal Development')->exists()){
            Category::create([
                'name' => 'Personal Development'
            ]);
        }
        if(! Category::where('name', 'Travel')->exists()){
            Category::create([
                'name' => 'Travel'
            ]);
        }
        if(! Category::where('name', 'Food and Cooking')->exists()){
            Category::create([
                'name' => 'Food and Cooking'
            ]);
        }
        if(! Category::where('name', 'Health and Fitness')->exists()){
            Category::create([
                'name' => 'Health and Fitness'
            ]);
        }
        if(! Category::where('name', 'Fashion and Style')->exists()){
            Category::create([
                'name' => 'Fashion and Style'
            ]);
        }
        if(! Category::where('name', 'Technology')->exists()){
            Category::create([
                'name' => 'Technology'
            ]);
        }
    }
}
