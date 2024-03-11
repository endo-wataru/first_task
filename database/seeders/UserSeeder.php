<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 最大のユーザーIDを取得
        $maxUserId = DB::table('users')->max('id');

        // 新しいユーザーのIDを設定
        $newUserId = $maxUserId + 1;

        //ユーザーを挿入
        DB::table('users')->insert([
            [
                'id' => $newUserId,
                'name' => 'aaa',
                'email' => 'test@example.com',
                'password' => Hash::make('password123')
            ]
           
        ]);
    }
}
