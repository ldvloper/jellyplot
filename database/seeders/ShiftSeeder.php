<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('shifts')->insert([
            'name' => 'morning',
            'from' => 6,
            'to' => 12,
            'creator_id' => 1,
            'created_at' => '2022-01-26 21:13:23.000000',
        ]);

        DB::table('shifts')->insert([
            'name' => 'afternoon',
            'from' => 12,
            'to' => 17,
            'creator_id' => 1,
            'created_at' => '2022-01-26 21:13:23.000000',
        ]);

        DB::table('shifts')->insert([
            'name' => 'night',
            'from' => 17,
            'to' => 21,
            'creator_id' => 1,
            'created_at' => '2022-01-26 21:13:23.000000',
        ]);
    }
}
