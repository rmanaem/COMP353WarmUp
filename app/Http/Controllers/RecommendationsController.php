<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Helpers;

class RecommendationsController extends Controller
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

        if ($_POST['text'] == '') {
            array_push($alerts, [
                'type' => 'danger',
                'text' => "Texts is required!"
            ]);
        }                 
            // Update the recommendation
            try {
                DB::table('recommendation')
                    ->where('ID', '=', $_POST['id'])
                    ->update([
                    'Text' => $_POST['text']
                ]);
                array_push($alerts, [
                    'type' => 'success',
                    'text' => "Recommendation updated"
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
            DB::table('recommendation')->delete($id);
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

        // Create new recommendation
        try {
            DB::table('recommendation')->insert([
                'Text' => $_POST['text']
            ]);
            array_push($alerts, [
                'type' => 'success',
                'text' => "New recommendation created"
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
        $query = DB::table('recommendation');
        
        // Serve the view
        $permissions = Helpers\LoginHelper::GetPermissionsLevel();
        $page = '';
        if ($permissions == 2) {
            $page = '/admindata/recommendations';
        } else {
            $page = '/data/recommendations';
        }
        return view ($page, [
            'recommendations' => $query->get(),
            'alerts' => $alerts
        ]);
    }
}