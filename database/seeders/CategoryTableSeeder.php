<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::truncate();

        $categories =  [
            [
                'name' => 'プログラミング',
                'thumbnail' => 'programming.png',
                'sort' => 1
            ],
            [
                'name' => '音楽',
                'thumbnail' => 'music.png',
                'sort' => 2
            ],
            [
                'name' => '歴史',
                'thumbnail' => 'history.png',
                'sort' => 3
            ],
            [
                'name' => 'ビジネス',
                'thumbnail' => 'business.png',
                'sort' => 4
            ]
        ];

        foreach($categories as $category) {
            Category::create($category);
        }
    }
}
