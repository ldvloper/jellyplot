<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class CustomerSeeder extends Seeder
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
            File::get("database/data/customers/customers.json"),
        ];
        $this->importCustomersWithJson($json);
    }

    protected function importCustomersWithJson($jsonArray): void
    {   foreach ($jsonArray as $json)
        {
            $customers = json_decode($json);
            foreach ($customers as $key => $value) {
                /**
                 * Creates the Customer
                 */
                $customerCreated = Customer::firstOrCreate([
                    'name' => $value->name,
                ],[
                    'department_id' => $value->department_id,
                    'creator_id' => 1,
                ]);
            }
        }
    }
}
