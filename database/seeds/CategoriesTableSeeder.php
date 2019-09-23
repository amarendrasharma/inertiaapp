<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        $categories = ['Movie', 'IT', "Politics", "Market", "Games"];
        foreach ($categories as $category) {
            DB::table('categories')->insert(
                [
                    'category_name' => $category,
                    'uuid' => Str::uuid()
                ],
            );
        }
    }
}
