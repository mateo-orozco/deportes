<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Permission::create(['name' => 'create sports']);
        Permission::create(['name' => 'read sports']);
        Permission::create(['name' => 'update sports']);
        Permission::create(['name' => 'destroy sports']);

        Permission::create(['name' => 'create teams']);
        Permission::create(['name' =>'read teams']);
        Permission::create(['name' => 'update teams']);
        Permission::create(['name' => 'destroy teams']);

        Permission::create(['name' => 'create players']);
        Permission::create(['name' =>'read players']);
        Permission::create(['name' => 'update players']);
        Permission::create(['name' => 'destroy players']);

        $roleAdmin = Role::create(['name' =>'admin']);
        $roleCoach = Role::create(['name' => 'coach']);
        $rolePlayer = Role::create(['name' => 'player']);

        $roleAdmin->givePermissionTo([
            'create teams',
            'read teams',
            'update teams',
            'destroy teams',
            'create sports',
            'read sports',
            'update sports',
            'destroy sports',
            'read players',                      
        ]);
        $roleCoach->givePermissionTo([
            'create players',
            'read players',
            'update players',
            'destroy players',
        ]);
        $rolePlayer->givePermissionTo([
            'read players',
        ]);
    }
}
