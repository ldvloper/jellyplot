<?php

namespace Database\Seeders;

use App\Models\Equipment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class EquipmentSeeder extends Seeder
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

    /**
     * Create Equipment.
     * The json array keys will be included in data folder
     *
     * @param  array  $input
     * @return \App\Models\Customer
     */
    protected function create()
    {
        $json = [
            File::get("database/data/equipment/equipment.json"),
        ];
        $this->importEquipmentWithJson($json);
    }

    protected function importEquipmentWithJson($jsonArray): void
    {   foreach ($jsonArray as $json)
        {
            $equipment = json_decode($json);
            foreach ($equipment as $key => $value) {
                /**
                 * Creates the Customer
                 */
                $equipmentCreated = Equipment::firstOrCreate([
                    'sn' => $value->sn,
                ],[
                    'name' => $value->name,
                    'brand' => $value->brand,
                    'model' => $value->model,
                    'version' => $value->version,
                    'reserved' => $value->reserved,
                    'department_id' => $value->department_id,
                    'creator_id' => $value->creator_id,
                    'editor_id' => $value->editor_id,
                ]);
            }
        }
    }
}
