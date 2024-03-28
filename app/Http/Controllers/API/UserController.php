<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        dd($user);
    }
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()){
            return response()->json([
                'validate' => 'False'
            ],404);
        } else{
          $user =  User::create($request->all());
            return response()->json([
               'create' => 'success',
                'username' => $user->name,
                'email' => $user->email,
            ],200);
        }
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json([
            'id' => $user->id,
            'username' => $user->name,
            'password' => $user->password,
        ],200);
    }
    public function destroy($id){
        $user = User::findOrFail($id);
        return response()->json([
            'id' => $user->id,
            $user->delete(),
            'user' => 'delete',
        ],200);
    }
}
