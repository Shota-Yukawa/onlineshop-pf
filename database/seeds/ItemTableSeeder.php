<?php

use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
          'admin_id' => 1,
          'name' => 'testItem1',
          'desc' => 'testtesttesttest',
          'price' => 1000,
          'imgpath' => 'image.png'
        ]);
        DB::table('items')->insert([
          'admin_id' => 1,
          'name' => 'testItem2',
          'desc' => 'testtesttesttest2',
          'price' => 2000,
          'imgpath' => 'image2.png'
        ]);
    }
}
