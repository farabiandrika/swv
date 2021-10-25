<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@swv.com',
            'password' => Hash::make('admin'),
            'address' => 'Jl. Lembaga',            
            'role_id' => 1, 
        ]);
        DB::table('users')->insert([
            'name' => 'Karyawan',
            'username' => 'karyawan',
            'email' => 'karyawan@swv.com',
            'password' => Hash::make('karyawan'),
            'address' => 'Jl. Lembaga',            
            'role_id' => 2, 
        ]);
        DB::table('users')->insert([
            'name' => 'Customer',
            'username' => 'customer',
            'email' => 'customer@gmail.com',
            'password' => Hash::make('customer'),
            'address' => 'Jl. Sudirman',            
            'role_id' => 3, 
        ]);
    }
}
