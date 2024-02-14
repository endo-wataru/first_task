<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            [
                'title' => 'スポーツ',
                'description' => 'テニスは楽しい',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => '読書',
                'description' => '鉄腕アトムは面白い',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}
