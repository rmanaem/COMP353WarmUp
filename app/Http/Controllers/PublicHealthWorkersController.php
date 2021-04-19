<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Helpers;
use Illuminate\Support\Facades\DB;

class PublicHealthWorkersController extends Controller {
    // Public Health Workers
    public function index() {
        return $this->FetchView([]);
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
            DB::table('publichealthworker')->delete($id);
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

        try {
            $person = DB::table('person')->where('medicareid', '=', $_POST['medicare'])->first();
            if($person != NULL) {
                DB::table('publichealthworker')->insert([
                    'PersonID' => $person->ID
                ]);
                $name = $person->FirstName . ' ' . $person->LastName;
                array_push($alerts, [
                    'type' => 'success',
                    'text' => "New public health worker $name created"
                ]);
            }
        }
        catch (\Illuminate\Database\QueryException $ex) {
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
        $query = DB::table('PublicHealthWorker')
            ->join('Person', 'Person.id', '=', 'PublicHealthWorker.PersonID')
            ->select('Person.id as PersonID', 'Person.FirstName', 'Person.LastName', 'Person.DateOfBirth', 'Person.MedicareID', 'PublicHealthWorker.id as PublicHealthWorkerID');

        // Apply search queries
        if (array_key_exists('firstname', $_GET) && $_GET['firstname'] != '') {
            $firstname = $_GET['firstname'];
            $query = $query->where('FirstName', 'like', "%$firstname%");
        }
        if (array_key_exists('lastname', $_GET) && $_GET['lastname'] != '') {
            $lastname = $_GET['lastname'];
            $query = $query->where('LastName', 'like', "%$lastname%");
        }
        if (array_key_exists('dob', $_GET) && $_GET['dob'] != '') {
            $dob = $_GET['dob'];
            $query = $query->where('DateOfBirth', 'like', "%$dob%");
        }
        if (array_key_exists('medicare', $_GET) && $_GET['medicare'] != '') {
            $medicare = $_GET['medicare'];
            $query = $query->where('MedicareID', 'like', "%$medicare%");
        }
        
        // Serve the view
        $permissions = Helpers\LoginHelper::GetPermissionsLevel();
        $page = '';
        if ($permissions == 2) {
            $page = '/admindata/publichealthworkers';
        } else {
            $page = '/';
        }
        return view ($page, [
            'publichealthworkers' => $query->get(),
            'alerts' => $alerts
        ]);
    }

    // Public Health Workers Employment Contracts
    public function contractIndex($publichealthworkerid) {
        return $this->FetchContractView($publichealthworkerid, []);
    }

    public function contractDelete($publichealthworkerid, $employmentcontractid) {
        $alerts = [];

        $permissions = Helpers\LoginHelper::GetPermissionsLevel();
        if ($permissions < 2) {
            array_push($alerts, [
                'type' => 'warning',
                'text' => 'You do not have permission to perform this action!'
            ]);
            return $this->FetchContractView($publichealthworkerid, $alerts);
        }

        try {
            DB::table('EmploymentContract')->delete($employmentcontractid);
        } catch(\Illuminate\Database\QueryException $ex) {
            $message = $ex->getMessage();
            array_push($alerts, [
                'type' => 'danger',
                'text' => "Query exception: $message"
            ]);
        }

        return $this->FetchContractView($publichealthworkerid, $alerts);
    }

    public function contractNew($publichealthworkerid) {
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
            DB::table('EmploymentContract')->insert([
                'PublicHealthWorkerID' => $publichealthworkerid,
                'PublicHealthCentreID' => $_POST['publichealthcentre'],
                'StartDate' => $_POST['startdate'],
                'EndDate' => $_POST['enddate'],
                'Schedule' => $_POST['schedule']
            ]);
        }
        catch (\Illuminate\Database\QueryException $ex) {
            $message = $ex->getMessage();
            array_push($alerts, [
                'type' => 'danger',
                'text' => "Query exception: $message"
            ]);
            return $this->FetchContractView($publichealthworkerid, $alerts);
        }

        return $this->FetchContractView($publichealthworkerid, $alerts);
    }

    public function contractEdit($publichealthworkerid) {
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
            DB::table('employmentcontract')
                ->where('id', '=', $_POST['id'])
                ->update([
                    'PublicHealthWorkerID' => $publichealthworkerid,
                    'PublicHealthCentreID' => $_POST['publichealthcentre'],
                    'StartDate' => $_POST['startdate'],
                    'EndDate' => $_POST['enddate'] ?? null,
                    'Schedule' => $_POST['schedule'] ?? ''
                ]);
        }
        catch (\Illuminate\Database\QueryException $ex) {
            $message = $ex->getMessage();
            array_push($alerts, [
                'type' => 'danger',
                'text' => "Query exception: $message"
            ]);
            return $this->FetchContractView($publichealthworkerid, $alerts);
        }

        return $this->FetchContractView($publichealthworkerid, $alerts);
    }

    private function FetchContractView($publichealthworkerid, $alerts) {

        // Get the table
        $query = DB::table('PublicHealthWorker')
            ->join('Person', 'Person.ID', '=', 'PublicHealthWorker.PersonID')
            ->join('EmploymentContract', 'PublicHealthWorker.ID', '=', 'EmploymentContract.PublicHealthWorkerID')
            ->join('PublicHealthCentre', 'EmploymentContract.PublicHealthCentreID', '=', 'PublicHealthCentre.ID')
            ->select('PublicHealthWorker.ID as PublicHealthWorkerID', 'PublicHealthCentre.Name', 'EmploymentContract.StartDate', 'EmploymentContract.EndDate', 'EmploymentContract.Schedule', 'EmploymentContract.ID as EmploymentContractID', 'PublicHealthCentre.ID as PublicHealthCentreID')
            ->where('PublicHealthWorker.ID', '=', $publichealthworkerid);
        
        //Get the public health worker
        $person = DB::table('Person')
            ->join('PublicHealthWorker', 'Person.ID', '=', 'PublicHealthWorker.PersonID')
            ->select('Person.FirstName', 'Person.LastName', 'Person.ID as PersonID', 'PublicHealthWorker.ID as PublicHealthWorkerID')
            ->where('PublicHealthWorker.ID', '=', $publichealthworkerid);

        // Apply search queries
        if (array_key_exists('PublicHealthCentreID', $_GET) && $_GET['publichealthcentreID'] != '') {
            $publichealthcentreid = $_GET['publichealthcentreID'];
            $query = $query->where('PublicHealthCentreID', 'like', "%$publichealthcentreid%");
        }
        
        // Serve the view
        $permissions = Helpers\LoginHelper::GetPermissionsLevel();
        $page = '';
        if ($permissions == 2) {
            $page = '/admindata/contract';
        } else {
            $page = '/';
        }
        return view ($page, [
            'contracts' => $query->get(),
            'alerts' => $alerts,
            'person' => $person->first()
        ]);
    }
}