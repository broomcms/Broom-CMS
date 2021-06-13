<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Patrick Simard',
                'email' => 'test@broomcms.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$qiOIbBlASwkXnAbEfZMk/uuz0MUyOwzdYirWaFa9kYRAqoEEdCTwW',
                'remember_token' => 'f8MBdN6NPX63wfFRAGCKqmQMpPbjczVLO1xMojc6XDcBFhRSewC9VYXQqZ6I',
                'approved' => 1,
                'verified' => 1,
                'verified_at' => '2020-10-08 21:00:44',
                'verification_token' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));


    }
}
