<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProjectSeeder extends Seeder
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
     * Create a Customer.
     * The json array keys will be included in data folder
     *
     * @param  array  $input
     * @return \App\Models\Customer
     */
    protected function create()
    {
        $json = [
            File::get("database/data/projects/projects.json"),
        ];
        $this->importCustomersWithJson($json);
    }

    protected function importCustomersWithJson($jsonArray): void
    {   foreach ($jsonArray as $json)
        {
            $projects = json_decode($json);
            foreach ($projects as $key => $value) {
                /**
                 * Creates the Customer
                 */
                $projectsCreated = Project::firstOrCreate([
                    'reference' => $value->reference,
                ],[
                    'color' => $value->color,
                    'notes' => $value->notes,
                    'department_id' => $value->department_id,
                    'customer_id' => $value->customer_id,
                    'project_manager_id' => $value->project_manager_id,
                    'sample_reception' => $value->sample_reception,
                    'deadline' => $value->deadline,
                    'billing_status' => $value->billing_status,
                    'total_cost' => $value->total_cost,
                    'creator_id' => $value->creator_id,
                    'editor_id' => $value->editor_id,
                ]);
            }
        }
    }
}
