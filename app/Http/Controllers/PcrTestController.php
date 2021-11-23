<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Helpers;
use Illuminate\Support\Facades\DB;

class PcrTestController extends Controller {
    public function index() {
        return view('/pcrEntry', [
            'alerts' => []
        ]);
    }

    public function submit() {
        $alerts = [];
        $account = Helpers\LoginHelper::GetAccount();
        $people = DB::table('people')->where('medicare_id', '=', $_POST['medicare_id'])->first();
        $contract = DB::table('employment_contracts')
            ->where('public_health_workers_id', '=', $account->worker_id)
            ->whereNull('end_date')
            ->first();
        if ($contract == null) {
            $contract = DB::table('employment_contracts')
                ->where('public_health_workers_id', '=', $account->worker_id)
                ->orderByDesc('end_date')
                ->first();
        }

        if ($people == null) {
            array_push($alerts, [
                'type' => 'warning',
                'text' => 'Medicare id not found!'
            ]);
        } else {
            $success = false;
            try {
                DB::table('pcr_tests')->insert([
                    'person_id' => $people->id,
                    'date_of_test' => $_POST['date'],
                    'public_health_centre_id' => $contract->public_health_centre_id,
                    'public_health_workers_id' => $account->worker_id,
                    'result' => $_POST['result'] ?? '',
                    'date_of_result' => date('Y-m-d')
                ]);
                array_push($alerts, [
                    'type' => 'success',
                    'text' => "Result saved successfully"
                ]);
                $success = true;
            } catch(\Illuminate\Database\QueryException $ex) {
                $message = $ex->getMessage();
                array_push($alerts, [
                    'type' => 'danger',
                    'text' => "Query exception: $message"
                ]);
            }
            // Send messages to the patient and, if necessary, their group zone
            if ($success) {
                $centre = DB::table('public_health_centre')->find($contract->public_health_centre_id);
                if ($_POST['result'] == '1') {
                    // Alert that the test came back positive
                    Helpers\MessageHelper::CreateMessage($people->id, 1, [
                        'public_health_centre_name' => $centre->name,
                        'pcr_tests_date_of_test' => $_POST['date']
                    ]);

                    // Send the message for symptom history
                    Helpers\MessageHelper::CreateMessage($people->id, 4, []);

                    // Alert all members of the groupzone
                    $zones = DB::table('group_zone_memberships')
                        ->where('person_id', '=', $people->id)
                        ->select('group_zone_id');

                    $people = DB::table('people')
                        ->join('group_zone_memberships', 'group_zone_memberships.person_id', '=', 'people.id')
                        ->joinSub($zones, 'zones', 'group_zone_memberships.group_zone_id', '=', 'zones.group_zone_id')
                        ->where('people.id', '<>', $people->id)
                        ->select('people.id')
                        ->distinct()
                        ->get();

                    foreach ($people as $atRisk) {
                        Helpers\MessageHelper::CreateMessage($atRisk->id, 3, []);
                    }
                } else {
                    // Alert that the test came back negative
                    Helpers\MessageHelper::CreateMessage($people->id, 2, [
                        'public_health_centre_name' => $centre->name,
                        'pcr_tests_date_of_test' => $_POST['date']
                    ]);
                }
            }
        }
        return view('/pcrEntry', [
            'alerts' => $alerts
        ]);
    }
}