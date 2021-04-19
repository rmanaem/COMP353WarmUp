<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Helpers;
use Illuminate\Support\Facades\DB;

class PublicHealthWorkersController extends Controller {
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
}