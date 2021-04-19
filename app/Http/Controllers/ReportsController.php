<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller {

    public function historyIndex() {
        return view('/symptomHistory', []);
    }

    public function historyGet() {
        $alerts = [];
        $person = DB::table('person')->where('medicareID', '=', $_POST['medicareID'])->first();
        if ($person == null) {
            array_push($alerts, [
                'type' => 'warning',
                'text' => 'Medicare ID not found'
            ]);
        } else {
            if (DB::table('pcrtest')->where('personID', '=', $person->ID)->where('DateOfTest', '=', $_POST['date'])->where('result', '=', '1')->exists()) {
                $history = DB::table('symptomHistory')->where('PersonID',  '=', $person->ID)->get();
            } else {
                array_push($alerts, [
                    'type' => 'warning',
                    'text' => 'This patient has no positive test on this date'
                ]);
            }
        }
        
        $history = $history ?? [];
        return view('/symptomHistory', [
            'history' => $history,
            'alerts' => $alerts
        ]);
    }
}