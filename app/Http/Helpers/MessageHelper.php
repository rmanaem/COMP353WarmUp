<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\DB;
use App\Http\Helpers;

class MessageHelper {
    public static function HasMessages() {
        $account = Helpers\LoginHelper::GetAccount();
        return DB::table('message')
            ->where('PersonID', '=', $account->ID)
            ->where('MessageRead', '=', 0)
            ->exists();
    }
}