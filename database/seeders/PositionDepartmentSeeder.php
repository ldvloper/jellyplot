<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Position;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = Position::all();
        $departments = Department::all();
        for($i = 0; $i<=$positions->count(); $i++)
        {
            for($j = 0; $j<=$departments->count(); $j++) {
                DB::table('position_departments')->insert([
                    'position_id' => $i,
                    'department_id' => $j,
                ]);
            }
        }
    }
}
