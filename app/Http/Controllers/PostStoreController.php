<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostStoreController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
    }


    public function __invoke(Request $request)
    {
//        validation

            $this->validate($request,[

                'body'=>'required'

            ]);

           $request->user()->posts()->create($request->only('body'));

           return back();

//        return inertia()->render('Posts/index',[
//            'posts'=>PostResource::collection(Post::with('user')->latest()->get()),
//        ]);
    }
}
