<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class add_test_ads extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ads')->insert([
            [
                'title' => '新機能リリース',
                'content' => 'お気に入りのプロジェクトが確認できるようになりました。メニューの「お気に入り」をご確認ください。',
                'is_enabled' => true,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => 'Laravel勉強会',
                'content' => '2022年11月1日@横浜 Laravel勉強会を開催します。詳細をご確認ください。',
                'is_enabled' => true,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
