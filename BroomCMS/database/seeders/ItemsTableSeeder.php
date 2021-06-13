<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('items')->delete();
        
        \DB::table('items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom' => 'Titre',
                'champs' => 'text',
                'valeur' => NULL,
                'created_at' => '2020-10-12 15:54:04',
                'updated_at' => '2020-10-12 15:54:04',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nom' => 'Textearea',
                'champs' => 'textarea',
                'valeur' => NULL,
                'created_at' => '2020-10-12 15:54:17',
                'updated_at' => '2020-10-12 15:54:17',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'nom' => 'WYSIWYG',
                'champs' => 'WYSIWYG',
                'valeur' => NULL,
                'created_at' => '2020-10-12 15:54:35',
                'updated_at' => '2020-10-12 15:54:35',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'nom' => 'Image',
                'champs' => 'image',
                'valeur' => NULL,
                'created_at' => '2021-04-26 15:06:21',
                'updated_at' => '2021-04-26 15:06:21',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'nom' => 'File',
                'champs' => 'file',
                'valeur' => NULL,
                'created_at' => '2021-04-26 15:06:33',
                'updated_at' => '2021-04-26 15:06:33',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'nom' => 'Video',
                'champs' => 'video',
                'valeur' => NULL,
                'created_at' => '2021-04-26 15:06:50',
                'updated_at' => '2021-04-26 15:06:50',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'nom' => 'Date',
                'champs' => 'date',
                'valeur' => NULL,
                'created_at' => '2021-04-26 15:07:10',
                'updated_at' => '2021-04-26 15:07:10',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'nom' => 'Daterange',
                'champs' => 'daterange',
                'valeur' => NULL,
                'created_at' => '2021-04-26 15:07:27',
                'updated_at' => '2021-04-26 15:07:27',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'nom' => 'Datetime',
                'champs' => 'datetime',
                'valeur' => NULL,
                'created_at' => '2021-04-26 15:07:39',
                'updated_at' => '2021-04-26 15:07:39',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'nom' => 'Dropdown',
                'champs' => 'dropdown',
                'valeur' => NULL,
                'created_at' => '2021-04-26 22:04:35',
                'updated_at' => '2021-04-26 22:04:35',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'nom' => 'Radio',
                'champs' => 'radio',
                'valeur' => NULL,
                'created_at' => '2021-04-26 22:04:51',
                'updated_at' => '2021-04-26 22:04:51',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'nom' => 'Checkbox',
                'champs' => 'checkbox',
                'valeur' => NULL,
                'created_at' => '2021-04-26 22:05:04',
                'updated_at' => '2021-04-26 22:05:04',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}