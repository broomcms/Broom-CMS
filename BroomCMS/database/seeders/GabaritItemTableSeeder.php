<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GabaritItemTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('gabarit_item')->delete();
        
        \DB::table('gabarit_item')->insert(array (
            0 => 
            array (
                'gabarit_id' => 1,
                'item_id' => 1,
            ),
            1 => 
            array (
                'gabarit_id' => 1,
                'item_id' => 2,
            ),
            2 => 
            array (
                'gabarit_id' => 1,
                'item_id' => 3,
            ),
            3 => 
            array (
                'gabarit_id' => 1,
                'item_id' => 4,
            ),
            4 => 
            array (
                'gabarit_id' => 1,
                'item_id' => 5,
            ),
            5 => 
            array (
                'gabarit_id' => 1,
                'item_id' => 6,
            ),
            6 => 
            array (
                'gabarit_id' => 1,
                'item_id' => 7,
            ),
            7 => 
            array (
                'gabarit_id' => 1,
                'item_id' => 8,
            ),
            8 => 
            array (
                'gabarit_id' => 1,
                'item_id' => 9,
            ),
            9 => 
            array (
                'gabarit_id' => 1,
                'item_id' => 10,
            ),
            10 => 
            array (
                'gabarit_id' => 1,
                'item_id' => 11,
            ),
            11 => 
            array (
                'gabarit_id' => 1,
                'item_id' => 12,
            ),
        ));
        
        
    }
}