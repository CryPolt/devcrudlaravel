<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function index(){
        return response()->json([
            'api'=>'text'
        ],200);
    }
    public function indexl(){
        return response()->json([
            'api'=>'rabotaet vizual api v1'
        ],200);
    }
    public function users(){
        return response()->json([
            'api' => 'users api'
        ]);
    }
}
