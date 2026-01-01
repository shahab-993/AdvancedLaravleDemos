<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Department::insert([
            [
                'name'=>'HR',
                'location'=>'INDIA',
            ],
            [
                'name'=>'Finance',
                'location'=>'INDIA',
            ],
            [
                'name'=>'HR',
                'location'=>'INDIA',
            ],
            [
                'name'=>'Networking',
                'location'=>'INDIA',
            ],
            [
                'name'=>'Sales',
                'location'=>'INDIA',
            ],
            [
                'name'=>'Dispatch',
                'location'=>'INDIA',
            ],
        ]);
    }
}
