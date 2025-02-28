<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    //Acara 10
     public function run(): void
    {
        //
        DB::table('detail_profile')->insert([
            'address' => 'Jember' ,
            'nomor_tlp' => '08xxxxxxx' ,
            'ttl' => '2000-11-26' ,
            'foto' => 'picture.png'

        ]);
    }
}
