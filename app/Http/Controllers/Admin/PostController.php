<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // echo 'hello';
        // die();
        $categories = Category::all();
        $posts = Post::all();
        return view('admin.post.index', ["posts" => $posts, "categories" => $categories]);
    }

    public function show($post_id)
    {
        $post = Post::find($post_id);
        return view('admin.post.show', ['post' => $post]);
    }

    public function destroy($post_id)
    {
        $post = Post::find($post_id);
        if ($post) {
            $post->delete();
            return redirect('admin/posts')->with('message', 'Category Deleted Successfully');
        }else {
            return redirect('admin/posts')->with('message', 'No Category Id Found');
        }
    }
}
