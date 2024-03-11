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

        // UserSeederの変更に合わせて新しいユーザーIDを取得します
        $newUserId = DB::table('users')->max('id') + 1;

        DB::table('tasks')->insert([
            [
                'user_id' => $newUserId,
                'title' => 'スポーツ',
                'description' => 'テニスは楽しい',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'user_id' => $newUserId,
                'title' => '読書',
                'description' => '参考書を買いに行きたい',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'user_id' => $newUserId,
                'title' => '買い物',
                'description' => '人参、白菜、大根を買ってきて',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}
