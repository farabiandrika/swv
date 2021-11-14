<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configs')->insert([
            'name' => 'Smile With Vegas',
            'logo' => 'swv.jpg',
            'phone' => '0761851266',
            'address' => 'Jl. Samarinda Kelurahan No.36B, Tengkerang Utara, Kec. Bukit Raya, Kota Pekanbaru, Riau 28126',
            'email' => 'smilewithvegas@swv.id',
            'bank_account' => 'BCA - 123123123',
        ]);
    }
}
