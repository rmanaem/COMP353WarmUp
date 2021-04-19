<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\DB;

class LoginHelper {
    public static function GetAccount() {
        $user = $_COOKIE['user'] ?? '';
        $pass = $_COOKIE['pass'] ?? '';

        return DB::table('Person')
                    ->leftJoin('PublicHealthWorker', 'PublicHealthWorker.personID', '=', 'Person.ID')
                    ->where('Person.MedicareID', '=', $user)
                    ->where('Person.DateOfBirth', '=', $pass)
                    ->select('Person.ID as ID', 'PublicHealthWorker.ID as WorkerID', 'FirstName', 'LastName', 'MedicareID')
                    ->first();
    }

    public static function GetPermissionsLevel() {
        $user = $_COOKIE['user'] ?? '';
        $pass = $_COOKIE['pass'] ?? '';

        $account = DB::table('Person')
                    ->leftJoin('PublicHealthWorker', 'PublicHealthWorker.personID', '=', 'Person.ID')
                    ->where('Person.MedicareID', '=', $user)
                    ->where('Person.DateOfBirth', '=', $pass)
                    ->select('Person.ID as PersonID', 'PublicHealthWorker.ID as WorkerID', 'FirstName', 'LastName')
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