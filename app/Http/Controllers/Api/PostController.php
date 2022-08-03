<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $per_page_default = 12;
        $per_page = $request->query('per_page', 12);
        if ($per_page < 1 || $per_page > 100) {
            $per_page = $per_page_default;
            //return response()->json(['success' => false], 400);
        }

        $posts = Post::with(['user', 'category', 'tags'])->paginate($per_page);

        return response()->json([
            'success'   => true,
            'response'  => $posts
        ]);
    }

    public function randomPost() {
        $sql = Post::with(['user', 'category', 'tags'])->limit(6)->inRandomOrder();
        $posts = $sql->get();

        return response()->json([
            //'sql'       => $sql->toSql(),
            'success'   => true,
            'result'  => $posts
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::with(['user', 'category', 'tags'])->where('slug', $slug)->first();
        if ($post) {
            return response()->json([
                'success'   => true,
                'result'    => $post
            ]);
        } else {
            return response()->json([
                'success'   => true,
            ]);
        }
    }
}
