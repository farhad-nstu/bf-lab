<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $routes = [
            'logout.perform','system.index','assignRoleToUser','permissions.index',
            'permissions.create','permissions.edit','permissions.store','permissions.update',
            'permissions.destroy','roles.index','roles.create','roles.store','roles.edit',
            'roles.update','users.index','users.create','users.store','users.edit',
            'status.index','status.store','tasks.index','tasks.create','tasks.store','tasks.edit','tasks.destroy',
        ];

        foreach ($routes as $route) {
            $permission = new Permission();
            $permission->name = $route;
            $permission->guard_name = "web";
            $permission->save();
        }
    }
}
