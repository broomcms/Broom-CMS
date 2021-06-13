<?php

namespace Database\Seeders;

use App\Models\CrmStatus;
use Illuminate\Database\Seeder;

class CrmStatusTableSeeder extends Seeder
{
    public function run()
    {
        $crmStatuses = [
            [
                'id'         => 1,
                'name'       => 'Lead',
                'created_at' => '2020-10-08 19:50:14',
                'updated_at' => '2020-10-08 19:50:14',
            ],
            [
                'id'         => 2,
                'name'       => 'Client',
                'created_at' => '2020-10-08 19:50:14',
                'updated_at' => '2020-10-08 19:50:14',
            ],
            [
                'id'         => 3,
                'name'       => 'Partenaire',
                'created_at' => '2020-10-08 19:50:14',
                'updated_at' => '2020-10-08 19:50:14',
            ],
        ];

        CrmStatus::insert($crmStatuses);
    }
}
