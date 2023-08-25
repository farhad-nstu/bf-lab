<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = ['super-admin','admin','moderator','user'];

        foreach ($roles as $role) {
            $savedRole = Role::create(['name' => $role]);
            if(in_array($role,['super-admin','admin'])){
                $routes = Permission::all();
                $data = [];
                foreach($routes as $route){
                    $data[$route->name] = $route->name;
                }
                $savedRole->syncPermissions($data);
            } else{
                $data = [
                    'system.index'=>'system.index','logout.perform'=>'logout.perform','tasks.index'=>'tasks.index',
                    'tasks.create'=>'tasks.create','tasks.store'=>'tasks.store','tasks.edit'=>'tasks.edit','tasks.destroy'=>'tasks.destroy'
                ];
                $savedRole->syncPermissions($data);
            }
        }
    }
}
