<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('subjects')->insert([
            ['name' => 'English'],
            ['name' => 'Malayalam'],
            ['name' => 'Science'],
            ['name' => 'Physics'],
            ['name' => 'Chemistry'],
            ['name' => 'Biology'],
            ['name' => 'Social'],
            ['name' => 'Civics'],
            ['name' => 'History'],
            ['name' => 'Geography'],
            ['name' => 'Maths'],
            ['name' => 'Hindi'],
        ]);
    }
}
