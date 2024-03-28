<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
class PostController extends Controller
{
    public function index(){
        $post = Post::all();
        dd($post);
    }
    public function show($id){
        $post = Post::findOrFail($id);
        return response()->json([
            'name' => $post->name,
            'slug' => $post->slug,
            'desc' => $post->desc,
        ]);
    }
    public function create(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required',
            'desc' => 'required'
        ]);
        if ($validator->fails()){
            return response()->json([
                'validate' => 'False'
            ],404);
        } else{
            $post =  Post::create($request->all());
            return response()->json([
                'create' => 'success',
                'name post' => $post->name,
                'post slug' => $post->slug,
            ],200);
        }
    }
    public function destroy($id){
        $post = Post::findOrFail($id);
        return response()->json([
            'id' => $post->id,
            $post->delete(),
            'post' => 'delete',
        ],200);
    }
}
