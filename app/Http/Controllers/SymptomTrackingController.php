<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Helpers;
use Illuminate\Support\Facades\DB;

class SymptomTrackingController extends Controller {
    public function index() {
        return $this->FetchView([]);
    }

    public function submit() {
        $alerts = [];
        $person = '';
        if (Helpers\LoginHelper::GetPermissionsLevel() == 2) {
            $person = DB::table('Person')->where('MedicareID', '=', $_POST['medicareID'] ?? '')->first();
            if ($person == null) {
                array_push($alerts, [
                    'type' => 'warning',
                    'text' => 'Medicare ID not found'
                ]);
                return $this->FetchView($alerts);
            }
        } else {
            $person = Helpers\LoginHelper::GetAccount();
        }

        $tracker = [
            'PersonID' => $person->ID,
            'Date' => date('Y-m-d'),
            'Fever' => $_POST['fever'],
            'Cough' => array_key_exists('cough', $_POST) ? 1 : 0,
            'ShortnessOfBreath' => array_key_exists('shortnessOfBreath', $_POST) ? 1 : 0,
            'LossOfTaste' => array_key_exists('lossOfTaste', $_POST) ? 1 : 0,
            'LossOfSmell' => array_key_exists('lossOfSmell', $_POST) ? 1 : 0,
            'SoreThroat' => array_key_exists('soreThroat', $_POST) ? 1 : 0,
            'Nausea' => array_key_exists('nausea', $_POST) ? 1 : 0,
            'StomachAche' => array_key_exists('stomachAche', $_POST) ? 1 : 0,
            'Vomiting' => array_key_exists('vomiting', $_POST) ? 1 : 0,
            'Headache' => array_key_exists('headache', $_POST) ? 1 : 0,
            'MusclePain' => array_key_exists('musclePain', $_POST) ? 1 : 0,
            'Diarrhea' => array_key_exists('diarrhea', $_POST) ? 1 : 0,
            'Other' => $_POST['other'] ?? ''
        ];

        try {
            DB::table('SymptomHistory')->insert($tracker);
        } catch(\Illuminate\Database\QueryException $ex) {
            $message = $ex->getMessage();
            array_push($alerts, [
                'type' => 'danger',
                'text' => "Query exception: $message"
            ]);
            return $this->FetchView($alerts);
        }
        array_push($alerts, [
            'type' => 'success',
            'text' => "Symptoms submitted successfully!"
        ]);
        return $this->FetchView($alerts);
    }

    private function FetchView($alerts) {
        return view ('/symptomTracking', [
            'permissions' => Helpers\LoginHelper::GetPermissionsLevel(),
            'medicare' => Helpers\LoginHelper::GetAccount()->MedicareID,
            'alerts' => $alerts
        ]);
    }
}