<?php

namespace Database\Seeders;

use App\Models\Equipment;
use App\Models\Position;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();
        //Main
        $this->call(DepartmentSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(PositionDepartmentSeeder::class);
        //Users
        $this->call(UserSeeder::class);

        //Planner Resources
        $this->call(CustomerSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(EquipmentSeeder::class);
        $this->call(ResourceSeeder::class);
        $this->call(ShiftSeeder::class);
    }
}
