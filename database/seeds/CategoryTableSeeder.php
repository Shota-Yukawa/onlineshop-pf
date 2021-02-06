<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insert([
        'cate_name' => 'tops',
      ]);
      DB::table('categories')->insert([
        'cate_name' => 'outer',
      ]);
      DB::table('categories')->insert([
        'cate_name' => 'bottoms',
      ]);
      DB::table('categories')->insert([
        'cate_name' => 'accesary',
      ]);
      DB::table('categories')->insert([
        'cate_name' => 'others',
      ]);

    }
}
