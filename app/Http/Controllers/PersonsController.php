<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Helpers;
use Illuminate\Support\Facades\DB;

class PersonsController extends Controller {
    public function index() {
        return $this->FetchView([]);
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

        if ($_POST['city'] == '' || $_POST['postal'] == '' || $_POST['province'] == '') {
            array_push($alerts, [
                'type' => 'danger',
                'text' => "Postal Code, City, and Province are required!"
            ]);
        } else {
            $postalcode = DB::table('postalcode')->where('code', '=', $_POST['postal'])->first();
            $region = DB::table('region')->where('province', '=', $_POST['province'])
                ->orderBy('id')
                ->first();

            if ($region == null) {
                $prov = $_POST['province'];
                array_push($alerts, [
                    'type' => 'danger',
                    'text' => "The province $prov does not exist!"
                ]);
            } else {
                $city = DB::table('city')
                    ->join('region', 'region.id', '=', 'city.regionID')
                    ->where('city.name', '=', $_POST['city'])
                    ->where('region.province', '=', $_POST['province'])
                    ->select('city.id as ID', 'city.name as Name', 'region.ID as RegionID')
                    ->first();

                
                if (($city == null && $postalcode != null) || ($postalcode != null && $city != null && $postalcode->CityID != $city->ID)) {
                    $actualCity = DB::table('city')->find($postalcode->CityID);
                    array_push($alerts, [
                        'type' => 'danger',
                        'text' => "The postal code $postalcode->Code is already associated with $actualCity->Name!"
                    ]);
                } else {
                    // Create city and postal code if they do not exist
                    try {
                        if ($city == null) {
                            DB::table('city')->insert([
                                'Name' => $_POST['city'],
                                'RegionID' => $region->ID
                            ]);
                            $city = DB::table('city')->where('name', '=', $_POST['city'])->first();
                            array_push($alerts, [
                                'type' => 'success',
                                'text' => "New city $city->Name created"
                            ]);
                        }
                    } catch(\Illuminate\Database\QueryException $ex) {
                        $message = $ex->getMessage();
                        array_push($alerts, [
                            'type' => 'danger',
                            'text' => "Query exception: $message"
                        ]);
                        return $this->FetchView($alerts);
                    }
                    try {
                        if ($postalcode == null) {
                            DB::table('postalcode')->insert([
                                'Code' => $_POST['postal'],
                                'CityID' => $city->ID
                            ]);
                            $postalcode = DB::table('postalcode')->where('code', '=', $_POST['postal'])->first();
                            array_push($alerts, [
                                'type' => 'success',
                                'text' => "New postal code $postalcode->Code created"
                            ]);
                        }
                    } catch(\Illuminate\Database\QueryException $ex) {
                        $message = $ex->getMessage();
                        array_push($alerts, [
                            'type' => 'danger',
                            'text' => "Query exception: $message"
                        ]);
                        return $this->FetchView($alerts);
                    }

                    // Create new person
                    try {
                        DB::table('person')->insert([
                            'FirstName' => $_POST['firstname'],
                            'LastName' => $_POST['lastname'],
                            'DateOfBirth' => $_POST['dob'],
                            'MedicareID' => $_POST['medicare'],
                            'PhoneNumber' => $_POST['phone'],
                            'Address' => $_POST['address'],
                            'PostalCodeID' => $postalcode->ID,
                            'Citizenship' => $_POST['citizenship'],
                            'EmailAddress' => $_POST['email']
                        ]);
                        $name = $_POST['firstname'] . ' ' . $_POST['lastname'];
                        array_push($alerts, [
                            'type' => 'success',
                            'text' => "New person $name created"
                        ]);
                    } catch(\Illuminate\Database\QueryException $ex) {
                        $message = $ex->getMessage();
                        array_push($alerts, [
                            'type' => 'danger',
                            'text' => "Query exception: $message"
                        ]);
                        return $this->FetchView($alerts);
                    }
                }

            }
        }

        return $this->FetchView($alerts);
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

        if ($_POST['city'] == '' || $_POST['postal'] == '' || $_POST['province'] == '') {
            array_push($alerts, [
                'type' => 'danger',
                'text' => "Postal Code, City, and Province are required!"
            ]);
        } else {
            $postalcode = DB::table('postalcode')->where('code', '=', $_POST['postal'])->first();
            $region = DB::table('region')->where('province', '=', $_POST['province'])
                ->orderBy('id')
                ->first();

            if ($region == null) {
                $prov = $_POST['province'];
                array_push($alerts, [
                    'type' => 'danger',
                    'text' => "The province $prov does not exist!"
                ]);
            } else {
                $city = DB::table('city')
                    ->join('region', 'region.id', '=', 'city.regionID')
                    ->where('city.name', '=', $_POST['city'])
                    ->where('region.province', '=', $_POST['province'])
                    ->select('city.id as ID', 'city.name as Name', 'region.ID as RegionID')
                    ->first();

                
                if (($city == null && $postalcode != null) || ($postalcode != null && $city != null && $postalcode->CityID != $city->ID)) {
                    $actualCity = DB::table('city')->find($postalcode->CityID);
                    array_push($alerts, [
                        'type' => 'danger',
                        'text' => "The postal code $postalcode->Code is already associated with $actualCity->Name!"
                    ]);
                } else {
                    // Create city and postal code if they do not exist
                    try {
                        if ($city == null) {
                            DB::table('city')->insert([
                                'Name' => $_POST['city'],
                                'RegionID' => $region->ID
                            ]);
                            $city = DB::table('city')->where('name', '=', $_POST['city'])->first();
                            array_push($alerts, [
                                'type' => 'success',
                                'text' => "New city $city->Name created"
                            ]);
                        }
                    } catch(\Illuminate\Database\QueryException $ex) {
                        $message = $ex->getMessage();
                        array_push($alerts, [
                            'type' => 'danger',
                            'text' => "Query exception: $message"
                        ]);
                        return $this->FetchView($alerts);
                    }
                    try {
                        if ($postalcode == null) {
                            DB::table('postalcode')->insert([
                                'Code' => $_POST['postal'],
                                'CityID' => $city->ID
                            ]);
                            $postalcode = DB::table('postalcode')->where('code', '=', $_POST['postal'])->first();
                            array_push($alerts, [
                                'type' => 'success',
                                'text' => "New postal code $postalcode->Code created"
                            ]);
                        }
                    } catch(\Illuminate\Database\QueryException $ex) {
                        $message = $ex->getMessage();
                        array_push($alerts, [
                            'type' => 'danger',
                            'text' => "Query exception: $message"
                        ]);
                        return $this->FetchView($alerts);
                    }

                    // Update the person
                    try {
                        DB::table('person')
                            ->where('ID', '=', $_POST['id'])
                            ->update([
                            'FirstName' => $_POST['firstname'],
                            'LastName' => $_POST['lastname'],
                            'DateOfBirth' => $_POST['dob'],
                            'MedicareID' => $_POST['medicare'],
                            'PhoneNumber' => $_POST['phone'],
                            'Address' => $_POST['address'],
                            'PostalCodeID' => $postalcode->ID,
                            'Citizenship' => $_POST['citizenship'],
                            'EmailAddress' => $_POST['email']
                        ]);
                        $name = $_POST['firstname'] . ' ' . $_POST['lastname'];
                        array_push($alerts, [
                            'type' => 'success',
                            'text' => "$name successfully updated"
                        ]);
                    } catch(\Illuminate\Database\QueryException $ex) {
                        $message = $ex->getMessage();
                        array_push($alerts, [
                            'type' => 'danger',
                            'text' => "Query exception: $message"
                        ]);
                        return $this->FetchView($alerts);
                    }
                }

            }
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
            DB::table('person')->delete($id);
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

        // Get the table
        $query = DB::table('person')
            ->leftjoin('postalcode', 'postalcode.id', '=', 'person.postalcodeID')
            ->leftjoin('city', 'city.id', '=', 'postalcode.cityID')
            ->leftjoin('region', 'region.id', '=', 'city.regionid')
            ->select('person.id as PersonID', 'person.*', 'postalcode.code as PostalCode', 'city.name as City', 'region.province as Province');

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
        if (array_key_exists('phone', $_GET) && $_GET['phone'] != '') {
            $phone = $_GET['phone'];
            $query = $query->where('phonenumber', 'like', "%$phone%");
        }
        if (array_key_exists('address', $_GET) && $_GET['address'] != '') {
            $address = $_GET['address'];
            $query = $query->where('address', 'like', "%$address%");
        }
        if (array_key_exists('postal', $_GET) && $_GET['postal'] != '') {
            $postal = $_GET['postal'];
            $query = $query->where('postalcode.code', 'like', "%$postal%");
        }
        if (array_key_exists('city', $_GET) && $_GET['city'] != '') {
            $city = $_GET['city'];
            $query = $query->where('city.name', 'like', "%$city%");
        }
        if (array_key_exists('citizenship', $_GET) && $_GET['citizenship'] != '') {
            $citizenship = $_GET['citizenship'];
            $query = $query->where('citizenship', 'like', "%$citizenship%");
        }
        if (array_key_exists('email', $_GET) && $_GET['email'] != '') {
            $email = $_GET['email'];
            $query = $query->where('emailaddress', 'like', "%$email%");
        }
        
        // Serve the view
        $permissions = Helpers\LoginHelper::GetPermissionsLevel();
        $page = '';
        if ($permissions == 2) {
            $page = '/admindata/persons';
        } else {
            $page = '/data/persons';
        }
        return view ($page, [
            'persons' => $query->get(),
            'alerts' => $alerts
        ]);
    }
}
