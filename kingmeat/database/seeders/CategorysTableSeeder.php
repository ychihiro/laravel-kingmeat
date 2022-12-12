<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['前菜', '肉', 'ご飯もの', 'おつまみ', 'スープ', 'デザート', '飲み物'];
        foreach ($names as $name) {
            Category::create(['name' => $name]);
        };
    }
}
