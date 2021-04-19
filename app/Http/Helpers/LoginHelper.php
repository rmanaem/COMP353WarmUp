<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\DB;

class LoginHelper {
    public static function GetAccount() {
        $user = $_COOKIE['user'] ?? '';
        $pass = $_COOKIE['pass'] ?? '';

        return DB::table('Person')
                    ->leftJoin('PublicHealthWorker', 'PublicHealthWorker.personID', '=', 'Person.id')
                    ->where('Person.medicareID', '=', $user)
                    ->where('Person.dateofbirth', '=', $pass)
                    ->select('Person.id as ID', 'PublicHealthWorker.id as WorkerID', 'FirstName', 'LastName', 'MedicareID')
                    ->first();
    }

    public static function GetPermissionsLevel() {
        $user = $_COOKIE['user'] ?? '';
        $pass = $_COOKIE['pass'] ?? '';

        $account = DB::table('Person')
                    ->leftJoin('PublicHealthWorker', 'PublicHealthWorker.personID', '=', 'Person.id')
                    ->where('Person.medicareID', '=', $user)
                    ->where('Person.dateofbirth', '=', $pass)
                    ->select('Person.id as PersonID', 'PublicHealthWorker.id as WorkerID', 'FirstName', 'LastName')
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