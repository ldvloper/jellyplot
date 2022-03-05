<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Team;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use File;


class UserSeeder extends Seeder
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
     * Create a newly registered user.
     * The json array keys will be included in user application
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    protected function create(){

        $userData = [
            //File::get("database/data/users/users.json")
        ];
        $testData = File::get("database/data/users/test_users.json");


        /***
         * 1-Create Admin User (ID:1)
         * 2-Import Test Users from JSON
         * 3-Import Users from JSON
         */
        $this->createAdmin();
        $this->importTestUsers($testData);
        //$this->importUsersWithJson($userData);
    }

    protected function createAdmin(){
        return DB::transaction(function () {
            return tap(
                User::create([
                    'name' => config('app.admin_name'),
                    'email' => config('app.admin_email'),
                    'email_verified_at' => now(),
                    'department_id' => null,
                    'password' => Hash::make(config('app.admin_psw')),
                    'master' => true,
                ]), function (User $user) {
                $this->createTeam($user);
            });
        });
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Space",
            'personal_team' => true,
        ]));
    }

    protected function importUsersWithJson($jsonArray)
    {   foreach ($jsonArray as $json)
        {
            $testUsers = json_decode($json);
            foreach ($testUsers as $key => $value) {
                /**
                * Creates the user without password in order to allow microsoft login
                */
                $userCreated = User::firstOrCreate([
                    'email' => $value->email,
                ],[
                    'name' => $value->name,
                    'master' => $value->master,
                    'position_id' => 1,
                    'department_id' => $value->department,
                ]);

                //Get the ID to create a personal team
                $id = $userCreated->id;
                //Verifying the email
                $userCreated->markEmailAsVerified();

                //Adding space if the user don't have one
                $userCreated->ownedTeams()->save(Team::firstOrNew([
                    'personal_team' => true,
                    'user_id' => $id,
                ],[
                    'name' => explode(' ', $userCreated->name, 2)[0]."'s Space",
                ]));
            }
        }
    }

    protected function importTestUsers($jsonFile){

        $users = json_decode($jsonFile);
        foreach ($users as $key => $value) {
            /**
             * Creates the user with a random string
             * password in order to don't allow the user normal login
             */
            $userCreated = User::firstOrCreate([
                'email' => $value->email,
            ],[
                'name' => $value->name,
                'master' => $value->master,
                'department_id' => $value->department,
                'position_id' => 1,
                'password' => Hash::make('admin1512')
            ]);

            //Get the ID to create a personal team
            $id = $userCreated->id;
            //Verifing the email
            $userCreated->markEmailAsVerified();

            //Adding space if the user don't have one
            $userCreated->ownedTeams()->save(Team::firstOrNew([
                'personal_team' => true,
                'user_id' => $id,
            ],[
                'name' => explode(' ', $userCreated->name, 2)[0]."'s Space",
            ]));
        }

    }

}
