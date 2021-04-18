<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
                'Text' => $_POST['text']
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
                'Text' => $_POST['text']
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
        $query = DB::table('publichealthcentre');
        
        // Serve the view
        $permissions = Helpers\LoginHelper::GetPermissionsLevel();
        $page = '';
        if ($permissions == 2) {
            $page = '/admindata/publichealthcentre';
        } else {
            $page = '/data/publichealthcentre';
        }
        return view ($page, [
            'publichealthcentres' => $query->get(),
            'alerts' => $alerts
        ]);
    }
}
