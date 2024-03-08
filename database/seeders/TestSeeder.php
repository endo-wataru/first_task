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

        // UserSeederでユーザーを作成
        $this->call(UserSeeder::class);

        //UserSeederによって挿入されたユーザーのIDを取得します
        $userId = DB::table('users')->where('email', 'test@example.com')->value('id');

        DB::table('tasks')->insert([
            [
                'title' => 'スポーツ',
                'description' => 'テニスは楽しい',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title' => '読書',
                'description' => '参考書を買いに行きたい',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}
