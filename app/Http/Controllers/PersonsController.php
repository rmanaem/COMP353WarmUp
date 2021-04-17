<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PersonsController extends Controller {
    public function index() {
        return $this->FetchView();
    }
    
    public function edit($id) {
        
        // Perform logic here

        return $this->FetchView();
    }
    
    public function delete($id) {
        
        // Perform logic here
        
        return $this->FetchView();
    }
    
    public function new($id) {
        
        // Perform logic here
        
        return $this->FetchView();
    }

    private function FetchView() {

        $persons = DB::table('person')->get();
        
        return view ('/data/persons', [
            'persons' => $persons
        ]);
    }
}
