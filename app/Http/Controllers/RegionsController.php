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
            DB::table('region')->insert([
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
                $previous = DB::table('regionalerthistory')
                    ->where('RegionID', '=', $_POST['id'])
                    ->whereNull('EndDate')
                    ->first();
                DB::table('regionalerthistory')
                    ->insert([
                        'RegionID' => $_POST['id'],
                        'AlertLevelID' => $_POST['alertlevel']
                    ]);
                DB::table('regionalerthistory')
                    ->where('ID', '=', $previous->ID)
                    ->update([
                        'EndDate' => date('Y-m-d')
                    ]);
                DB::table('region')
                    ->where('ID', '=', $_POST['id'])
                    ->update([
                    'Name' => $_POST['name'],
                    'province' => $_POST['province']
                ]);
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
            DB::table('region')->delete($id);
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
        $query = DB::table('region')
                        ->join('regionalerthistory', 'region.id', '=', 'regionalerthistory.regionID')
                        ->whereNull('regionalerthistory.EndDate')
                        ->select('region.*', 'regionalerthistory.AlertLevelID')
                        ->orderBy('ID');
        
        // Apply search queries
        if (array_key_exists('name', $_GET) && $_GET['name'] != '') {
            $name = $_GET['name'];
            $query = $query->where('name', 'like', "%$name%");
        }
        if (array_key_exists('province', $_GET) && $_GET['province'] != '') {
            $province = $_GET['province'];
            $query = $query->where('province', 'like', "%$province%");
        }
        if (array_key_exists('alert', $_GET) && $_GET['alert'] != '') {
            $alert = $_GET['alert'];
            $query = $query->where('alertLevelID', 'like', "%$alert%");
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