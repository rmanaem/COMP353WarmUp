<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\DB;

class LoginHelper {
    public static function GetAccount() {
        $user = $_COOKIE['user'] ?? '';
        $pass = $_COOKIE['pass'] ?? '';

        return DB::table('people')
                    ->leftJoin('public_health_workers', 'public_health_workers.person_id', '=', 'people.id')
                    ->where('people.medicare_id', '=', $user)
                    ->where('people.date_of_birth', '=', $pass)
                    ->select('people.id as id', 'public_health_workers.id as worker_id', 'first_name', 'last_name', 'medicare_id')
                    ->first();
    }

    public static function GetPermissionsLevel() {
        $user = $_COOKIE['user'] ?? '';
        $pass = $_COOKIE['pass'] ?? '';

        $account = DB::table('people')
                    ->leftJoin('public_health_workers', 'public_health_workers.person_id', '=', 'people.id')
                    ->where('people.medicare_id', '=', $user)
                    ->where('people.date_of_birth', '=', $pass)
                    ->select('people.id as person_id', 'public_health_workers.id as worker_id', 'first_name', 'last_name')
                    ->first();

        $permissions = 0;
        if ($account != null) {
            if ($account->worker_id == null) {
                $permissions = 1;
            } else {
                $permissions = 2;
            }
        }
        return $permissions;
    }
}