<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Helpers;
use Illuminate\Support\Facades\DB;

class PeopleController extends Controller {
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
            $postal_codes = DB::table('postal_codes')->where('code', '=', $_POST['postal'])->first();
            $region = DB::table('regions')->where('province', '=', $_POST['province'])
                ->orderBy('id')
                ->first();

            if ($region == null) {
                $prov = $_POST['province'];
                array_push($alerts, [
                    'type' => 'danger',
                    'text' => "The province $prov does not exist!"
                ]);
            } else {
                $city = DB::table('cities')
                    ->join('region', 'region.id', '=', 'cities.region_id')
                    ->where('cities.name', '=', $_POST['cities'])
                    ->where('region.province', '=', $_POST['province'])
                    ->select('cities.id as id', 'cities.name as name', 'region.id as region_id')
                    ->first();

                
                if (($city == null && $postal_codes != null) || ($postal_codes != null && $city != null && $postal_codes->city_id != $city->id)) {
                    $actualCity = DB::table('cities')->find($postal_codes->city_id);
                    array_push($alerts, [
                        'type' => 'danger',
                        'text' => "The postal code $postal_codes->Code is already associated with $actualCity->Name!"
                    ]);
                } else {
                    // Create city and postal code if they do not exist
                    try {
                        if ($city == null) {
                            DB::table('cities')->insert([
                                'name' => $_POST['city'],
                                'region_id' => $region->ID
                            ]);
                            $city = DB::table('cities')->where('name', '=', $_POST['cities'])->first();
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
                        if ($postal_codes == null) {
                            DB::table('postal_codes')->insert([
                                'code' => $_POST['postal'],
                                'city_id' => $city->id
                            ]);
                            $postal_codes = DB::table('postal_codes')->where('code', '=', $_POST['postal'])->first();
                            array_push($alerts, [
                                'type' => 'success',
                                'text' => "New postal code $postal_codes->Code created"
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
                        DB::table('Person')->insert([
                            'first_name' => $_POST['first_name'],
                            'last_name' => $_POST['last_name'],
                            'date_of_birth' => $_POST['dob'],
                            'medicare_id' => $_POST['medicare'],
                            'phone_number' => $_POST['phone'],
                            'address' => $_POST['address'],
                            'postal_code_id' => $postal_codes->ID,
                            'citizenship' => $_POST['citizenship'],
                            'email_address' => $_POST['email']
                        ]);
                        $name = $_POST['first_name'] . ' ' . $_POST['last_name'];
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
            $postal_codes = DB::table('postal_codes')->where('code', '=', $_POST['postal'])->first();
            $region = DB::table('regions')->where('province', '=', $_POST['province'])
                ->orderBy('id')
                ->first();

            if ($region == null) {
                $prov = $_POST['province'];
                array_push($alerts, [
                    'type' => 'danger',
                    'text' => "The province $prov does not exist!"
                ]);
            } else {
                $city = DB::table('cities')
                    ->join('regions', 'regions.id', '=', 'cities.region_id')
                    ->where('cities.name', '=', $_POST['cities'])
                    ->where('regions.province', '=', $_POST['province'])
                    ->select('cities.id as id', 'cities.name as name', 'regions.id as region_id')
                    ->first();
                
                if (($city == null && $postal_codes != null) || ($postal_codes != null && $city != null && $postal_codes->CityID != $city->ID)) {
                    $actualCity = DB::table('cities')->find($postal_codes->CityID);
                    array_push($alerts, [
                        'type' => 'danger',
                        'text' => "The postal code $postal_codes->Code is already associated with $actualCity->Name!"
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
                        if ($postal_codes == null) {
                            DB::table('postal_codes')->insert([
                                'Code' => $_POST['postal'],
                                'CityID' => $city->ID
                            ]);
                            $postal_codes = DB::table('postal_codes')->where('code', '=', $_POST['postal'])->first();
                            array_push($alerts, [
                                'type' => 'success',
                                'text' => "New postal code $postal_codes->Code created"
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
                            'first_name' => $_POST['first_name'],
                            'last_name' => $_POST['last_name'],
                            'date_of_birth' => $_POST['dob'],
                            'medicare_id' => $_POST['medicare'],
                            'phone_number' => $_POST['phone'],
                            'address' => $_POST['address'],
                            'postal_codesID' => $postal_codes->ID,
                            'Citizenship' => $_POST['citizenship'],
                            'Emailaddress' => $_POST['email']
                        ]);
                        $name = $_POST['first_name'] . ' ' . $_POST['last_name'];
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
        $query = DB::table('Person')
            ->leftjoin('postal_codes', 'postal_codes.ID', '=', 'Person.postal_codesID')
            ->leftjoin('City', 'City.ID', '=', 'postal_codes.CityID')
            ->leftjoin('Region', 'Region.ID', '=', 'City.RegionID')
            ->select('Person.ID as PersonID', 'Person.*', 'postal_codes.Code as postal_codes', 'City.Name as City', 'Region.Province as Province');

        // Apply search queries
        if (array_key_exists('first_name', $_GET) && $_GET['first_name'] != '') {
            $first_name = $_GET['first_name'];
            $query = $query->where('first_name', 'like', "%$first_name%");
        }
        if (array_key_exists('last_name', $_GET) && $_GET['last_name'] != '') {
            $last_name = $_GET['last_name'];
            $query = $query->where('last_name', 'like', "%$last_name%");
        }
        if (array_key_exists('dob', $_GET) && $_GET['dob'] != '') {
            $dob = $_GET['dob'];
            $query = $query->where('date_of_birth', 'like', "%$dob%");
        }
        if (array_key_exists('medicare', $_GET) && $_GET['medicare'] != '') {
            $medicare = $_GET['medicare'];
            $query = $query->where('medicare_id', 'like', "%$medicare%");
        }
        if (array_key_exists('phone', $_GET) && $_GET['phone'] != '') {
            $phone = $_GET['phone'];
            $query = $query->where('phone_number', 'like', "%$phone%");
        }
        if (array_key_exists('address', $_GET) && $_GET['address'] != '') {
            $address = $_GET['address'];
            $query = $query->where('address', 'like', "%$address%");
        }
        if (array_key_exists('postal', $_GET) && $_GET['postal'] != '') {
            $postal = $_GET['postal'];
            $query = $query->where('postal_codes.Code', 'like', "%$postal%");
        }
        if (array_key_exists('city', $_GET) && $_GET['city'] != '') {
            $city = $_GET['city'];
            $query = $query->where('City.Name', 'like', "%$city%");
        }
        if (array_key_exists('citizenship', $_GET) && $_GET['citizenship'] != '') {
            $citizenship = $_GET['citizenship'];
            $query = $query->where('Citizenship', 'like', "%$citizenship%");
        }
        if (array_key_exists('email', $_GET) && $_GET['email'] != '') {
            $email = $_GET['email'];
            $query = $query->where('Emailaddress', 'like', "%$email%");
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
