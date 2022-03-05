<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->create();
    }

    protected function create()
    {
        $json = [
            File::get("database/data/departments/departments.json"),
        ];
        $this->importDepartmentsWithJson($json);
    }

    protected function importDepartmentsWithJson($jsonArray): void
    {   foreach ($jsonArray as $json) {
        $departments = json_decode($json);
        foreach ($departments as $key => $value) {
            /**
             * Creates the Customer
             */
            $departmentCreated = Department::firstOrCreate([
                'name' => $value->name,
            ],[
                'laboratory' => $value->laboratory,
                'information' => $value->information,
                'color' => $value->color,
            ]);
        }
    }
    }
}
