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
        $query = DB::table('publichealthworker')
            ->join('person', 'person.id', '=', 'publichealthworker.personID')
            ->select('person.id as PersonID', 'person.FirstName', 'person.LastName', 'person.DateOfBirth', 'person.MedicareID');

        // Apply search queries
        if (array_key_exists('firstname', $_GET) && $_GET['firstname'] != '') {
            $firstname = $_GET['firstname'];
            $query = $query->where('firstname', 'like', "%$firstname%");
        }
        if (array_key_exists('lastname', $_GET) && $_GET['lastname'] != '') {
            $lastname = $_GET['lastname'];
            $query = $query->where('lastname', 'like', "%$lastname%");
        }
        if (array_key_exists('dob', $_GET) && $_GET['dob'] != '') {
            $dob = $_GET['dob'];
            $query = $query->where('dateofbirth', 'like', "%$dob%");
        }
        if (array_key_exists('medicare', $_GET) && $_GET['medicare'] != '') {
            $medicare = $_GET['medicare'];
            $query = $query->where('medicareID', 'like', "%$medicare%");
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

    //TODO
    public function contractDelete($employmentcontractid) {
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
            DB::table('publichealthworker')->delete($employmentcontractid);
        } catch(\Illuminate\Database\QueryException $ex) {
            $message = $ex->getMessage();
            array_push($alerts, [
                'type' => 'danger',
                'text' => "Query exception: $message"
            ]);
        }

        return $this->FetchView($alerts);
    }

    //TODO
    public function contractNew() {
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

    private function FetchContractView($publichealthworkerid, $alerts) {

        // Get the table
        $query = DB::table('publichealthworker')
            ->join('person', 'person.id', '=', 'publichealthworker.personID')
            ->join('employmentcontract', 'publichealthworker.id', '=', 'employmentcontract.publichealthworkerID')
            ->join('publichealthcentre', 'employmentcontract.publichealthcentreid', '=', 'publichealthcentre.id')
            ->select('publichealthcentre.Name', 'employmentcontract.StartDate', 'employmentcontract.EndDate', 'employmentcontract.Schedule');
        
        //Get the public health worker
        $person = DB::table('publichealthworker')
            ->join('person', 'person.id', '=', 'publichealthworker.personID')
            ->select('person.FirstName', 'person.LastName', 'person.id as PersonID')
            ->where('person.id', '=', $publichealthworkerid);

        // Apply search queries
        if (array_key_exists('publichealthcentreID', $_GET) && $_GET['publichealthcentreID'] != '') {
            $publichealthcentreid = $_GET['publichealthcentreID'];
            $query = $query->where('publichealthcentreID', 'like', "%$publichealthcentreid%");
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
            'publichealthworkers' => $query->get(),
            'alerts' => $alerts,
            'person' => $person->first()
        ]);
    }
}