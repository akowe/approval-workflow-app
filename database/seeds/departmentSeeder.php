<?php

use Illuminate\Database\Seeder;
use App\Department;

class departmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         Department::create([
            'department'    =>  'finance'
        ]);

          
    }
}
