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
}