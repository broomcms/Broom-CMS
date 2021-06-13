<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GabaritsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('gabarits')->delete();
        
        \DB::table('gabarits')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom' => 'gabarit 1',
                'created_at' => '2020-10-12 15:54:57',
                'updated_at' => '2020-10-12 15:54:57',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}