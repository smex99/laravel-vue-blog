<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_one = new Category();
        $category_one->name = 'Laravel';
        $category_one->save();

        $category_too = new Category();
        $category_too->name = 'Javascript';
        $category_too->save();

        $category_three = new Category();
        $category_three->name = 'Vue';
        $category_three->save();
    }
}
