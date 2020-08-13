<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    private const categories = array('野菜', '果物', '肉', '魚介類', '卵・乳製品', 'はちみつ', 'お酒', 'お茶', '調味料', '米・穀類', '加工品', '花・植物');
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
            ]);
        }

        
    }
}
