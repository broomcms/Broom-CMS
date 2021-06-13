<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GestionPagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('gestion_pages')->delete();
        
        \DB::table('gestion_pages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom' => 'Index',
                'created_at' => '2020-10-12 15:55:04',
                'updated_at' => '2020-10-12 15:55:04',
                'deleted_at' => NULL,
                'gabarit_id' => 1,
                'parent_id' => NULL,
            ),
        ));
        
        
    }
}