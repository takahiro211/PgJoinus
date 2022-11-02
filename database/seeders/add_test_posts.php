<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class add_test_posts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'title' => 'ひらがなをカタカナに変換するnpmライブラリ開発です',
                'description' => 'issueが増えてきたので対応できる方いませんか？',
                'detail' => 'こんにちは。閲覧ありがとうございます。\n JavaScript未経験の方でも構いません。\n修正いただきプルリクエストをお願いします。\n\n私の方でレビューしますので、問題があった際は修正をお願いします。',
                'url' => 'https://github.com/takahiro211/pg-joinus-front',
                'author' => 6,
                'skill' => json_encode(['JavaScript', 'PHP', 'React', 'TypeScript', 'Laravel']),
                'free_tag' => json_encode(['未経験者歓迎', 'レビューします', '期限厳守']),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => '世界各国の現在時刻を取得するnpmライブラリ開発です',
                'description' => '以下のチケットの対応をお願いしたいです。',
                'detail' => 'こんにちは。閲覧ありがとうございます。\n JavaScript未経験の方でも構いません。\n修正いただきプルリクエストをお願いします。\n\n私の方でレビューしますので、問題があった際は修正をお願いします。',
                'url' => 'https://github.com/takahiro211/pg-joinus-front',
                'author' => 6,
                'skill' => json_encode(['JavaScript', 'PHP', 'React', 'TypeScript', 'Laravel']),
                'free_tag' => json_encode(['玄人のみ', '未経験者お断り', '納期緩め']),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => 'ECサイトをOSSで開発しています',
                'description' => 'テストだけやってみてもらえませんか',
                'detail' => 'こんにちは。閲覧ありがとうございます。\n JavaScript未経験の方でも構いません。\n修正いただきプルリクエストをお願いします。\n\n私の方でレビューしますので、問題があった際は修正をお願いします。',
                'url' => 'https://github.com/takahiro211/pg-joinus-front',
                'author' => 6,
                'skill' => json_encode(['PHP', 'React', 'TypeScript', 'Laravel']),
                'free_tag' => json_encode(['テストだけ', 'issueも立ててください', '期限厳守']),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => 'PgJoinUsというOSSサイトを開発しています',
                'description' => '何か機能追加のプルリクエストが欲しいです',
                'detail' => 'こんにちは。閲覧ありがとうございます。\n JavaScript未経験の方でも構いません。\n修正いただきプルリクエストをお願いします。\n\n私の方でレビューしますので、問題があった際は修正をお願いします。',
                'url' => 'https://github.com/takahiro211/pg-joinus-front',
                'author' => 6,
                'skill' => json_encode(['JavaScript', 'PHP', 'React', 'TypeScript', 'Laravel']),
                'free_tag' => json_encode(['未経験者歓迎', 'レビューします', '期限厳守']),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'title' => 'あなたも弊社の有名OSSのコミッターになりませんか！？',
                'description' => 'OSSへのcontributionはあなたの肩書きになります！！',
                'detail' => 'こんにちは。閲覧ありがとうございます。\n JavaScript未経験の方でも構いません。\n修正いただきプルリクエストをお願いします。\n\n私の方でレビューしますので、問題があった際は修正をお願いします。',
                'url' => 'https://github.com/takahiro211/pg-joinus-front',
                'author' => 6,
                'skill' => json_encode(['JavaScript', 'PHP', 'React', 'TypeScript', 'Laravel']),
                'free_tag' => json_encode(['未経験者歓迎', 'レビューします', '期限厳守']),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
