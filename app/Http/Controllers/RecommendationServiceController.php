<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RecommendationService;

class RecommendationServiceController extends Controller
{
    public function index(){
        $Core = RecommendationService::orderBy('created_at', 'desc');
        
        return view('Recomendation.index',["Core"=>$Core]);
    }
}
