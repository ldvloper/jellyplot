<?php

namespace Database\Seeders;

use App\Models\Resource;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ResourceSeeder extends Seeder
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
     * Create Resource.
     * The json array keys will be included in data folder
     *
     * @param  array  $input
     * @return \App\Models\Resource
     */
    protected function create()
    {
        $json = [
            File::get("database/data/resources/resources.json"),
        ];
        $this->importResourcesWithJson($json);
    }

    protected function importResourcesWithJson($jsonArray): void
    {   foreach ($jsonArray as $json) {
        $resources = json_decode($json);
        foreach ($resources as $key => $value) {
            /**
             * Creates the Customer
             */
            $resourcesCreated = Resource::firstOrCreate([
                'name' => $value->name,
            ],[
                'order_planning' => $value->order_planning,
                'color' => $value->color,
                'department_id' => $value->department_id,
                'creator_id' => $value->creator_id,
                'editor_id' => $value->editor_id,
            ]);
            }
        }
    }
}
