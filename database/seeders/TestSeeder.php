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


        //UserSeederによって挿入されたユーザーのIDを取得します
        $userId = DB::table('users')->where('email', 'test@example.com')->value('id');

        DB::table('tasks')->insert([
            [
                'user_id' => 1,
                'title' => 'スポーツ',
                'description' => 'テニスは楽しい',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'user_id' => 1,
                'title' => '読書',
                'description' => '参考書を買いに行きたい',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'user_id' => 1,
                'title' => '買い物',
                'description' => '人参、白菜、大根を買ってきて',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}
