<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ages')->insert([
            [
                'age' => '10代以下',
                'sort' => 1,
            ],
            [
                'age' => '20代',
                'sort' => 2,
            ],
            [
                'age' => '30代',
                'sort' => 3,
            ],
            [
                'age' => '40代',
                'sort' => 4,
            ],
            [
                'age' => '50代',
                'sort' => 5,
            ],
            [
                'age' => '60代以上',
                'sort' => 6,
            ],
        ],);
    }
}
