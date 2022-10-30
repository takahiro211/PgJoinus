<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class add_test_faq extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faq_list')->insert([
            [
                'question' => '料金は無料でしょうか',
                'answer' => 'ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。',
                'is_enabled' => true,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'question' => 'パスワードを忘れた場合どうすればいいでしょうか',
                'answer' => 'ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。',
                'is_enabled' => true,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'question' => 'プロジェクトの投稿方法がわかりません',
                'answer' => 'ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。',
                'is_enabled' => true,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'question' => 'ログインできません',
                'answer' => 'ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。',
                'is_enabled' => true,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'question' => '他人のプロジェクトを紹介してもいい？',
                'answer' => 'ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。ここには回答が入ります。',
                'is_enabled' => true,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
