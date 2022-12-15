<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'          =>  'Favour',
            'username'      =>  'favour001',
            'email'         =>  'favour@cicod.com',
            'role_id'       =>  '1',
            'department_id' =>  '1',
            'status'        =>  'verified',
            'password'      =>  Hash::make('12345678')
        ]);

          User::create([
            'name'          =>  'Mike',
            'username'      =>  'mike001',
            'email'         =>  'mike@cicod.com',
            'role_id'       =>  '2',
            'department_id' =>  '1',
            'status'        =>  'verified',
            'password'      =>  Hash::make('12345678')
        ]);


            User::create([
            'name'          =>  'Ugochi',
            'username'      =>  'ugochi001',
            'email'         =>  'ugochi@cicod.com',
            'role_id'       =>  '3',
            'department_id' =>  '1',
            'status'        =>  'verified',
            'password'      =>  Hash::make('12345678')
        ]);


            User::create([
            'name'          =>  'Ibrahim',
            'username'      =>  'ibrahim',
            'email'         =>  'ibrahim@cicod.com',
            'role_id'       =>  '4',
            'department_id' =>  '1',
            'status'        =>  'verified',
            'password'      =>  Hash::make('12345678')
        ]);

                 User::create([
            'name'          =>  'Kenny',
            'username'      =>  'kenny001',
            'email'         =>  'kenny@cicod.com',
            'role_id'       =>  '1',
            'department_id' =>  '2',
            'status'        =>  'verified',
            'password'      =>  Hash::make('12345678')
        ]);

          User::create([
            'name'          =>  'Morris',
            'username'      =>  'morris001',
            'email'         =>  'morris@cicod.com',
            'role_id'       =>  '2',
            'department_id' =>  '2',
            'status'        =>  'verified',
            'password'      =>  Hash::make('12345678')
        ]);


            User::create([
            'name'          =>  'Williams',
            'username'      =>  'williams001',
            'email'         =>  'williams@cicod.com',
            'role_id'       =>  '3',
            'department_id' =>  '2',
            'status'        =>  'verified',
            'password'      =>  Hash::make('12345678')
        ]);


            User::create([
            'name'          =>  'Ahmed',
            'username'      =>  'ahmed001',
            'email'         =>  'ahmed@cicod.com',
            'role_id'       =>  '4',
            'department_id' =>  '2',
            'status'        =>  'verified',
            'password'      =>  Hash::make('12345678')
        ]);
    }
}
