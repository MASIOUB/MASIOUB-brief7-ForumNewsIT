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
        $categories = Category::all();
        $count = Post::count();
        $posts = Post::all();
        return view('admin.post.index', ["posts" => $posts, "row" => $count, "categories" => $categories]);
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
