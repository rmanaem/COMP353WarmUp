<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Helpers;

class PublicHealthCentresController extends Controller
{
    public function index() {
        return $this->FetchView([]);
    }

    public function edit() {
        $alerts = [];

        $permissions = Helpers\LoginHelper::GetPermissionsLevel();
        if ($permissions < 2) {
            array_push($alerts, [
                'type' => 'warning',
                'text' => 'You do not have permission to perform this action!'
            ]);
            return $this->FetchView($alerts);
        }

        // Update the publichealthcentre
        try {
            DB::table('publichealthcentre')
                ->where('ID', '=', $_POST['id'])
                ->update([
                'Name' => $_POST['name'],
                'Address' => $_POST['address'],
                'PhoneNumber' => $_POST['phonenumber'],
                'Website' => $_POST['website'],
                'Type' => $_POST['type'],
                'DriveThrough' => $_POST['drivethrough'],
                'AppointmentType' => $_POST['appointmenttype']
            ]);
            array_push($alerts, [
                'type' => 'success',
                'text' => "PublicHealthCentre updated"
            ]);
        } catch(\Illuminate\Database\QueryException $ex) {
            $message = $ex->getMessage();
            array_push($alerts, [
                'type' => 'danger',
                'text' => "Query exception: $message"
            ]);
            return $this->FetchView($alerts);
        }

        return $this->FetchView($alerts);
    }

    public function delete($id) {
        $alerts = [];

        $permissions = Helpers\LoginHelper::GetPermissionsLevel();
        if ($permissions < 2) {
            array_push($alerts, [
                'type' => 'warning',
                'text' => 'You do not have permission to perform this action!'
            ]);
            return $this->FetchView($alerts);
        }

        try {
            DB::table('publichealthcentre')->delete($id);
        } catch(\Illuminate\Database\QueryException $ex) {
            $message = $ex->getMessage();
            array_push($alerts, [
                'type' => 'danger',
                'text' => "Query exception: $message"
            ]);
        }

        return $this->FetchView($alerts);
    }
    
    public function new() {
        $alerts = [];

        $permissions = Helpers\LoginHelper::GetPermissionsLevel();
        if ($permissions < 2) {
            array_push($alerts, [
                'type' => 'warning',
                'text' => 'You do not have permission to perform this action!'
            ]);
            return $this->FetchView($alerts);
        }

        // Create new publichealthcentre
        try {
            DB::table('publichealthcentre')->insert([
                'Name' => $_POST['name'],
                'Address' => $_POST['address'],
                'PhoneNumber' => $_POST['phonenumber'],
                'Website' => $_POST['website'],
                'Type' => $_POST['type'],
                'DriveThrough' => $_POST['drivethrough'],
                'AppointmentType' => $_POST['appointmenttype']
            ]);
            array_push($alerts, [
                'type' => 'success',
                'text' => "New publichealthcentre created"
            ]);
        } catch(\Illuminate\Database\QueryException $ex) {
            $message = $ex->getMessage();
            array_push($alerts, [
                'type' => 'danger',
                'text' => "Query exception: $message"
            ]);
            return $this->FetchView($alerts);
        }

        return $this->FetchView($alerts);
    }



    private function FetchView($alerts) {

        // Get the table
        $contracts = DB::table('employmentcontract')
        ->whereNull('EndDate');

        $counts = DB::table('publichealthcentre')
                ->select('publichealthcentre.ID', DB::raw('count(*) as total'))
                ->joinsub($contracts, 'employmentcontract', 'employmentcontract.publichealthcentreid', '=', 'publichealthcentre.id')
                ->groupBy('publichealthcentre.ID');

        $query = DB::table('publichealthcentre')
                ->leftJoinSub($counts, 'counts', 'publichealthcentre.ID', '=', 'counts.ID')
                ->select('publichealthcentre.*', 'counts.total as NumberOfHealthWorkers');
        
        // Apply search queries
        if (array_key_exists('name', $_GET) && $_GET['name'] != '') {
            $name = $_GET['name'];
            $query = $query->where('name', 'like', "%$name%");
        }
        if (array_key_exists('address', $_GET) && $_GET['address'] != '') {
            $address = $_GET['address'];
            $query = $query->where('address', 'like', "%$address%");
        }
        if (array_key_exists('numberofhealthworkers', $_GET) && $_GET['numberofhealthworkers'] != '') {
            $numberofhealthworkers = $_GET['numberofhealthworkers'];
            $query = $query->having('numberofhealthworkers', 'like', "%$numberofhealthworkers%");
        }
        if (array_key_exists('phonenumber', $_GET) && $_GET['phonenumber'] != '') {
            $phonenumber = $_GET['phonenumber'];
            $query = $query->where('phonenumber', 'like', "%$phonenumber%");
        }
        if (array_key_exists('website', $_GET) && $_GET['website'] != '') {
            $website = $_GET['website'];
            $query = $query->where('website', 'like', "%$website%");
        }
        if (array_key_exists('type', $_GET) && $_GET['type'] != '') {
            $type = $_GET['type'];
            $query = $query->where('type', 'like', "%$type%");
        }
        if (array_key_exists('drivethrough', $_GET) && $_GET['drivethrough'] != '') {
            $drivethrough = $_GET['drivethrough'];
            $query = $query->where('drivethrough', 'like', "%$drivethrough%");
        }
        if (array_key_exists('appointmenttype', $_GET) && $_GET['appointmenttype'] != '') {
            $appointmenttype = $_GET['appointmenttype'];
            $query = $query->where('appointmenttype', 'like', "%$appointmenttype%");
        }

        // Serve the view
        $permissions = Helpers\LoginHelper::GetPermissionsLevel();
        $page = '';
        if ($permissions == 2) {
            $page = '/admindata/publichealthcentres';
        } else {
            $page = '/data/publichealthcentres';
        }
        return view ($page, [
            'publichealthcentres' => $query->get(),
            'alerts' => $alerts
        ]);
    }
}
