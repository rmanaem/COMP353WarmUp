<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Helpers;

class GroupZonesController extends Controller
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

        // Update the group zone
        try {
            DB::table('GroupZone')
                ->where('ID', '=', $_POST['id'])
                ->update([
                'Name' => $_POST['name']
            ]);
            array_push($alerts, [
                'type' => 'success',
                'text' => "GroupZone updated"
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
            DB::table('GroupZone')->delete($id);
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

        // Create new group zone
        try {
            DB::table('GroupZone')->insert([
                'Name' => $_POST['name']
            ]);
            array_push($alerts, [
                'type' => 'success',
                'text' => "New groupzone created"
            ]);
        } catch(\Illuminate\Database\QueryException $ex) {
            $message = $ex->getMessage();
            array_push($alerts, [
                'type' => 'danger',
                'text' => "Query exception: $message"
            ]);
            return $this->FetchView($alerts);
        }
        // var_dump($_POST);

        return $this->FetchView($alerts);
    }

    private function FetchView($alerts) {

        // Get the table
        $query = DB::table('groupzone');
        
        // Apply search queries
        if (array_key_exists('name', $_GET) && $_GET['name'] != '') {
            $name = $_GET['name'];
            $query = $query->where('name', 'like', "%$name%");
        }

        // Serve the view
        $permissions = Helpers\LoginHelper::GetPermissionsLevel();
        $page = '';
        if ($permissions == 2) {
            $page = '/admindata/groupzones';
        } else {
            $page = '/data/groupzones';
        }
        return view ($page, [
            'groupzones' => $query->get(),
            'alerts' => $alerts
        ]);
    }
}
