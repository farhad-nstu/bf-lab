<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;

function getValue($field, $data, $default=null) {
    return (!empty($data) && !empty($data->$field)) ? $data->$field : old($field,$default);
}

function usersRole($userId) {
    $query = DB::table('users')->join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
        ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->where('model_has_roles.model_id', $userId)
        ->select('roles.name as role', 'model_has_roles.role_id', 'model_has_roles.model_id as user_id');
    return $query->first();
}

