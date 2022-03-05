<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ID:1
        DB::table('positions')->insert([
            'identifier' => 'tch-a',
            'name' => 'Technician AUTO',
            'comment' => 'This is Technician Auto position',
            'creator_id' => 1,
            'created_at' => date("Y-m-d")
        ]);
        //ID:2
        DB::table('positions')->insert([
            'identifier' => 'prj-m',
            'name' => 'Project Manager',
            'comment' => 'This is project manager position',
            'creator_id' => 1,
            'created_at' => date("Y-m-d")
        ]);
        //ID:3
        DB::table('positions')->insert([
            'identifier' => 'opera',
            'name' => 'Operations',
            'comment' => 'This is Operations position',
            'creator_id' => 1,
            'created_at' => date("Y-m-d")
        ]);

        //ID:4
        DB::table('positions')->insert([
            'identifier' => 'tst-m',
            'name' => 'Test Manager',
            'comment' => 'This is Test Manager Position',
            'creator_id' => 1,
            'created_at' => date("Y-m-d")
        ]);

        //ID:4
        DB::table('positions')->insert([
            'identifier' => 'tch-i',
            'name' => 'Technician IND',
            'comment' => 'This is Technician IND position',
            'creator_id' => 1,
            'created_at' => date("Y-m-d")
        ]);


    }
}
