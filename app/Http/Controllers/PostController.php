<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostFormRequest;
use App\Models\Comment;
use App\Models\Downvote;
use App\Models\Upvote;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Posts = [];
        $categories = Category::all();
        // echo $categories;
        $posts = Post::latest();
        if (request()->category) {
            $posts = $posts->where("category_id", request()->category);
        }
        if (request()->user_id) {
            $posts = $posts->where("created_by",  request()->user_id);
        }
        $Posts = $posts->get();
        // echo $posts;
        // die();
        return view("post.index", ["posts" => $Posts, "categories" => $categories]);
        // return response()->json($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.create', ["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {
        $data = $request->validated();

        $post = new Post();
        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->category_id = $data['category_id'];



        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/post/', $filename);
            $post->image = $filename;
        }
        $post->created_by = Auth::user()->id;


        $post->save();
        return redirect('home')->with('message', 'Post Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($post_id)
    {
        $categories = Category::all();
        $user = User::all();
        $post = Post::with("comments", "comments.user")->find($post_id);
        $upvotes = Upvote::where('post_id', $post_id)->count();
        $downvotes = Downvote::where('post_id', $post_id)->count();
        $upvoted = auth()->user() ? Upvote::where("user_id", auth()->user()->id)->where("post_id", $post_id)->count() > 0 : false;
        $downvoted = auth()->user() ? Downvote::where("user_id", auth()->user()->id)->where("post_id", $post_id)->count() > 0 : false;
        echo $upvoted;
        echo $downvoted;
        die();
        return view('post.show',
        ['post' => $post,
        'categories' => $categories,
        'upvotes' => $upvotes,
        'downvotes'=> $downvotes,
        'upvoted'=> $upvoted,
        'downvoted'=> $downvoted,
        'user' => $user
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($post_id)
    {
        $categories = Category::all();
        $post = Post::find($post_id);
        return view('post.edit', ['post' => $post, "categories" => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostFormRequest $request, $post_id)
    {
        $data = $request->validated();

        $post = Post::find($post_id);
        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->category_id = $data['category_id'];

        $post->created_by = Auth::user()->id;

        if ($request->hasfile('image')) {

            $destination = 'uploads/post/' . $post->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/post/', $filename);
            $post->image = $filename;
        }
        $post->update();

        return redirect('home')->with('message', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id)
    {
        $post = Post::find($post_id);
        if ($post) {
            $destination = 'uploads/post/' . $post->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $post->delete();
            return redirect('post/index')->with('message', 'Category Deleted Successfully');
        } else {
            return redirect('post/index')->with('message', 'No Category Id Found');
        }
    }

    public function upvote($post_id)
    {
        $upvote = Upvote::where("post_id", $post_id)->where("user_id", auth()->user()->id)->first();
        $downvote = Downvote::where("post_id", $post_id)->where("user_id", auth()->user()->id)->first();


        // $downvote = Downvote::where("post_id", $id)->where("user_id", auth()->user()->id)->first();
        // $upvote = Upvote::where("post_id", $id)->where("user_id", auth()->user()->id)->first();

        if ($upvote) {
            $upvote->delete();
        } else {
            if ($downvote) {
                $downvote->delete();
            }

            Upvote::create([
                "post_id" => $post_id,
                "user_id" => auth()->user()->id
            ]);
        }
        return back();
    }

    public function downvote($post_id)
    {
        $downvote = Downvote::where("post_id", $post_id)->where("user_id", auth()->user()->id)->first();
        $upvote = Upvote::where("post_id", $post_id)->where("user_id", auth()->user()->id)->first();



        if ($downvote) {
            $downvote->delete();
        } else {
            if ($upvote) {
                $upvote->delete();
            }
            Downvote::create([
                "post_id" => $post_id,
                "user_id" => auth()->user()->id
            ]);
        }
        return back();
    }
}
