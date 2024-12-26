<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Food', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Transport', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Entertainment', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Healthcare', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Utilities', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Education', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];
        DB::table('categories')->insert($categories);
    }
}
