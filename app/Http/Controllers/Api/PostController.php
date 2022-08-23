<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    private function getImgUrl($imgPath)
    {
        return $imgPath ? asset('/storage/' . $imgPath) : null;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $per_page_default = 12;
        $per_page = $request->query('per_page', $per_page_default);
        if ($per_page < 1 || $per_page > 100) {
            $per_page = $per_page_default;
            //return response()->json(['success' => false], 400);
        }

        $posts = Post::with(['user', 'category', 'tags'])->paginate($per_page);

        foreach ($posts as $post) {
            $post->image = $this->getImgUrl($post->image);
        }

        return response()->json([
            'success'   => true,
            'response'  => $posts
        ]);
    }

    public function randomPost() {
        $sql = Post::with(['user', 'category', 'tags'])->whereNotNull('image')->limit(6)->inRandomOrder();
        $posts = $sql->get();

        return response()->json([
            //'sql'       => $sql->toSql(),
            'success'   => true,
            'result'  => $posts
        ]);

        foreach ($posts as $post) {
            $post->image = $this->getImgUrl($post->image);
        }
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
            $post->image = $this->getImgUrl($post->image);
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
