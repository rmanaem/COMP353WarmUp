<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\DB;

class LoginHelper {
    public static function GetAccount() {
        $user = $_COOKIE['user'] ?? '';
        $pass = $_COOKIE['pass'] ?? '';

        return DB::table('person')
                    ->leftJoin('publichealthworker', 'publichealthworker.personID', '=', 'person.id')
                    ->where('person.medicareID', '=', $user)
                    ->where('person.dateofbirth', '=', $pass)
                    ->select('person.id as PersonID', 'publichealthworker.id as WorkerID', 'FirstName', 'LastName')
                    ->first();
    }

    public static function GetPermissionsLevel() {
        $user = $_COOKIE['user'] ?? '';
        $pass = $_COOKIE['pass'] ?? '';

        $account = DB::table('person')
                    ->leftJoin('publichealthworker', 'publichealthworker.personID', '=', 'person.id')
                    ->where('person.medicareID', '=', $user)
                    ->where('person.dateofbirth', '=', $pass)
                    ->select('person.id as PersonID', 'publichealthworker.id as WorkerID', 'FirstName', 'LastName')
                    ->first();

        $permissions = 0;
        if ($account != null) {
            if ($account->WorkerID == null) {
                $permissions = 1;
            } else {
                $permissions = 2;
            }
        }
        return $permissions;
    }
}