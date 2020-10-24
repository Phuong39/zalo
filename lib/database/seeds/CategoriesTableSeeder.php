<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data = [

              [
              	'name'=>'Bán quần áo',
              	'slug'=>str_slug('Bán quần áo')
              ],
              [
              	'name'=>'Bán điện thoại',
              	'slug'=>str_slug('Bán điện thoại')
              ],   
       ];
       DB::table('vp_categories')->insert($data);
    }
}
