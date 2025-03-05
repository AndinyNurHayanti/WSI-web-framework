<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DetailProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    //Acara 10
     public function run(): void
    {
        //
        DB::table('detail_profile')->truncate();
        DB::table('detail_profile')->insert([
            'address' => 'Nganjuk' ,
            'nomor_tlp' => '081239013236' ,
            'ttl' => '2005-08-07' ,
            'foto' => 'picture.png'

        ]);
    }
}
