<?php
use App\News;
use App\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        News::truncate();
        Category::truncate();
        $categories = factory('App\Category', 10)->create();
        foreach ($categories as $category) {
            factory('App\News', 5)->create(['category_id' => $category->id]);
        }
    }
}
