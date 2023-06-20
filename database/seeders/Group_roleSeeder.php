<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Group_roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 1; $i <= 43; $i++) {
            DB::table('group_roles')->insert([
                'group_id' => 1,
                'role_id' => $i,
            ]);
        }
    }
}
