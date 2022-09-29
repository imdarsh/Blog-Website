<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostsController extends Controller
{
    // Get all posts
    public function index() {
        $post = Posts::latest()->get();
        return response()->json($post);
    }

    // Get post by id
    public function show(Posts $post) {
        return response()->json($post);
    }

    // Store posts into database
    public function store(Request $request) {
        $post =  new Posts;
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->author = $request->input('author');
        $post->save();
        return response()->json($post);
        
    }

    // Update post
    public function update(Request $request, Posts $post) {
        $edit = $request->all();
        $post->title = $edit['title'];
        $post->description = $edit['description'];
        $post->author = $edit['author'];
        $post->save();
        return response()->json($post);
    }

    // Delete post from database
    public function destroy(Posts $post) {
        if($post->delete()) {
            return "Deleted Successfully";
        }
    }
}
