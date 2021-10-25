<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'nama' => 'admin',
        ]);
        DB::table('roles')->insert([
            'nama' => 'karyawan',
        ]);
        DB::table('roles')->insert([
            'nama' => 'customer',
        ]);
    }
}
