<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create([
            'level'       =>  '0',
            'user_type'   =>  'junior'
        ]);

         Role::create([
            'level'       =>  '1',
            'user_type'   =>  'middle'
        ]);

          Role::create([
            'level'       =>  '2',
            'user_type'   =>  'top'
        ]);

           Role::create([
            'level'       =>  '3',
            'user_type'   =>  'highest'
        ]);
    }
}
