<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Helpers;
use Illuminate\Support\Facades\DB;

class RegionsController extends Controller {
    public function index() {
        $alerts = [];
        return $this->FetchView($alerts);
    }

    public function new() {
        $alerts = [];

        try {
            DB::table('Region')->insert([
                'Name' => $_POST['name'],
                'province' => $_POST['province']
            ]);
        } catch(\Illuminate\Database\QueryException $ex) {
            $message = $ex->getMessage();
            array_push($alerts, [
                'type' => 'danger',
                'text' => "Query exception: $message"
            ]);
        }
        return $this->FetchView($alerts);
    }

    public function edit() {
        $alerts = [];

        try {
            DB::transaction(function() {
                $previous = DB::table('RegionAlertHistory')
                    ->where('RegionID', '=', $_POST['id'])
                    ->whereNull('EndDate')
                    ->first();
                DB::table('RegionAlertHistory')
                    ->insert([
                        'RegionID' => $_POST['id'],
                        'AlertLevelID' => $_POST['alertlevel']
                    ]);
                DB::table('RegionAlertHistory')
                    ->where('ID', '=', $previous->ID)
                    ->update([
                        'EndDate' => date('Y-m-d')
                    ]);
                DB::table('Region')
                    ->where('ID', '=', $_POST['id'])
                    ->update([
                    'Name' => $_POST['name'],
                    'Province' => $_POST['province']
                ]);


                // Send a message to all residents
                $region = DB::table('Person')
                        ->join('PostalCode', 'PostalCode.ID', '=', 'Person.PostalCodeID')
                        ->join('City', 'City.ID', '=', 'PostalCode.cityID')
                        ->join('Region', 'Region.ID', '=', 'City.RegionID')
                        ->where('Region.ID', '=', $_POST['ID'])
                        ->select('Region.*')->first();
                $people = DB::table('Person')
                    ->join('PostalCode', 'PostalCode.ID', '=', 'Person.PostalCodeID')
                    ->join('City', 'City.ID', '=', 'PostalCode.cityID')
                    ->join('Region', 'Region.ID', '=', 'City.RegionID')
                    ->where('Region.ID', '=', $_POST['id'])
                    ->pluck('Person.ID');
                foreach ($people as $person) {
                    Helpers\MessageHelper::CreateMessage($person, 5, [
                        'RegionName' => $region->Name,
                        'AlertLevelID' => $_POST['alertlevel'],
                        'OldAlertID' => $previous->AlertLevelID
                    ]);
                }
            });
        } catch(\Illuminate\Database\QueryException $ex) {
            $message = $ex->getMessage();
            array_push($alerts, [
                'type' => 'danger',
                'text' => "Query exception: $message"
            ]);
        }
        return $this->FetchView($alerts);
    }

    public function delete($id) {
        $alerts = [];

        try {
            DB::table('Region')->delete($id);
        } catch(\Illuminate\Database\QueryException $ex) {
            $message = $ex->getMessage();
            array_push($alerts, [
                'type' => 'danger',
                'text' => "Query exception: $message"
            ]);
        }
        return $this->FetchView($alerts);
    }

    private function FetchView($alerts) {
        $query = DB::table('Region')
                        ->join('RegionAlertHistory', 'Region.ID', '=', 'RegionAlertHistory.RegionID')
                        ->whereNull('RegionAlertHistory.EndDate')
                        ->select('Region.*', 'RegionAlertHistory.AlertLevelID')
                        ->orderBy('ID');
        
        // Apply search queries
        if (array_key_exists('name', $_GET) && $_GET['name'] != '') {
            $name = $_GET['name'];
            $query = $query->where('Name', 'like', "%$name%");
        }
        if (array_key_exists('province', $_GET) && $_GET['province'] != '') {
            $province = $_GET['province'];
            $query = $query->where('Province', 'like', "%$province%");
        }
        if (array_key_exists('alert', $_GET) && $_GET['alert'] != '') {
            $alert = $_GET['alert'];
            $query = $query->where('AlertLevelID', 'like', "%$alert%");
        }

        // Serve the view
        $permissions = Helpers\LoginHelper::GetPermissionsLevel();
        $page = '';
        if ($permissions == 2) {
            $page = '/admindata/regions';
        } else {
            $page = '/data/regions';
        }
        return view ($page, [
            'regions' => $query->get(),
            'alerts' => $alerts
        ]);
    }
}