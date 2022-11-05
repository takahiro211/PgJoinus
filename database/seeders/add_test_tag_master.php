<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class add_test_tag_master extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tag_master')->insert([
            [
                'tag_name' => 'PHP',
                'is_enabled' => true,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tag_name' => 'Python',
                'is_enabled' => true,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tag_name' => 'MySQL',
                'is_enabled' => true,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tag_name' => 'Java',
                'is_enabled' => true,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tag_name' => 'JavaScript',
                'is_enabled' => true,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tag_name' => 'TypeScript',
                'is_enabled' => true,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tag_name' => 'Ruby on Rails',
                'is_enabled' => true,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tag_name' => 'C#',
                'is_enabled' => true,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tag_name' => 'React',
                'is_enabled' => true,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tag_name' => 'Vue',
                'is_enabled' => true,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tag_name' => 'Docker',
                'is_enabled' => true,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tag_name' => 'Python',
                'is_enabled' => true,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tag_name' => 'AWS',
                'is_enabled' => true,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tag_name' => 'Swift',
                'is_enabled' => true,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tag_name' => 'Kotlin',
                'is_enabled' => true,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tag_name' => 'Python',
                'is_enabled' => true,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tag_name' => 'Go',
                'is_enabled' => true,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tag_name' => 'Rust',
                'is_enabled' => true,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tag_name' => 'Node.js',
                'is_enabled' => true,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tag_name' => 'HTML/CSS',
                'is_enabled' => true,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tag_name' => 'Elixir',
                'is_enabled' => true,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tag_name' => 'Laravel',
                'is_enabled' => true,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'tag_name' => 'SpringBoot',
                'is_enabled' => true,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
