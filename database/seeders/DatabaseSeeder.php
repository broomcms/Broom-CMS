<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    public function run()
    {

        Schema::disableForeignKeyConstraints();

        $this->call([
            #PermissionsTableSeeder::class,
            #RolesTableSeeder::class,
            #PermissionRoleTableSeeder::class,
            #UsersTableSeeder::class,
            #RoleUserTableSeeder::class,
            #CrmStatusTableSeeder::class,
        ]);
        $this->call(ConfigsTableSeeder::class);
        $this->call(ConfigGabaritTableSeeder::class);
        $this->call(GabaritsTableSeeder::class);
        $this->call(GabaritItemTableSeeder::class);
        $this->call(GestionPagesTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
