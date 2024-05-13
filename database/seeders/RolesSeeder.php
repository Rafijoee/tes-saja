<?php

namespace Database\Seeders;

use App\Models\role;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleData = 
        [
            [
                "name"=> "admin",
            ],
            [
                "name"=> "pemerintah",
            ],
            [
                "name"=> "pengguna",
            ],
        ];
        foreach($roleData as $val){
            role::create($val);
        }
    }
}
