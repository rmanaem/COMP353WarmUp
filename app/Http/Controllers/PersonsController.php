<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PersonsController extends Controller {
    public function index($id) {
        
        // Perform logic here

        return view ('/data/persons', [
            'test' => "$id is being searched for"
        ]);
    }
    
    public function edit($id) {
        
        // Perform logic here

        return view ('/data/persons', [
            'test' => "$id was updated"
        ]);
    }
    
    public function delete($id) {
        
        // Perform logic here

        return view ('/data/persons', [
            'test' => "$id was deleted"
        ]);
    }
    
    public function new($id) {
        
        // Perform logic here

        return view ('/data/persons', [
            'test' => "$id was added"
        ]);
    }
}
