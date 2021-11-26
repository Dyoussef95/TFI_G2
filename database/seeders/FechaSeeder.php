<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class FechaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hoy = date("Y-m-d"); 
        DB::table('fechas')->insert([
            'fecha' => $hoy,
        ]); 
        

        for ($i = 1; $i <= 730; $i++) {
            DB::table('fechas')->insert([
                'fecha' => date("Y-m-d",strtotime($hoy."+ ".$i." days")),
            ]); 
        } 
       
    }
}
