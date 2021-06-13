<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                 => 1,
                'name'               => 'Patrick Simard',
                'email'              => 'test@broomcms.com',
                'password'           => bcrypt('qpalqpal'),
                'remember_token'     => null,
                'approved'           => 1,
                'verified'           => 1,
                'verified_at'        => '2020-10-08 21:00:44',
                'verification_token' => '',
            ],
        ];

        User::insert($users);
    }
}
