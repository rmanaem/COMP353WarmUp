<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecommendationsController extends Controller
{
    public function index() {
        $recommendations = DB::select('select * from Recommendation');
        return view('recommendations', ['recommendations'=>$recommendations]);
    }
}
