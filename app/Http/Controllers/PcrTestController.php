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
        $person = DB::table('person')->where('medicareID', '=', $_POST['medicareID'])->first();
        $contract = DB::table('employmentcontract')
            ->where('publichealthworkerID', '=', $account->WorkerID)
            ->whereNull('endDate')
            ->first();
        if ($contract == null) {
            $contract = DB::table('employmentcontract')
                ->where('publichealthworkerID', '=', $account->WorkerID)
                ->orderByDesc('endDate')
                ->first();
        }

        if ($person == null) {
            array_push($alerts, [
                'type' => 'warning',
                'text' => 'Medicare ID not found!'
            ]);
        } else {
            $success = false;
            try {
                DB::table('pcrtest')->insert([
                    'PersonID' => $person->ID,
                    'DateOfTest' => $_POST['date'],
                    'PublicHealthCentreID' => $contract->PublicHealthCentreID,
                    'PublicHealthWorkerID' => $account->WorkerID,
                    'Result' => $_POST['result'] ?? '',
                    'DateOfResult' => date('Y-m-d')
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
                $centre = DB::table('publichealthcentre')->find($contract->PublicHealthCentreID);
                if ($_POST['result'] == '1') {
                    // Alert that the test came back positive
                    Helpers\MessageHelper::CreateMessage($person->ID, 1, [
                        'PublicHealthCentreName' => $centre->Name,
                        'PCRTestDateOfTest' => $_POST['date']
                    ]);

                    // Send the message for symptom history
                    Helpers\MessageHelper::CreateMessage($person->ID, 4, []);

                    // Alert all members of the groupzone
                    $zones = DB::table('groupzonemembership')
                        ->where('PersonID', '=', $person->ID)
                        ->select('GroupZoneID');

                    $people = DB::table('person')
                        ->join('groupzonemembership', 'groupzonemembership.PersonID', '=', 'person.ID')
                        ->joinSub($zones, 'zones', 'groupzonemembership.GroupZoneID', '=', 'zones.GroupZoneID')
                        ->where('person.ID', '<>', $person->ID)
                        ->select('person.ID')
                        ->distinct()
                        ->get();

                    foreach ($people as $atRisk) {
                        Helpers\MessageHelper::CreateMessage($atRisk->ID, 3, []);
                    }
                } else {
                    // Alert that the test came back negative
                    Helpers\MessageHelper::CreateMessage($person->ID, 2, [
                        'PublicHealthCentreName' => $centre->Name,
                        'PCRTestDateOfTest' => $_POST['date']
                    ]);
                }
            }
        }
        return view('/pcrEntry', [
            'alerts' => $alerts
        ]);
    }
}