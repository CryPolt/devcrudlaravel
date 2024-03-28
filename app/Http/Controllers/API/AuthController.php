<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        $auth = Auth::all();
        return response()->json($auth,200);
    }
    public function login(Request $request){

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $auth = Auth::user();
            $success['token'] =  $auth->createToken('testdevapi')->plainTextToken;
            $success['name'] =  $auth->name;
            return response()->json($success,200);
        }
        else{
            return response()->json(['login' => 'false']);
        }
    }
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->fails()){
            return response()->json(['register' => 'false']);
        }
        else{
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $auth = Auth::create($input);
            $success['token'] = $auth->createToken('testdevapi')->plainTextToken;
            $success['name'] = $auth->name;
            return response()->json($success,200);
        }
    }
    public function showauth($id){
        $auth = Auth::findOrFail($id);
        return response()->json($auth,200);
    }
}
