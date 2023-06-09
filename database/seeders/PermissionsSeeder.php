<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'write',
            'read',
            'printing'
        ];
        
        foreach($permissions as $permission){
        Permission::create(['name' => $permission]);
        }
    }
}